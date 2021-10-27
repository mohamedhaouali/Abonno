<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agencies_id');
            $table->integer('numeroordre')->nullable();
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('stockreturncard_id');
            $table->string('reference')->nullable();
            $table->integer('type')->nullable();
            $table->string('begin_number')->nullable();
            $table->string('end_number')->nullable();
            $table->integer('quantite')->nullable();
            $table->integer('user_id')->nullable();



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
        Schema::dropIfExists('stock_cards');
    }
}
