<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    use HasFactory;
    
    public function urbanizaciones(){
        return $this->belongsTo(Urbanizacion::class,'id_urbanizacion');
    }
    public function cargos(){
        return $this->belongsTo(Cargo::class,'id_cargo');
    }
}
