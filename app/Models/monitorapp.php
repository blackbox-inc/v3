<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monitorapp extends Model
{
    use HasFactory;
    protected $fillable = ['barcode', 'status'];
}
