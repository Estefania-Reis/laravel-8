<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidu extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at', 'data'];

    public function bind(){
        return $this->belongsTo(Kliente::class, 'id_benefisiariu_ind', 'id_kliente');
    }
    public function bgp(){
        return $this->belongsTo(Klientegrupo::class,'id_benefisiariu_gp','id_klientegrupo');
    }
}
