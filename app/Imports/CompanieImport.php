<?php

namespace App\Imports;

use App\Companie;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompanieImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Companie([
            'nom_fr'     => $row['nom_fr'],
            'nom_ar'  => $row['nom_ar'],
            'adresse'     => $row['adresse'],

        ]);


    }
}
