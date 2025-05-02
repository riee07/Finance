<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\JenisTagihan;


class UsersOrder extends Model
{
    protected $table = 'tarif_tagihans';
    protected $guarded = [];

    public function jenisTagihan()
    {
        return $this->belongsTo(JenisTagihan::class, 'jenis_tagihan_id', 'id_jenis_tagihan');
    }
}
