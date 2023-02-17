<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_contact extends Model
{
    use HasFactory;

    protected $fillable = ['barcode', 'type', 'contact_details'];
}
