<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockresponsecards extends Model
{
    protected $fillable = [
        'stockrequest_cards_id','type','beginnumber', 'deliverydate','endnumber'
    ];

    public function stock_card()
    {
        return $this->hasMany(Stock_card::class);
    }
}


