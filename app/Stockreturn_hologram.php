<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockreturn_hologram extends Model
{
    protected $fillable = [
        'description','agencies_id','holograms_id','returnreasonholograms_id'
    ];


    public function stock_hologram()
    {
        return $this->belongsTo(Stock_hologram::class);
    }
    public function returnreasonholograms()
    {
        return $this->hasMany(Returnreasonholograms::class);
    }

}


