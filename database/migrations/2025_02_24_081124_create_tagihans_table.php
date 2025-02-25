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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id('id_tagihan');
            $table->unsignedBigInteger('siswa_id')->nullable(); // FK harus dideklarasikan manual
            $table->foreign('siswa_id')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tahun_ajaran_id')->nullable(); // FK harus dideklarasikan manual
            $table->foreign('tahun_ajaran_id')->references('id_tahun_ajaran')->on('tahun_ajarans')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('total_tagihan', 10, 2);
            $table->enum('status_pembayaran', ['belum lunas', 'lunas'])->default('belum lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
