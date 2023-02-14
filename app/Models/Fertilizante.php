<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizante extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data_import', 'data_expire'];
    
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Fertilizante::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_fertilizante = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
