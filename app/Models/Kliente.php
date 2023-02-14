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
        return $this->belongsTo(Aldeia::class,'aldeia_id','id');
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
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Kliente::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_kliente = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}

}
