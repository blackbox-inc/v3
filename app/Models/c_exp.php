<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_exp extends Model
{
    use HasFactory;
    protected $fillable = [
        'barcode',
        'cposition',
        'ccompany',
        'cdate',
        'sdesc',
        'ccountry',
    ];
}