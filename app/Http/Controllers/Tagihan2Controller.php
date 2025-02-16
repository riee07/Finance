<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Tagihan;

class Tagihan2Controller extends Controller
{
    public function index()
    {
        $tagihanX = Tagihan::all(); // Ambil data dari database
        return view('siswa.X.index', compact('tagihanX'));
    }

    // public function add(Request $request)
    // {
    //     $cart = Session::get('cart', [
    //         'items' => [],
    //         'total' => 0,
    //         'quantity' => 0,
    //         'notification' => ''
    //     ]);

    //     $newItem = $request->validate([
    //         'id' => 'required',
    //         'judul' => 'required|string',
    //         'harga' => 'required|numeric',
    //         'quantity' => 'nullable|integer|min:1'
    //     ]);

    //     $newItem['quantity'] = $newItem['quantity'] ?? 1;

    //     foreach ($cart['items'] as $item) {
    //         if ($item['id'] === $newItem['id']) {
    //             $cart['notification'] = 'Item sudah ada di keranjang.';
    //             Session::put('cart', $cart);
    //             return response()->json($cart);
    //         }
    //     }

    //     $cart['items'][] = $newItem;
    //     $cart['total'] += $newItem['harga'] * $newItem['quantity'];
    //     $cart['quantity'] += $newItem['quantity'];
    //     $cart['notification'] = 'Item berhasil ditambahkan ke keranjang.';

    //     Session::put('cart', $cart);

    //     return response()->json($cart);
    // }

    // public function remove($id)
    // {
    //     $cart = Session::get('cart', [
    //         'items' => [],
    //         'total' => 0,
    //         'quantity' => 0,
    //         'notification' => ''
    //     ]);

    //     foreach ($cart['items'] as $index => $item) {
    //         if ($item['id'] === $id) {
    //             if ($item['quantity'] > 1) {
    //                 $cart['items'][$index]['quantity']--;
    //             } else {
    //                 array_splice($cart['items'], $index, 1);
    //             }

    //             $cart['total'] -= $item['harga'];
    //             $cart['quantity']--;
    //             $cart['notification'] = 'Item berhasil dihapus dari keranjang.';

    //             Session::put('cart', $cart);
    //             return response()->json($cart);
    //         }
    //     }

    //     $cart['notification'] = "Item dengan id $id tidak ditemukan.";
    //     Session::put('cart', $cart);
    //     return response()->json($cart);
    // }
}
