<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_Responses extends Model
{
    protected $fillable = [
        'type','begin_number','end_number','quantite','delivery_date','stock_request_id'
    ];
}


