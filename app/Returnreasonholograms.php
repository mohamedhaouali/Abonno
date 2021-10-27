<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returnreasonholograms extends Model
{
    protected $fillable = [
        'name_fr','name_ar'
    ];


    public function stock_hologram()
    {
        return $this->belongsTo(Stock_hologram::class);
    }

    public function stockreturn_hologram()
    {
        return $this->belongsTo(Stockreturn_hologram::class);
    }


}

