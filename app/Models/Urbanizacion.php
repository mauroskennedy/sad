<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urbanizacion extends Model
{
    use HasFactory;

    public function distritos(){
        return $this->belongsTo(Distrito::class,'id_distrito');
    }
    public function representantes(){
        return $this->hasMany(Representante::class,'id');
    }
}
