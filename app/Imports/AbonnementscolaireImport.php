<?php

namespace App\Imports;

use App\Abonnementscolaire;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbonnementscolaireImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Abonnementscolaire([
            'nom'     => $row['nom'],
            'prenomabonne'  => $row['prenomabonne'],
            'nomparent' => $row['nomparent'],
            'prenomparent' => $row['prenomparent'],

            'datenaissance' => $row['datenaissance'],
            'age' => $row['age'],
            'adresse' => $row['adresse'],


            'telephone' => $row['telephone'],
            'prixtotale' => $row['prixtotale'],
            'numero' => $row['numero'],
            'cartereference' => $row['cartereference'],

            'profileimage' => $row['profileimage'],
            'etudiant_id' => $row['etudiant_id'],


            'region_id' => $row['region_id'],
            'etablissement_id' => $row['etablissement_id'],
            'municipalite_id' => $row['municipalite_id'],
            'niveauscolaire_id' => $row['niveauscolaire_id'],
            'classe_id' => $row['classe_id'],

            'typedepaiement_id' => $row['typedepaiement_id'],


            'ligne_id' => $row['ligne_id'],
            'periodeabonnement_id' => $row['periodeabonnement_id'],

            'stationdebut' => $row['stationdebut'],

            'stationfin' => $row['stationfin'],


            'annee_id' => $row['annee_id'],

            'station_id' => $row['station_id'],
        ]);
    }
}
