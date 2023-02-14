<?php

namespace App\Models;

use App\Models\Religion;
use App\Models\Niveleducasaun;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at', 'data_moris'];

    public function niveleducasauns(){
        return $this->belongsTo(Niveleducasaun::class, 'nivel_ed_id', 'id');
    }
    public function religions(){
        return $this->belongsTo(Religion::class,'id_religions','id_religion');
    }

    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Employee::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_employee = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
    
}
