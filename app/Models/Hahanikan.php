<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hahanikan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data','data_hahan_expire','created_at', 'updated_at'];
}
