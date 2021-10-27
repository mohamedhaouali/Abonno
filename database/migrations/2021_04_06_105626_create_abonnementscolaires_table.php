<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnementscolairesTable extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnementscolaires', function (Blueprint $table) {
            $table->id();

            $table->string('nom')->nullable();
            $table->string('prenomabonne')->nullable();
            $table->string('age')->nullable();
            $table->string('nomparent')->nullable();
            $table->string('prenomparent')->nullable();
            $table->date('datenaissance')->nullable();
            $table->string('stationdebut')->nullable();
            $table->string('stationfin')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->float('prixtotale')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('cartereference')->nullable();


            $table->string('profileimage');

            $table->unsignedBigInteger('etudiant_id')->nullable();
            $table->foreign('etudiant_id')
                ->references('id')
                ->on("etudiants")->onDelete("cascade");




            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')
                ->references('id')
                ->on("regions")->onDelete("cascade");


            $table->unsignedBigInteger('municipalite_id')->nullable();
            $table->foreign('municipalite_id')
                ->references('id')
                ->on("municipalites")->onDelete("cascade");



            $table->unsignedBigInteger('niveauscolaire_id')->nullable();
            $table->foreign('niveauscolaire_id')
                ->references('id')
                ->on("niveauscolaires")->onDelete("cascade");

            $table->unsignedBigInteger('classe_id')->nullable();
            $table->foreign('classe_id')
                ->references('id')
                ->on("classes")->onDelete("cascade");

            $table->unsignedBigInteger('etablissement_id')->nullable();
            $table->foreign('etablissement_id')
                ->references('id')
                ->on("etablissements")->onDelete("cascade");

            $table->unsignedBigInteger('typedepaiement_id')->nullable();
            $table->foreign('typedepaiement_id')
                ->references('id')
                ->on("typedepaiements")->onDelete("cascade");



            $table->unsignedBigInteger('societe_id')->nullable();
            $table->foreign('societe_id')
                ->references('id')
                ->on("societes")->onDelete("cascade");



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
        Schema::dropIfExists('abonnementscolaires');
    }
}
