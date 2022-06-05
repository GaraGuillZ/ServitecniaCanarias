<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = []; 


    public function averias(){
        return $this->hasMany(Averia::class);
    }
    public function partes(){
        return $this->hasMany(Parte::class);
    }
}
