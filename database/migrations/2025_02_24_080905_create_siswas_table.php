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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('nisn')->unique();
            $table->enum('kelas', ['x', 'xi', 'xii', 'lulus']);
            $table->enum('jurusan', ['pplg', 'tjkt', 'an', 'dkv', 'ak', 'mp', 'dpb', 'lps', 'br']);
            $table->string('no_hp')->nullable();
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
