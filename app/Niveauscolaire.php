<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveauscolaire extends Model
{
    protected $fillable = ['nom_fr','nom_ar'];

    public function  etablissements()
    {
        return $this->hasMany(Etablissement::class);
    }

    public function  studydetails()
    {
        return $this->hasMany(Studydetail::class);
    }

    public function abonnementscolaires(){

        return $this->hasMany(Abonnementscolaire::class);
    }

    public function abonnementsociales(){

        return $this->hasMany(Abonnementsociale::class);
    }
}


