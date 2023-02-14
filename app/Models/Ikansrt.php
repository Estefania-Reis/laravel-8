<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikansrt extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data_husik', 'data_hasai'];

    public function kolam(){
        return $this->belongsTo(Kolam::class, 'kolam_id','id_kolam');
    }
    public function hapa(){
        return $this->belongsTo(Hapa::class, 'hapa_id','id_hapa');
    }
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Ikansrt::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_ikansrt = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
