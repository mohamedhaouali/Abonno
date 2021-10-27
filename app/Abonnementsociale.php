<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class   Abonnementsociale extends Model
{


    protected $fillable = [
        'nom','prenom','nomparent','prenomparent','cin','datenaissance','prixtotale',
        'adresse','telephone','profileimage',
        'region_id','municipalite_id',' periodeabonnement_id','ligne_id','datedulivraison','stationdebut',
        'stationfin','anneeuniversitaire','numero','cartereference','etudiant_id'
        ,'niveauscolaire_id','annee_id',
        'classe_id','etablissement_id','typedepaiement_id'
        ];

    public function region(){

        return $this->belongsTo(Region::class);
    }


    public function municipalite(){

        return $this->belongsTo(Municipalite::class);
    }

    public function ligne(){

        return $this->belongsTo(Ligne::class);
    }

    public function Etudiant(){

        return $this->belongsTo(Etudiant::class);
    }

    public function Niveauscolaire(){

        return $this->belongsTo(Niveauscolaire::class);
    }

    public function Classe(){

        return $this->belongsTo(Classe::class);
    }

    public function Etablissement(){

        return $this->belongsTo(Etablissement::class);
    }

    public function Typedepaiement(){

        return $this->belongsTo(Typedepaiement::class);
    }

    public function periodeabonnement(){

        return $this->belongsTo(Periodeabonnement::class);
    }

    public function annee(){

        return $this->belongsTo(Annee::class);
    }

}
