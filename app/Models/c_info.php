<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'fullname',
        'email',
        'pw',
        'account_officer',
        'status',
        'remarks',
        'allowed',
        'category',
        'passport_no',
    ];
}