<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTagihan extends Model
{
    use HasFactory;

    protected $table = 'detail_tagihans';
    protected $primaryKey = 'id_detail_tagihan';

    protected $fillable = ['tagihan_id', 'tarif_tagihan_id', 'jumlah_tagihan'];

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'tagihan_id', 'id_tagihan');
    }

    public function tarifTagihan()
    {
        return $this->belongsTo(TarifTagihan::class, 'tarif_tagihan_id', 'id_tarif_tagihan');
    }
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

}
