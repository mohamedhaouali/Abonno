<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lignestation extends Model
{
    protected $table = "ligne_station";
    protected $fillable = [
        'ligne_id','station_id'
    ];
}


