<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

public function users(){
// role appartient a plusieurs utilisateurs

    return $this->belongsToMany('App\User');
}

}
