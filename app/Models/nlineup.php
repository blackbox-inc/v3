<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nlineup extends Model
{
    use HasFactory;
    protected $fillable = [
        'barcode',
        'fra_username',
        'fra_name',
        'position',
        'offer_status',
        'status',
        'account_officer',
    ];
}
