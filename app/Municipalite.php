<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipalite extends Model
{
    protected $fillable = [
        'nom_fr','nom_ar','region_id','adresse'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function agences()
    {
        return $this->hasMany(Agence::class);
    }

    public function  etablissements()
    {
        return $this->hasMany(Etablissement::class);
    }

    public function  customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function abonnementscolaires(){

        return $this->hasMany(Abonnementscolaire::class);
    }

    public function  abonnementciviles()
    {
        return $this->hasMany(Abonnementcivile::class);
    }

    public function  abonnementsociales()
    {
        return $this->hasMany(Abonnementsociale::class);
    }

    public function typesetablissement()
    {
        return $this->belongsTo('App\Typesetablissement');
    }

}
