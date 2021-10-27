<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_card extends Model
{
    protected $fillable = [
        'agencies_id','numeroordre','card_id','stockreturncard_id','reference',
        'type','begin_number','end_number','quantite','user_id'
    ];

    public function agencies()
    {
        return $this->belongsTo(Agencies::class);
    }
    public function stockreturn_card()
    {
        return $this->hasMany(Stockreturn_card::class);
    }
    public function stockrequest_cards()
    {
        return $this->hasMany(Stockrequest_cards::class);
    }
    public function stockresponsecards()
    {
        return $this->belongsTo(Stockresponsecards::class);
    }
}


