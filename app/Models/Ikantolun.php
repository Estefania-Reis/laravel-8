<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ikan;
use App\Models\Employee;
use App\Models\Bee;
use App\Models\Incubator;


class Ikantolun extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data_kolleta','created_at','updated_at'];

    public function ikan(){
        return $this->belongsTo(Ikanbrood::class, 'ikan_id', 'id_ikanbrood');
    }
    public function employee(){
        return $this->belongsTo(Employee::class, 'staff_id', 'id');
    }
    public function kolam(){
        return $this->belongsTo(Kolam::class, 'kolam_id', 'id_kolam');
    }
    public function hapa(){
        return $this->belongsTo(Hapa::class, 'hapa_id', 'id_hapa');
    }
    public function incubator(){
        return $this->belongsTo(Incubator::class, 'incubator_id', 'id_incubator');
    }
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Ikantolun::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_ikantolun = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
