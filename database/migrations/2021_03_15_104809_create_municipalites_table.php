<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fr');
            $table->string('nom_ar')->nullable();
            $table->string('adresse')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');


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
        Schema::dropIfExists('municipalites');
    }
}
