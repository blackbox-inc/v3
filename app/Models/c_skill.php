<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'sdesc',
        'washing',
        'cleaning',
        'ironing',
        'sewing',
        'cooking',
        'baby_care',
        'english',
        'arabic',
        'mandarin',
    ];
}
