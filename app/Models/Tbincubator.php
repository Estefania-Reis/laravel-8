<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbincubator extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['data','created_at','updated_at'];

    public function incubator(){
        return $this->belongsTo(Incubator::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
