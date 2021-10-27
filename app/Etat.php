<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    protected $fillable = ['nom'];

    public function cars() {
        $this->hasMany(Car::class);
    }
}
