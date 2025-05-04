<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\JenisTagihan;
use App\Models\Admin\TahunAjaran;

class UsersOrder extends Model
{
    protected $table = 'tarif_tagihans';
    protected $primaryKey = 'id_tarif_tagihan'; // Tambahkan ini
    protected $guarded = [];

    public function jenisTagihan() {
        return $this->belongsTo(JenisTagihan::class, 'jenis_tagihan_id', 'id_jenis_tagihan');
    }

    public function tahunAjaran() {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id_tahun_ajaran');
    }
}