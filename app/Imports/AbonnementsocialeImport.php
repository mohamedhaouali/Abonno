<?php

namespace App\Imports;

use App\Abonnementsociale;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbonnementsocialeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Abonnementsociale([
            'nom'     => $row['nom'],
            'prenom'  => $row['prenom'],
            'nomparent'     => $row['nomparent'],
            'prenomparent' => $row['prenomparent'],
            'cin' => $row['cin'],

            'datenaissance' => $row['datenaissance'],
            'prixtotale'=> $row['prixtotale'],
            'stationdebut' => $row['stationdebut'],
            'stationfin' => $row['stationfin'],

            'numero'  => $row['numero'],
            'cartereference'=> $row['cartereference'],
            'age' => $row['age'],

            'adresse' => $row['adresse'],


            'telephone' => $row['telephone'],
            'profileimage' => $row['profileimage'],

            'etudiant_id' => $row['etudiant_id'],
            'region_id' => $row['region_id'],

            'municipalite_id' => $row['municipalite_id'],
            'niveauscolaire_id'=> $row['niveauscolaire_id'],
            'classe_id'=> $row['classe_id'],
            'etablissement_id'=> $row['etablissement_id'],
            'typedepaiement_id'=> $row['typedepaiement_id'],


            'ligne_id' => $row['ligne_id'],


            'periodeabonnement_id' => $row['periodeabonnement_id'],
            'annee_id' => $row['annee_id'],

            'station_id' => $row['station_id'],
        ]);
    }
}
