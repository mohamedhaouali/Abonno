<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('nomparent');
            $table->string('prenomparent');
            $table->string('nomabonne');
            $table->string('prenomabonne');

            $table->integer('cin');

            $table->integer('nombrenfants')->nullable();
            $table->string('nomenfant1')->nullable();
            $table->string('nomenfant2')->nullable();
            $table->string('nomenfant3')->nullable();;
            $table->string('nomenfant4')->nullable();;
            $table->string('nomenfant5')->nullable();;
            $table->string('nomenfant6')->nullable();;
            $table->string('nomenfant7')->nullable();;


            $table->unsignedBigInteger('ligne_id')->nullable();
            $table->foreign('ligne_id')->references('id')->on('lignes')->onDelete('cascade');

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
        Schema::dropIfExists('socials');
    }
}
