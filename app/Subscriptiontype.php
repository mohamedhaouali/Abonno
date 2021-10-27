<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriptiontype extends Model
{
    protected $fillable = [
        'type','nom_fr','nom_ar','description','subscriptiontype_id'
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }


}
