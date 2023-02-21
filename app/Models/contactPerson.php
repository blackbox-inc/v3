<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'contact_name',
        'relationship',
        'contact_number',
        'contract_address',
        'email',
    ];
}