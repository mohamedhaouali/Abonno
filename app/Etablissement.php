<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $fillable = [
        'nom_fr','nom_ar','municipalite_id','adresse','typesetablissement_id','niveauscolaire_id'
    ];

    public function typesetablissement()
    {
        return $this->belongsTo('App\Typesetablissement');
    }


    public function municipalite()
    {
        return $this->belongsTo('App\Municipalite');
    }

    public function Niveauscolaire()
    {
        return $this->belongsTo(Niveauscolaire::class);
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
