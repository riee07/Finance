<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MidtransServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // MIDTRANS SETTING GLOBAL
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false; // true kalau udah live
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
