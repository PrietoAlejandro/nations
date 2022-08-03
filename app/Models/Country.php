<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //la tabla a conectar
    protected $table = "countries";
    //clave primaria de esa tabla
    protected $primaryKey = "country_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //MANY TO MANY country - language
    //relationship
    public function languages()
    {
        //belongsToMany method:
        //1. related model
        //2. pivat table(intermediate table)
        //3. Foreign key of currentel model
        //4. foreign key of related model
        return $this->belongsToMany(Language::class ,'country_languages', 'country_id', 'language_id' );
    }

    //M:1 COUNTRY - REGION
    //RELATIONSHIP
    public function regions()
    {
        //belongs to method: parametros
        //1. related model
        //2. foreign key of related model in current model
        return $this->belongsTo(Region::class , 'region_id');
    }
}
