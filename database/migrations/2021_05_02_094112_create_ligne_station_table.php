<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_station', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ligne_id')->nullable();
            $table->foreign('ligne_id')
                ->references('id')
                ->on("lignes")->onDelete("cascade");

            $table->unsignedBigInteger('station_id')->nullable();
            $table->foreign('station_id')
                ->references('id')
                ->on("stations")->onDelete("cascade");

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
        Schema::dropIfExists('ligne_station');
    }
}
