<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sppx extends Model
{
    protected $table = 'sppxes';
    protected $fillable = ['bulan', 'harga'];
}
