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
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Klientegrupo::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_klientegrupo = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
