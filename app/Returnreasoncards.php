<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returnreasoncards extends Model
{
    protected $fillable = [
        'name_fr','name_ar'
    ];

    public function returnreasoncards()
    {
        return $this->hasMany(Returnreasoncards::class);
    }
    public function stockresponsecards()
    {
        return $this->belongsTo(Stockresponsecards::class);
    }
}
