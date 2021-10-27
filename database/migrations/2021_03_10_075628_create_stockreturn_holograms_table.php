<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockreturnHologramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockreturn_holograms', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('agencies_id');
            $table->unsignedBigInteger('holograms_id');
            $table->unsignedBigInteger('returnreasonholograms_id');
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
        Schema::dropIfExists('stockreturn_holograms');
    }
}
