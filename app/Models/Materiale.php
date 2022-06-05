<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiale extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = []; 

    public function partes(){
        return $this->belongsToMany('App\Models\Parte');
    }
}
