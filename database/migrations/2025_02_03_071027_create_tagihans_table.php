<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<< HEAD:database/migrations/2025_01_13_043318_create_tagihan_x_table.php
        Schema::create('tagihan_x', function (Blueprint $table) {
=======
        Schema::create('tagihans', function (Blueprint $table) {
>>>>>>> 84c0cc7d30bff86ea1dbb488d3c467149700f8c0:database/migrations/2025_02_03_071027_create_tagihans_table.php
            $table->id();
            $table->string('judul');
            $table->float('harga');
            $table->string('kelas');
            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};