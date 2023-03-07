<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_category extends Model
{
    use HasFactory;

    protected $fillable = ['barcode', 'cat1', 'cat2', 'cat3'];
}