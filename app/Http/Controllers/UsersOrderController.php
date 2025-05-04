<?php

namespace App\Http\Controllers;

use App\Models\UsersOrder;
use App\Models\Admin\JenisTagihan;
use App\Models\Admin\TahunAjaran;
use Illuminate\Http\Request;

class UsersOrderController extends Controller
{
    // UsersOrderController.php
    public function index(Request $request)
    {
        // Ambil daftar tagihan yang bisa dipilih
        $tagihans = UsersOrder::with(['jenisTagihan', 'tahunAjaran'])->get();
        
        // Ambil keranjang dari session
        $cart = session()->get('cart', []);
        
        // Hitung total
        $total = array_sum(array_column($cart, 'jumlah_tarif'));

        $jumlahItem = count($cart);
        
        return view('users.index', compact('tagihans', 'cart', 'total', 'jumlahItem'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'tarif_tagihan_id' => 'required|exists:tarif_tagihans,id_tarif_tagihan'
        ]);

        $tagihan = UsersOrder::with(['jenisTagihan', 'tahunAjaran'])
                    ->find($request->tarif_tagihan_id);
        
        $cart = session()->get('cart', []);
        
        // Cek apakah sudah ada di keranjang
        if(isset($cart[$tagihan->id_tarif_tagihan])) {
            return back()->with('error', 'Tagihan sudah ada di keranjang');
        }

        // Tambahkan ke keranjang
        $cart[$tagihan->id_tarif_tagihan] = [
            'id_tarif_tagihan' => $tagihan->id_tarif_tagihan,
            'jenis_tagihan' => $tagihan->jenisTagihan->jenis_tagihan,
            'tahun_ajaran' => $tagihan->tahunAjaran->tahun_ajaran,
            'jumlah_tarif' => $tagihan->jumlah_tarif
        ];
        
        session()->put('cart', $cart);
        
        return back()->with('success', 'Tagihan ditambahkan ke keranjang');
    }

    public function removeFromCart($id_tarif_tagihan)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id_tarif_tagihan])) {
            unset($cart[$id_tarif_tagihan]);
            session()->put('cart', $cart);
        }
        
        return back()->with('success', 'Tagihan dihapus dari keranjang');
    }
}