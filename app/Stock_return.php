<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_return extends Model
{
    protected $fillable = [
        'description','return_reason_id','cards_id','agencies_id'
    ];
}


