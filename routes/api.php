<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Siswa\PembayaranController;


use Midtrans\Snap;
use Midtrans\Config;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/get-token', function (Request $request) {
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$isProduction = config('services.midtrans.is_production');
    Config::$isSanitized = config('services.midtrans.is_sanitized');
    Config::$is3ds = config('services.midtrans.is_3ds');

    $data = $request->validate([
        'nama'  => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'total' => 'required|numeric|min:1000',
        'items' => 'required|string',
    ]);

    $items = json_decode($data['items'], true);
    if (!is_array($items)) {
        return response()->json(['error' => 'Format items tidak valid'], 400);
    }

    try {
        $snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $data['total'],
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name' => $data['nama'],
                'email'      => $data['email'],
                'phone'      => $data['phone'],
            ],
        ]);
        return response()->json(['snap_token' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::post('/midtrans-callback', [PembayaranController::class, 'callback']);


