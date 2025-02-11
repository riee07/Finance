<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sppxi extends Model
{
    protected $table = 'sppxis';
    protected $fillable = ['bulan_XI', 'harga_XI'];
}
