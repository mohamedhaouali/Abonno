<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_agencies extends Model
{
    protected $fillable = [
        'type','stock_alert','quantite','agencies_id'
    ];
}


