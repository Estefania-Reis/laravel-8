<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockfertilizante extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data'];
    protected $time = ['oras'];

    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Stockfertilizante::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_stockfertilizante = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
