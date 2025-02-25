<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajarans';
    protected $primaryKey = 'id_tahun_ajaran';

    protected $fillable = ['tahun_ajaran', 'status'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'tahun_ajaran_id', 'id_tahun_ajaran');
    }

    public function tarifTagihan()
    {
        return $this->hasMany(TarifTagihan::class, 'tahun_ajaran_id', 'id_tahun_ajaran');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'tahun_ajaran_id', 'id_tahun_ajaran');
    }
}
