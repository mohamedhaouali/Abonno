<?php

namespace App\Imports;

use App\Abonnementcivile;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbonnementcivileImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Abonnementcivile ([
            'nom'     => $row['nom'],
            'prenom'  => $row['prenom'],
            'cin' => $row['cin'],

            'datenaissance' => $row['datenaissance'],
            'stationdebut' => $row['stationdebut'],
            'stationfin' => $row['stationfin'],



            'adresse' => $row['adresse'],
            'telephone' => $row['telephone'],
            'prixtotale' => $row['prixtotale'],
            'numero' => $row['numero'],
            'cartereference' => $row['cartereference'],

            'profileimage' => $row['profileimage'],
            'companie_id' => $row['companie_id'],


            'region_id' => $row['region_id'],
            'municipalite_id' => $row['municipalite_id'],


            'typedepaiement_id' => $row['typedepaiement_id'],


            'ligne_id' => $row['ligne_id'],
            'periodeabonnement_id' => $row['periodeabonnement_id'],

            'annee_id' => $row['annee_id'],

            'station_id' => $row['station_id'],
        ]);
    }
}
