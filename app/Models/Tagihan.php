<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihans';

    protected $fillable = ['id','judul', 'harga'];

}
