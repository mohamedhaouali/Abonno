<?php

namespace App\Imports;

use App\Etablissement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EtablissementImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Etablissement([
            'nom_fr'     => $row['nom_fr'],
            'nom_ar'  => $row['nom_ar'],
            'municipalite_id'     => $row['municipalite_id'],
            'adresse' => $row['adresse'],
            'typesetablissement_id' => $row['typesetablissement_id'],
            'niveauscolaire_id' => $row['niveauscolaire_id'],
        ]);

    }
}
