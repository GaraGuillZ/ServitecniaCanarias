<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $appends = ["Nombre"];

    protected $guarded = []; 

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
    
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function materiales(){
        return $this->belongsToMany('App\Models\Materiale');
    }

}
