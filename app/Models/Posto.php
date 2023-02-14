<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posto extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at','updated_at'];

    public function municipio(){
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Candidatoikanb::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_posto = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
