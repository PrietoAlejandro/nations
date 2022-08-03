<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //la tabla a conectar
    protected $table = "languages";
    //clave primaria de esa tabla
    protected $primaryKey = "language_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //M:M LANGUAGE COUNTRY
    //Relationship
    public function paises()
    {
        return $this->belongsToMany(Country::class, 'country_languages', 'language_id', 'country_id');
    }
}
