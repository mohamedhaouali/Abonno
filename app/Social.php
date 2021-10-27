<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{

    protected $fillable = ['nomparent','prenomparent','nomabonne','prenomabonne',
        'cin','nombrenfants',
        'nomenfant1', 'nomenfant2','nomenfant3','nomenfant4','nomenfant5',
        'nomenfant6', 'nomenfant7','ligne_id','classe_id'

    ];

    public function ligne(){

        return $this->belongsTo(Ligne::class);
    }

    public function classe(){

        return $this->belongsTo(Classe::class);
    }

}
