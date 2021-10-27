<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->string('nom')->unique();
            $table->string('marque')->nullable();
            $table->date('date_circulation')->nullable();
            $table->integer('place_number')->nullable();
            $table->string('condition')->nullable();
            $table->string('comment')->nullable();

            $table->unsignedBigInteger('ligne_id')->nullable();
            $table->foreign('ligne_id')
                ->references('id')
                ->on("lignes")->onDelete("cascade");

            $table->unsignedBigInteger('etat_id')->nullable();
            $table->foreign('etat_id')
                ->references('id')
                ->on("etats")->onDelete("cascade");


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
        Schema::dropIfExists('cars');
    }
}
