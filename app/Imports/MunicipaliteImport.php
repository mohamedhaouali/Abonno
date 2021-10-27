<?php

namespace App\Imports;

use App\Municipalite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MunicipaliteImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Municipalite([
            'nom_fr'     => $row['nom_fr'],
            'nom_ar'  => $row['nom_ar'],
            'region_id'     => $row['region_id'],
            'adresse' => $row['adresse'],
        ]);

    }
}
