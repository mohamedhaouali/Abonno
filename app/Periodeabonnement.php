<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodeabonnement extends Model
{
    protected $fillable = ['datedebut','datefin','periode',
];

    public function typedepaiement(){

        return $this->belongsTo(Typedepaiement::class);
    }

    public function abonnementscolaires()
    {
        return $this->hasMany(Abonnementscolaire::class);
    }

    public function  abonnementciviles()
    {
        return $this->hasMany(Abonnementcivile::class);
    }

    public function abonnementsociales()
    {
        return $this->hasMany(Abonnementsociale::class);
    }

    public function periodeabonnements()
    {
        return $this->hasMany(Periodeabonnement::class);
    }

}
