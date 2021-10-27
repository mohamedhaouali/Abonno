<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_hologram extends Model
{
    protected $fillable = [
        'agencies_id','numeroordre','holograms_id','stockreturholgrams_id'
    ];



    public function agencies()
    {
        return $this->belongsTo(Agencies::class);
    }

    public function stockreturn_hologram()
    {
        return $this->hasMany(Stockreturn_hologram::class);
    }
    public function stockresponseholograms()
    {
        return $this->belongsTo(Stockresponseholograms::class);
    }
}
