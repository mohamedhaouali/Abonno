<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockrequest_cards extends Model
{
    protected $fillable = [
        'numeroordre','numerocommande','cards_id','type','quantite','status',
        'agencies_id','deliverydate'
    ];
    public function stock_card()
    {
        return $this->belongsTo(Stock_card::class);
    }
}


