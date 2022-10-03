<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['periodo','periodo_expire','created_at','updated_at'];

    public function orijem(){
        return $this->belongsTo(Orijemikan::class,'orijem_id','id');
    }
    public function kolam(){
        return $this->belongsTo(Kolam::class);
    }
    public function tipuikan(){
        return $this->belongsTo(Tipuikan::class, 'tipu_id','id');
    }

}
