<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kualidade_bee extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $dates=['data'];

    public function series(){
        return $this->belongsTo(Serie::class);
    }
    public function kolam(){
        return $this->belongsTo(Kolam::class, 'kolam_id', 'id_kolam');
    }

    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Kualidade_bee::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_kualidadeBee = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
