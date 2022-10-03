<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolamhapa extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $dates =['created_at','updated_at'];

    public function kolam(){
        return $this->belongsTo(Kolam::class, 'kolam_id', 'id');
    }
    public function hapa(){
        return $this->hasMany(Hapa::class, 'hapa_id', 'id');
    }
}
