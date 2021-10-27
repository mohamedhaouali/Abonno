<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'nom'
    ];
    public function abonnementscolaires(){

        return $this->hasMany(Abonnementscolaire::class);
    }

    public function abonnementsociales(){

        return $this->hasMany(Abonnementsociale::class);
    }

    public function clients(){

        return $this->hasMany(Client::class);
    }

    public function  socials()
    {
        return $this->hasMany(Social::class);
    }
}
