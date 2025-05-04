<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsersOrder;  

class JenisTagihan extends Model
{
    use HasFactory;

    protected $table = 'jenis_tagihans';
    protected $primaryKey = 'id_jenis_tagihan';

    protected $fillable = ['jenis_tagihan'];

    public function tarifTagihan()
    {
        return $this->hasMany(TarifTagihan::class, 'jenis_tagihan_id', 'id_jenis_tagihan');
    }

    public function userOrders()
    {
        return $this->hasMany(UsersOrder::class, 'jenis_tagihan_id', 'id_jenis_tagihan');
    }
}
