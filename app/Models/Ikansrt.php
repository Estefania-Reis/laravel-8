<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikansrt extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data'];

    public function kolam(){
        return $this->belongsTo(Kolam::class);
    }
}
