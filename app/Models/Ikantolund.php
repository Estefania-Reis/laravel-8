<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikantolund extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $dates=['data'];

    public function series(){
        return $this->belongsTo(Serie::class);
    }
    public function ikantolun(){
        return $this->belongsTo(Ikantolun::class,'ikantolun_id','id_ikantolun');
    }
    public function ikansrt(){
        return $this->belongsTo(Ikansrt::class,'srt_id','id_ikansrt');
    }

    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Ikantolund::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_ikantolund = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
