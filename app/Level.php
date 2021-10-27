<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['nom'];

    public function  etablishments()
    {
        return $this->hasMany(Etablishment::class);
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
