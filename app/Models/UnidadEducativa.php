<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadEducativa extends Model
{
    use HasFactory;

    public function infraestructuraEducativa(){
        return $this->belongsTo(InfraestructuraEducativa::class,'id_infraestructura_educativa');
    }
}
