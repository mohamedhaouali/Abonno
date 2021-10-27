<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockresponseholograms extends Model
{
    protected $fillable = [
        'stockrequest_holograms_id','type','beginnumber','endnumber','deliverydate'
    ];

    public function stock_hologram()
    {
        return $this->hasMany(Stock_hologram::class);
    }
}


