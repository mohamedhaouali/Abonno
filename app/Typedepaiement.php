<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typedepaiement extends Model
{
    protected $fillable = ['nom_fr', 'nom_ar'];

    public function periodeabonnements()
    {
        return $this->hasMany(Periodeabonnement::class);
    }

    public function  abonnementscolaires()
    {
        return $this->hasMany(Abonnementscolaire::class);
    }


    public function  abonnementciviles()
    {
        return $this->hasMany(Abonnementcivile::class);
    }

    public function abonnementsociales(){

        return $this->hasMany(Abonnementsociale::class);
    }

    public function clients(){

        return $this->hasMany(Client::class);
    }
}
