<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockreturnCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockreturn_cards', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('agencies_id');
            $table->unsignedBigInteger('cards_id');
            $table->unsignedBigInteger('returnreasoncards_id');
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
        Schema::dropIfExists('stockreturn_cards');
    }
}
