<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fohanikan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data_fo_han'];
    protected $time = ['oras_fo_han'];

    public function hahan (){
        return $this->belongsTo(Hahanikan::class,'hahan_id', 'id_hahan');
    }
    public function kolam (){
        return $this->belongsTo(Hahanikan::class,'kolam_id', 'id_kolam'); //relasaun ho datatipu string
    }
    public function hapa (){
        return $this->belongsTo(Hahanikan::class,'hapa_id', 'id_hapa');
    }
    public function employee (){
        return $this->belongsTo(Employee::class,'staff_id', 'id_employee');
    }
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Fohanikan::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_fohanikan = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
