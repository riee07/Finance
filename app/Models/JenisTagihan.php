<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTagihan extends Model
{
    use HasFactory;

    protected $table = 'jenis_tagihans';
    protected $primaryKey = 'id_jenis_tagihan';

    protected $fillable = ['nama_tagihan'];

    public function tarifTagihan()
    {
        return $this->hasMany(TarifTagihan::class, 'jenis_tagihan_id', 'id_jenis_tagihan');
    }
}
