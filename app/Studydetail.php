<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studydetail extends Model
{
    protected $filiable = [
        'name','level_id','etablissement_id'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
}
