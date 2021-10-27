<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockresponsecardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockresponsecards', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('stockrequest_cards_id');
            $table->string('type')->nullable();
            $table->string('beginnumber')->nullable();
            $table->string('endnumber')->nullable();
            $table->date('deliverydate')->nullable();
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
        Schema::dropIfExists('stockresponsecards');
    }
}
