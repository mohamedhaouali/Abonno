<?php

namespace App\Imports;

use App\Client;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'nomabonne'     => $row['nomabonne'],
            'prenomabonne'  => $row['prenomabonne'],
            'cin'     => $row['cin'],

            'nomparent'     => $row['nomparent'],
            'prenomparent'  => $row['prenomparent'],


            'profileimage'  => $row['profileimage'],
            'clientstype_id' => $row['clientstype_id'],
            'ligne_id' => $row['ligne_id'],
            'prixtotale' => $row['prixtotale'],
            'classe_id' => $row['classe_id']


        ]);



    }
}
