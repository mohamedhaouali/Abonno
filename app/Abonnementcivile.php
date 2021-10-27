<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonnementcivile extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'datenaissance',
        'adresse',
        'telephone',
        'prixtotale',
        'numero',
        'cartereference',
        'profileimage',
        'companie_id',
        'region_id',
        'municipalite_id',
        'typedepaiement_id',
        'ligne_id',
        'anneeuniversitaire',
        'stationdebut',
        'stationfin',
        'annee_id',
        'station_id',
        'periodeabonnement_id'
    ];



    public function companie(){

        return $this->belongsTo(Companie::class);
    }

    public function region(){

        return $this->belongsTo(Region::class);
    }



    public function municipalite(){

        return $this->belongsTo(Municipalite::class);
    }



    public function typedepaiement(){

        return $this->belongsTo(Typedepaiement::class);
    }

    public function ligne(){

        return $this->belongsTo(Ligne::class);
    }

    public function periodeabonnement(){

        return $this->belongsTo(Periodeabonnement::class);
    }

    public function annee(){

        return $this->belongsTo(Annee::class);
    }

    public function station(){

        return $this->belongsTo(Station::class);
    }

}
