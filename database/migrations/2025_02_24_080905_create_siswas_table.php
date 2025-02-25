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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nama');
            $table->string('nis')->unique();
            $table->string('kelas');
            $table->unsignedBigInteger('tahun_ajaran_id')->nullable(); // FK harus dideklarasikan manual
            $table->foreign('tahun_ajaran_id')->references('id_tahun_ajaran')->on('tahun_ajarans')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status_aktif', ['aktif', 'non-aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
