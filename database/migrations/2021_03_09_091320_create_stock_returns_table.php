<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_returns', function (Blueprint $table) {
            $table->id();
            $table->integer('description')->nullable();
            $table->unsignedBigInteger('return_reason_id');
            $table->unsignedBigInteger('cards_id');
            $table->unsignedBigInteger('agencies_id');
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
        Schema::dropIfExists('stock_returns');
    }
}
