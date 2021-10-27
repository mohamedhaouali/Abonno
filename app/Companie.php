<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    protected $fillable = ['nom_fr', 'nom_ar', 'adresse'];

    public function  customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function  abonnementciviles()
    {
        return $this->hasMany(Abonnementcivile::class);
    }
}
