<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsuiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptionsuite', function (Blueprint $table) {
            $table->increments('id');
            $table->string('featured_01');
            $table->float('note_bac');
            $table->string('featured_02');
            $table->integer('id_inscriptions_fk')->unsigned();
            $table->foreign('id_inscriptions_fk')->references('id')->on('inscriptions')->onDelete('cascade')->onUpdate("cascade");
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
        Schema::dropIfExists('inscriptionsuite');
    }
}
