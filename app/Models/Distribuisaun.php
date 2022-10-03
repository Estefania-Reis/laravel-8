<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuisaun extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at','updated_at'];

    public function kliente(){
        return $this->belongsTo(Kliente::class, 'klienteIndividual_id', 'id');
    }

    public function Klientegrupo(){
        return $this->belongsTo(Klientegrupo::class, 'klienteGrupo_id', 'id');
    }
}
