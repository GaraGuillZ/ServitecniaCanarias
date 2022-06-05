<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Averia extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $appends = ["Nombre"];
    protected $fillable = ['file'];
    protected $guarded = []; 
    protected $casts = [
        'estado' => 'boolean',
    ];
    

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
    
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
   
}
