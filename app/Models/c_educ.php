<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_educ extends Model
{
    use HasFactory;

    protected $fillable = ['barcode', 'degree', 'school', 'school_year'];
}
