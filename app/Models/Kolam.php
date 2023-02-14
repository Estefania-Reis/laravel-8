<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kolam extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates =['created_at','updated_at'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id_employee');
    }
    public function tipukolam(){
        return $this->belongsTo(Tipukolam::class,'tipu_kolam_id','id_tipukolam');
    }
    public function series(){
        return $this->belongsTo(Serie::class, 'series_id','id');
    }
    //id generate
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Kolam::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_kolam = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
