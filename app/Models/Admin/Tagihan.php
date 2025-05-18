<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihans';
    protected $primaryKey = 'id_tagihan';

    protected $fillable = ['siswa_id', 'tahun_ajaran_id', 'total_tagihan', 'status_pembayaran'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id_siswa');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id_tahun_ajaran');
    }

    public function detailTagihan()
    {
        return $this->hasMany(DetailTagihan::class, 'tagihan_id', 'id_tagihan');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
