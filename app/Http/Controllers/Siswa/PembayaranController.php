<?php

namespace App\Http\Controllers\Siswa;

use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use Illuminate\Http\Request;
use App\Models\Admin\Tagihan;
use App\Models\Admin\Pembayaran;
use App\Models\Admin\DetailTagihan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config as MidtransConfig;


class PembayaranController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;
        $detail_tagihans = DetailTagihan::with(['tarifTagihan.jenisTagihan', 'tagihan'])
        ->whereHas('tagihan', function ($query) use ($siswa) {
            $query->where('siswa_id', $siswa->id_siswa);
        })
        ->get();

            // dd($siswa, $detail_tagihans);

        return view('siswa.pembayaran.index', compact('detail_tagihans'));
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'detail_tagihan_id' => 'required|exists:detail_tagihans,id_detail_tagihan',
        ]);

        $siswa = Auth::user()->siswa;
        $detail = DetailTagihan::with('tagihan')->findOrFail($request->detail_tagihan_id);

        // Set konfigurasi Midtrans
        MidtransConfig::$serverKey = config('midtrans.server_key');
        MidtransConfig::$isProduction = false;
        MidtransConfig::$isSanitized = config('midtrans.sanitized');
        MidtransConfig::$is3ds = config('midtrans.3ds');

        $tagihan = $detail->tagihan;
        $orderId = uniqid('INV-');  // Generate order_id
        $tagihan->order_id = $orderId;
        $tagihan->save();


        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $detail->jumlah_tagihan,
            ],
            'customer_details' => [
                'first_name' => $siswa->name,
                'phone' => $siswa->no_hp,
                'email' => Auth::user()->email,
            ],
            'item_details' => [
                [
                    'id' => 'TAGIHAN-' . $detail->id_detail_tagihan,
                    'price' => (int) $detail->jumlah_tagihan,
                    'quantity' => 1,
                    'name' => $detail->tarifTagihan->jenisTagihan->jenis_tagihan ?? 'Tagihan Siswa',
                ],
            ],
        ];



        $snapToken = Snap::getSnapToken($params);

        return view('siswa.pembayaran.bayar', compact('snapToken', 'detail',));
    }


    public function callback(Request $request)
    {
        Log::info('Callback diterima', request()->all());

        $data = $request->all();

        Log::info('Midtrans callback data:', $data);

        $orderId = $data['order_id'] ?? null;
        $statusCode = $data['status_code'] ?? null;
        $grossAmount = $data['gross_amount'] ?? null;
        $signatureKey = $data['signature_key'] ?? null;
        $transactionStatus = $data['transaction_status'] ?? null;
        $paymentType = $data['payment_type'] ?? null;

        $serverKey = config('midtrans.server_key');
        $validSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        if ($signatureKey !== $validSignature) {
            Log::warning('Signature tidak valid untuk order_id: ' . $orderId);
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $tagihan = Tagihan::where('order_id', $orderId)->first();

        if (!$tagihan) {
            Log::warning("Tagihan tidak ditemukan untuk order_id: $orderId");
            return response()->json(['message' => 'Tagihan not found'], 404);
        }

        if (in_array($transactionStatus, ['settlement', 'capture'])) {
            $tagihan->status_pembayaran = 'lunas';
            $tagihan->save();

            $pembayaranExist = Pembayaran::where('tagihan_id', $tagihan->id_tagihan)->exists();

            if (!$pembayaranExist) {
                Pembayaran::create([
                    'tagihan_id' => $tagihan->id_tagihan,
                    'tanggal_pembayaran' => now(),
                    'jumlah_pembayaran' => $grossAmount,
                    'metode_pembayaran' => $paymentType,
                ]);
            }

            Log::info("Pembayaran berhasil untuk order_id: $orderId");
        }

        return response()->json(['message' => 'Callback processed']);
    }


    public function riwayat()
    {
        $siswa = Auth::user()->siswa;

        $tagihanLunas = Tagihan::with([
            'detailTagihan.tarifTagihan.jenisTagihan'
        ])->where('siswa_id', $siswa->id_siswa)
            ->where('status_pembayaran', 'lunas')
            ->get();

        return view('siswa.pembayaran.riwayat', compact('tagihanLunas'));
    }


}
