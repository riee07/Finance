<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sppxi extends Model
{
    protected $table = 'sppxis';
    protected $fillable = ['bulan', 'harga'];
}
