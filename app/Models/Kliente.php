<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kliente extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public function aldeia(){
        return $this->belongsTo(Aldeia::class,'aldeia_id', 'id');
    }
    public function suco(){
        return $this->belongsTo(Suco::class,'suco_id', 'id');
    }
    public function posto(){
        return $this->belongsTo(Posto::class,'posto_id', 'id');
    }
    public function municipio(){
        return $this->belongsTo(Municipio::class,'municipio_id', 'id');
    }

}
