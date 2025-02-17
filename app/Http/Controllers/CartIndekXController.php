<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartIndekXController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "judul" => $request->judul,
                "harga" => $request->harga,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Item ditambahkan ke keranjang']);
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('siswa.X.index', compact('cart'));
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('siswa.X.index')->with('success', 'Item dihapus dari keranjang');
    }
}
