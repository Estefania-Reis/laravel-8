<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hahanikan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data_import','data_expire','created_at', 'updated_at'];

    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Hahanikan::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_hahanikan = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
