<?php

namespace App\Models;

use App\Models\Kolam;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hapa extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at','updated_at'];

    public function kolam1(){
        return $this->belongsTo(Kolam::class,'kolam_id','id_kolam');
    }

    public function series(){
        return $this->belongsTo(Serie::class);
    }

    //generate id
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Hapa::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_hapa = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
