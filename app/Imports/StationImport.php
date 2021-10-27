<?php

namespace App\Imports;

use App\Station;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Station([
            'nombre'     => $row['nombre'],
            'nom_fr'     => $row['nom_fr'],
            'nom_ar'  => $row['nom_ar'],
            'ligne_id'     => $row['ligne_id'],
            'lat' => $row['lat'],
            'long' => $row['long'],
        ]);

    }
}
