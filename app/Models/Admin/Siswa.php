<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'user_id',
        'name',
        'nisn',
        'kelas',
        'jurusan',
        'no_hp',
        'tahun_ajaran_id',
        'status_aktif',
    ];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id_tahun_ajaran');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'siswa_id', 'id_siswa');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
