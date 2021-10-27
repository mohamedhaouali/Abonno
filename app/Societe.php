<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    protected $fillable = ['nom'];

    public function subscriptions(){

        return $this->hasMany(Subscription::class);
    }
}
