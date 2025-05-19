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

        MidtransConfig::$serverKey = config('midtrans.server_key');
        MidtransConfig::$isProduction = false;
        MidtransConfig::$isSanitized = config('midtrans.sanitized');
        MidtransConfig::$is3ds = config('midtrans.3ds');

        $params = [
            'transaction_details' => [
                'order_id' => uniqid('INV-'),
                'gross_amount' => $detail->jumlah_tagihan,
            ],
            'customer_details' => [
                'first_name' => $siswa->name,
                'phone' => $siswa->no_hp,
                'email' => Auth::user()->email,
            ],
            'item_details' => [
                [
                    'id' => 'TAGIHAN-' . $detail->id_detail_tagihan,
                    'price' => $detail->jumlah_tagihan,
                    'quantity' => 1,
                    'name' => $detail->tarifTagihan->jenisTagihan->jenis_tagihan,
                ],
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('siswa.pembayaran.bayar', compact('snapToken', 'detail'));
    }

    public function callback(Request $request)
    {
        // Log::info('Midtrans callback received:', $request->all());

        
        // // Bisa validasi status juga kalau mau
        // if ($request->transaction_status === 'settlement') {
        //     // Update pembayaran di database, dsb
        //     Log::info('Pembayaran sukses untuk order_id: ' . $request->order_id);
        // }

        // return response()->json(['message' => 'OK']);

        // Log::info('Midtrans callback received: ' . json_encode($request->all()));

        $orderId = $request->input('order_id');
        $status = $request->input('transaction_status');
        $grossAmount = $request->input('gross_amount');
        $paymentType = $request->input('payment_type');

        if ($status === 'settlement') {
            $tagihan = Tagihan::where('order_id', $orderId)->first();

            if ($tagihan) {
                // Update status tagihan
                $tagihan->status_pembayaran = 'lunas';
                $tagihan->save();

                // Simpan ke tabel pembayarans
                Pembayaran::create([
                    'tagihan_id' => $tagihan->id_tagihan,
                    'tanggal_pembayaran' => now(),
                    'jumlah_pembayaran' => $grossAmount,
                    'metode_pembayaran' => $paymentType,
                ]);

                Log::info("Pembayaran berhasil disimpan untuk order_id: $orderId");
            } else {
                Log::warning("Tagihan tidak ditemukan untuk order_id: $orderId");
            }
        }

        return response()->json(['message' => 'OK']);
    }
}
