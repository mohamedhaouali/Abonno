<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fr');
            $table->string('nom_ar')->nullable();
            $table->string('adresse')->nullable();

            $table->unsignedBigInteger('typesetablissement_id')->nullable();
            $table->foreign('typesetablissement_id')
                ->references('id')
                ->on("typesetablissements")->onDelete("cascade");

            $table->unsignedBigInteger('municipalite_id')->nullable();
            $table->foreign('municipalite_id')
                ->references('id')
                ->on("municipalites")->onDelete("cascade");

            $table->unsignedBigInteger('niveauscolaire_id')->nullable();

            $table->foreign('niveauscolaire_id')
                ->references('id')
                ->on("niveauscolaires")->onDelete("cascade");

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
        Schema::dropIfExists('etablissements');
    }
}
