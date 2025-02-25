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
        Schema::create('detail_tagihans', function (Blueprint $table) {
            $table->id('id_detail_tagihan');
            $table->unsignedBigInteger('tagihan_id'); // Foreign Key ke tahun_ajarans
            $table->foreign('tagihan_id')->references('id_tagihan')->on('tagihans')->onDelete('cascade')->onUpdate('cascade'); 
            $table->unsignedBigInteger('tarif_tagihan_id'); // Foreign Key ke tahun_ajarans
            $table->foreign('tarif_tagihan_id')->references('id_tarif_tagihan')->on('tarif_tagihans')->onDelete('cascade')->onUpdate('cascade'); 
            $table->decimal('jumlah_tagihan', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_tagihans');
    }
};
