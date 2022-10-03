<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klientegrupo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at','updated_at'];
    
    public function aldeia(){
        return $this->belongsTo(Aldeia::class,'r_aldeia', 'id');
    }
    public function suco(){
        return $this->belongsTo(Suco::class,'r_suku', 'id');
    }
    public function posto(){
        return $this->belongsTo(Posto::class,'r_postu', 'id');
    }
    public function municipio(){
        return $this->belongsTo(Municipio::class,'r_munisipio', 'id');
    }
}
