<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriptions_lines extends Model
{
    protected $fillable = [
        'line_id','subscriptions_id'
    ];
}


