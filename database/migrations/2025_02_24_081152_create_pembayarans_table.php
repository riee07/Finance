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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('tagihan_id'); // Foreign Key ke tahun_ajarans
            $table->foreign('tagihan_id')->references('id_tagihan')->on('tagihans')->onDelete('cascade')->onUpdate('cascade'); 
            $table->date('tanggal_pembayaran');
            $table->decimal('jumlah_pembayaran', 10, 2);
            $table->enum('metode_pembayaran', ['Transfer', 'Tunai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
