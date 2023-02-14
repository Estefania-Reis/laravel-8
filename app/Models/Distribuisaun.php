<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuisaun extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data','created_at','updated_at'];

    // public function aldeia(){
    //     return $this->belongsTo(Aldeia::class, 'aldeia_id', 'id');
    // }
    // public function suco(){
    //     return $this->belongsTo(Suco::class, 'suku_id', 'id');
    // }

    // public function posto(){
    //     return $this->belongsTo(Posto::class, 'postu_id', 'id');
    // }
    // public function municipio(){
    //     return $this->belongsTo(Municipio::class, 'munisipio_id', 'id');
    // }
    public function nursery(){
        return $this->belongsTo(Ikanoan::class, 'nursery_id', 'id_ikanoan');
    }

    public function nurseryn(){
        return $this->belongsTo(Ikannurseryn::class, 'nurseryn_id', 'id_ikannurseryn');
    }  

    public function klienteind(){
        return $this->belongsTo(Kliente::class, 'klienteIndividual_id', 'id_kliente');
    }

    public function klientegrupo(){
        return $this->belongsTo(Klientegrupo::class, 'klienteGrupo_id', 'id_klientegrupo');
    }
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Distribuisaun::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_distribuisaun = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
