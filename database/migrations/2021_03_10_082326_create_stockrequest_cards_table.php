<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockrequestCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockrequest_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroordre')->nullable();
            $table->integer('numerocommande');
            $table->unsignedBigInteger('cards_id');
            $table->integer('type');
            $table->integer('quantite');
            $table->integer('status');
            $table->unsignedBigInteger('agencies_id');
            $table->date('deliverydate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockrequest_cards');
    }
}
