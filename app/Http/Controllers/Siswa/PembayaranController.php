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
        Log::info('Midtrans Callback Received', $request->all());
        // Kamu bisa validasi signatureKey di sini jika mau
        $serverKey = config('midtrans.server_key');
        $signatureKey = hash('sha512', 
            $request->input('order_id') .
            $request->input('status_code') .
            $request->input('gross_amount') .
            $serverKey
        );

        if ($signatureKey !== $request->input('signature_key')) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Simpan ke tabel pembayaran
        Pembayaran::create([
            'tagihan_id' => $request->input('tagihan_id'), // bisa kamu sesuaikan
            'tanggal_pembayaran' => now(),
            'jumlah_pembayaran' => $request->input('gross_amount'),
            'metode_pembayaran' => 'Midtrans',
            'status' => $request->input('transaction_status'),
            'nomor_referensi' => $request->input('order_id'),
        ]);

        return response()->json(['message' => 'Pembayaran berhasil diproses']);
    }
}
