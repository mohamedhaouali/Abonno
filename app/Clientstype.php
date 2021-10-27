<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientstype extends Model
{
    protected $fillable = ['nom_fr','nom_ar'];

    public function  clients()
    {
        return $this->hasMany(Client::class);
    }
}
