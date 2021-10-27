<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockreturn_card extends Model
{
    protected $fillable = [
        'description','agencies_id','cards_id','returnreasoncards_id'
    ];



    public function stock_card()
    {
        return $this->hasMany(Stock_card::class);
    }

    public function returnreasoncards()
    {
        return $this->hasMany(Returnreasoncards::class);
    }




}


