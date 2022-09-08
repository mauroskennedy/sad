<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfraestructuraEducativa extends Model
{
    use HasFactory;

    public function distritos(){
        return $this->belongsTo(Distrito::class,'id_distrito');
    }
    public function unidadEducativa(){
        return $this->hasMany(UnidadEducativa::class,'id');
    }

}
