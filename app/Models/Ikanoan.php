<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikanoan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data','created_at', 'updated_at'];

    public function ikantolun(){
        return $this->belongsTo(Ikantolun::class);
    }
}
