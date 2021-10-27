<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studydetails', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            $table->unsignedBigInteger('level_id')->nullable();
            $table->foreign('level_id')
                ->references('id')
                ->on("levels")->onDelete("cascade");

            $table->unsignedBigInteger('etablissement_id')->nullable();
            $table->foreign('etablissement_id')
                ->references('id')
                ->on("etablissements")->onDelete("cascade");


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
        Schema::dropIfExists('studydetails');
    }
}
