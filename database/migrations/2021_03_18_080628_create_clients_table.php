<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nomabonne')->nullable();;
            $table->string('prenomabonne')->nullable();;
            $table->string('cin')->nullable();;

            $table->string('profileimage')->nullable();;
            $table->string('nomparent')->nullable();;
            $table->string('prenomparent')->nullable();;

            $table->integer('prixtotale')->nullable();;


            $table->unsignedBigInteger('clientstype_id')->nullable();
            $table->foreign('clientstype_id')
                ->references('id')
                ->on("clientstypes")->onDelete("cascade"); ;




            $table->unsignedBigInteger('ligne_id')->nullable();
            $table->foreign('ligne_id')
                ->references('id')
                ->on("lignes")->onDelete("cascade");

            $table->unsignedBigInteger('classe_id')->nullable();
            $table->foreign('classe_id')
                ->references('id')
                ->on("classes")->onDelete("cascade");

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
        Schema::dropIfExists('clients');
    }
}
