<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurserynd extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $dates =['data'];

    public function series(){
        return $this->belongsTo(Serie::class);
    }
    public function nurseryn(){
        return $this->belongsTo(Ikannurseryn::class,'nurseryn_id','id_ikannurseryn');
    }
    public function distribuisaun(){
        return $this->belongsTo(Distribuisaun::class,'distribuisaun_id','id_distribuisaun');
    }

    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Nurserynd::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_ikannurserynd = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
