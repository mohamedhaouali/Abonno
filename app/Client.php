<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nomabonne','prenomabonne','cin','profileimage','nomparent',
        'prenomparent','prixtotale','clientstype_id','ligne_id','classe_id'
    ];



    public function clientstype()
    {
        return $this->belongsTo(Clientstype::class);
    }


    public function ligne(){

        return $this->belongsTo(Ligne::class);
    }

    public function classe(){

        return $this->belongsTo(Classe::class);
    }

    public function clienttype(){

        return $this->belongsTo(Clientstype::class);
    }


}
