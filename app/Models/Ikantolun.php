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
    protected $dates = ['data','created_at','updated_at'];

    public function ikan(){
        return $this->belongsTo(Ikan::class, 'ikan_id', 'id');
    }
    public function bee(){
        return $this->belongsTo(Bee::class, 'bee_id', 'id');
    }
    public function incubator(){
        return $this->belongsTo(Incubator::class, 'incubator_id', 'id');
    }
}
