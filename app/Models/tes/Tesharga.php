<?php

namespace App\Models\tes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tesharga extends Model
{
    use HasFactory;

    // Jika nama tabel di database bukan plural dari model, tentukan nama tabel
    protected $table = 'tesharga'; // Ganti dengan nama tabel Anda jika berbeda

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = ['id','bulan', 'harga'];
}
