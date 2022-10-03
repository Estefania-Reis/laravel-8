<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Kolam;
use App\Models\Bee;

class Tbkolam extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['oras_tb','data_tb','created_at','updated_at'];

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function kolam(){
        return $this->belongsTo(Kolam::class);
    }
    public function bee(){
        return $this->belongsTo(Bee::class);
    }
}
