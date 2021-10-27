<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_requests extends Model
{
    //
}

$table->integer('numeroordre')->nullable();
$table->integer('numerocommande');
$table->unsignedBigInteger('cards_id');
$table->integer('type');
$table->integer('quantite');
$table->integer('status');
$table->unsignedBigInteger('agencies_id');
$table->date('deliverydate');
