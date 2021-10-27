<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typesetablissement extends Model
{
    protected $fillable = ['nom_fr','nom_ar'];

    public function  etablissements()
    {
        return $this->hasMany(Etablissement::class);
    }
    public function  municipalites()
    {
        return $this->hasMany(Municipalite::class);
    }


}




