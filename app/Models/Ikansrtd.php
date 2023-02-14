<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikansrtd extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data' ,'created_at', 'updated_at'];

    public function series(){
        return $this->belongsTo(Serie::class);
    }
    public function ikansrt(){
        return $this->belongsTo(Ikansrt::class, 'ikansrt_id', 'id_ikansrt');
    }
    public function nursery(){
        return $this->belongsTo(Ikanoan::class, 'nursery_id', 'id_ikanoan');
    }

    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Ikansrtd::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_ikansrtd = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
