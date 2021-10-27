<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockHologramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_holograms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agencies_id');
            $table->integer('numeroordre')->nullable();
            $table->unsignedBigInteger('holograms_id');
            $table->unsignedBigInteger('stockreturholgrams_id');

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
        Schema::dropIfExists('stock_holograms');
    }
}
