<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basic_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'gender',
        'dob',
        'pob',
        'height',
        'weight',
        'religion',
        'marital_status',
        'no_of_children',
        'objectives',
        'photo',
    ];
}
