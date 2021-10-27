<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = ['nom'];

    public function abonnementscolaires (){

        return $this->hasMany(Abonnementscolaire::class);
    }

    public function abonnementsociales(){

        return $this->hasMany(Abonnementsociale::class);
    }
}


