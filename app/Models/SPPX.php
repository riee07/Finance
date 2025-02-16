<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sppx extends Model
{
    protected $table = ['s_p_p_x_e_s'];

    protected $fillable = ['id','bulan', 'harga'];
}
