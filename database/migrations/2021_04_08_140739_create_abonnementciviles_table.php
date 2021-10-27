<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnementcivilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnementciviles', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->integer('cin')->nullable();
            $table->date('datenaissance')->nullable();

            $table->string('stationdebut')->nullable();
            $table->string('stationfin')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->float('prixtotale')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('cartereference')->nullable();
            $table->string('profileimage');


            $table->unsignedBigInteger('companie_id')->nullable();
            $table->foreign('companie_id')
                ->references('id')
                ->on("companies")->onDelete("cascade");




            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')
                ->references('id')
                ->on("regions")->onDelete("cascade");


            $table->unsignedBigInteger('municipalite_id')->nullable();
            $table->foreign('municipalite_id')
                ->references('id')
                ->on("municipalites")->onDelete("cascade");




            $table->unsignedBigInteger('typedepaiement_id')->nullable();
            $table->foreign('typedepaiement_id')
                ->references('id')
                ->on("typedepaiements")->onDelete("cascade");


            $table->unsignedBigInteger('ligne_id')->nullable();
            $table->foreign('ligne_id')
                ->references('id')
                ->on("lignes")->onDelete("cascade");

            $table->unsignedBigInteger('periodeabonnement_id')->nullable();
            $table->foreign('periodeabonnement_id')
                ->references('id')
                ->on("periodeabonnements")->onDelete("cascade");


            $table->unsignedBigInteger('annee_id')->nullable();
            $table->foreign('annee_id')
                ->references('id')
                ->on("annees")->onDelete("cascade");

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
        Schema::dropIfExists('subscriptionciviles');
    }
}
