<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fdh extends Model
{
    use HasFactory;

    protected $fillable = ['barcode', 'applicant_name', 'username'];
}
