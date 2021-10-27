<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockrequestHologramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockrequest_holograms', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroordre')->nullable();
            $table->integer('numerocommande');
            $table->unsignedBigInteger('agencies_id');
            $table->unsignedBigInteger('holograms_id');
            $table->integer('quantite')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('stockrequest_holograms');
    }
}
