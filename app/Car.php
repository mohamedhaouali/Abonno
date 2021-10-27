<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'nom','marque','date_circulation','place_number','condition','comment',
        'ligne_id','etat_id'

    ];

    public function ligne(){
        return $this->belongsTo(Ligne::class);
    }

    public function Etat(){
        return $this->belongsTo(Etat::class);
    }
}



