<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_agencies', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable();
            $table->integer('stock_alert')->nullable();;
            $table->integer('quantite')->nullable();
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
        Schema::dropIfExists('stock_agencies');
    }
}
