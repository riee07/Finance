<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersOrder;

class UsersOrderController extends Controller
{
    public function index() {
        $orders = UsersOrder::with('jenisTagihan')->get()->map(function ($order) {
            return [
                'id' => $order->id,
                'jumlah_tarif' => $order->jumlah_tarif,
                'jenis_tagihan' => $order->jenisTagihan->nama ?? null, // Sesuaikan dengan field-nya
            ];
        });
    
        return view('users.index', compact('orders'));
    }
    
}
