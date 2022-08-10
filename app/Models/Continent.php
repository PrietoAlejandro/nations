<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //la tabla a conectar
    protected $table = "continents";
    //clave primaria de esa tabla
    protected $primaryKey = "continent_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //relacion entre continente y sus regiones
    public function regiones()
    {
        //parameters
        //1. Linkend model
        //2.Foreign Key of current model into model related model region
        return $this->hasMany(Region::class, 'continent_id');
    }

    //relacion entre continente y paises
    // Continent abuelo
    // region papa
    // country nieto
    public function paises()
    {
        //parameters
        // 1-NIETO
        //2-PAPA
        //3-FK DEL ABUELO EN EL PAPA
        return $this->hasManyThrough(Country::class, Region::class, 'continent_id', 'region_id');
    }
}
