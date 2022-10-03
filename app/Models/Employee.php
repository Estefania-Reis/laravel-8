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
        return $this->belongsTo(Religion::class,'id_religions','id');
    }
    
}
