<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikannurseryd extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $dates = ['data'];

    public function series(){
        return $this->belongsTo(Serie::class);
    }
    public function nursery(){
        return $this->belongsTo(Ikanoan::class,'nursery_id','id_ikanoan');
    }
    public function distribuisaun(){
        return $this->belongsTo(Distribuisaun::class,'distribuisaun_id','id_distribuisaun');
    }

    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Ikannurseryd::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_ikannurseryd = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
