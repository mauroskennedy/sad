<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    public function urbanizaciones(){
        return $this->hasMany(Urbanizacion::class,'id');
    }

    public function infraestructuraEducativa(){
        return $this->hasMany(infraestructuraEducativa::class,'id');
    }
}
