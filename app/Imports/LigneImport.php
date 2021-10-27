<?php

namespace App\Imports;

use App\Ligne;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class LigneImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ligne([
            'nom_fr' => $row['nom_fr'],
            'nom_ar' => $row['nom_ar'],
            'num'     => $row['num'],
            'distance'  => $row['distance'],
            'prix'=> $row['prix'],
            'lignedebut' => $row['lignedebut'],
            'lignefin' => $row['lignefin'],
        ]);



    }
}
