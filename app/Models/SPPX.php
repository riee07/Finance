<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPPX extends Model
{
    protected $table = 'sppx';
    protected $fillable = ['bulan', 'harga'];
}
