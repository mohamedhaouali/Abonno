<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_responses', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('begin_number')->nullable();
            $table->string('end_number')->nullable();
            $table->integer('quantite')->nullable();
            $table->date('delivery_date')->nullable();
            $table->unsignedBigInteger('stock_request_id');

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
        Schema::dropIfExists('stock__responses');
    }
}
