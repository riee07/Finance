<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTagihan extends Model
{
    use HasFactory;

    protected $table = 'detail_tagihan';
    protected $primaryKey = 'id_detail';

    protected $fillable = ['tagihan_id', 'tarif_id', 'jumlah'];

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'tagihan_id', 'id_tagihan');
    }

    public function tarifTagihan()
    {
        return $this->belongsTo(TarifTagihan::class, 'tarif_id', 'id_tarif');
    }
}
