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
        Schema::create('tarif_tagihans', function (Blueprint $table) {
            $table->id('id_tarif_tagihan');
            $table->unsignedBigInteger('jenis_tagihan_id'); // Foreign Key ke tahun_ajarans
            $table->foreign('jenis_tagihan_id')->references('id_jenis_tagihan')->on('jenis_tagihans')->onDelete('cascade')->onUpdate('cascade'); 
            $table->unsignedBigInteger('tahun_ajaran_id'); // Foreign Key ke tahun_ajarans
            $table->foreign('tahun_ajaran_id')->references('id_tahun_ajaran')->on('tahun_ajarans')->onDelete('cascade')->onUpdate('cascade');        
            $table->decimal('jumlah_tarif', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_tagihans');
    }
};
