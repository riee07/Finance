<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihanxi extends Model
{
    protected $table = 'tagihanxis';
    
    protected $fillable = ['judul_XI', 'harga_XI', 'kelas_XI'];

}
