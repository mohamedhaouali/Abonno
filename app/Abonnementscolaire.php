<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonnementscolaire extends Model
{
    protected $fillable = [
        'nom','prenomabonne','nomparent','prenomparent','datenaissance',
        'age','adresse','telephone','prixtotale','numero','cartereference',
        'profileimage','etudiant_id','region_id','etablissement_id',
        'municipalite_id','niveauscolaire_id','classe_id','typedepaiement_id',
        'ligne_id','periodeabonnement_id','stationdebut','stationfin','annee_id','station_id',
         'subscriptiontype_id'
    ];

    public function etudiant(){

        return $this->belongsTo(Etudiant::class);
    }

    public function region(){

        return $this->belongsTo(Region::class);
    }

    public function station(){

        return $this->belongsTo(Station::class);
    }



    public function municipalite(){

        return $this->belongsTo(Municipalite::class);
    }

    public function Niveauscolaire(){

        return $this->belongsTo(Niveauscolaire::class);
    }

    public function classe(){

        return $this->belongsTo(Classe::class);
    }

    public function etablissement(){

        return $this->belongsTo(Etablissement::class);
    }

    public function ligne(){

        return $this->belongsTo(Ligne::class);
    }

    public function Societe(){

        return $this->belongsTo(Societe::class);
    }

    public function periodeabonnement(){

        return $this->belongsTo(Periodeabonnement::class);
    }

    public function annee(){

        return $this->belongsTo(Annee::class);
    }

    public function typedepaiement(){

        return $this->belongsTo(Typedepaiement::class);
    }

    public function subscriptiontype(){

        return $this->belongsTo(Subscriptiontype::class);
    }


}
