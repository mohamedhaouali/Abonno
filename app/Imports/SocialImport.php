<?php

namespace App\Imports;

use App\Social;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SocialImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Social([
            'nomparent'     => $row['nomparent'],
            'prenomparent'  => $row['prenomparent'],
            'nomabonne'     => $row['nomabonne'],
            'prenomabonne'  => $row['prenomabonne'],
            'cin'=> $row['cin'],
            'nombrenfants'=> $row['nombrenfants'],
            'nomenfant1'=>$row['nomenfant1'],
            'nomenfant2'=>$row['nomenfant2'],
            'nomenfant3'=>$row['nomenfant3'],
            'nomenfant4'=>$row['nomenfant4'],
            'nomenfant5'=>$row['nomenfant5'],
            'nomenfant6'=>$row['nomenfant6'],
            'nomenfant7'=>$row['nomenfant7'],
            'ligne_id'=>$row['ligne_id'],
            'classe_id'=>$row['classe_id'],

        ]);

    }
}
