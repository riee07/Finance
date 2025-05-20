<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifTagihan extends Model
{
    use HasFactory;

    protected $table = 'tarif_tagihans';
    protected $primaryKey = 'id_tarif_tagihan';

    protected $fillable = ['jenis_tagihan_id', 'tahun_ajaran_id', 'jumlah_tarif'];

    // public function jenisTagihan()
    // {
    //     return $this->belongsTo(JenisTagihan::class, 'jenis_tagihan_id', 'id_jenis_tagihan');
    // }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id_tahun_ajaran');
    }

    public function jenisTagihan()
    {
        return $this->belongsTo(JenisTagihan::class, 'jenis_tagihan_id', 'id_jenis_tagihan');
    }

}
