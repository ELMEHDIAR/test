<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptioninternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type_bourse');
            $table->string('type_inscription');
            $table->string('cin');
            $table->string('date_naissance');
            $table->string('telephone');
            $table->string('etablissement');
            $table->string('filiere_bac');
            $table->string('situation_pere');
            $table->string('situation_mere');
            $table->float('note_premierbac');
            $table->float('note_examreg');
            $table->string('annee_inscription');
            $table->string('featured_1');
            $table->string('featured_2');
            $table->string('featured_3');
            $table->string('featured_4');
            $table->string('pays')->default('None');

            $table->integer('id_aref_fk')->unsigned()->nullable()->default(null);
            $table->integer('id_direction_fk')->unsigned()->nullable()->default(null);

            $table->integer('id_user_fk')->unsigned();
            $table->integer('id_universite_fk')->unsigned();
            $table->integer('id_domaine_fk')->unsigned();
            $table->integer('id_filiere_fk')->unsigned();

            $table->foreign('id_aref_fk')->references('id')->on('arefs')->onDelete('cascade')->onUpdate("cascade");
            //$table->foreign('id_user_fk')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('id_direction_fk')->references('id')->on('directionprovinciales')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('id_domaine_fk')->references('id')->on('domaines')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('id_universite_fk')->references('id')->on('universites')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('id_filiere_fk')->references('id')->on('filieres')->onDelete('cascade')->onUpdate("cascade");

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
        Schema::dropIfExists('inscriptions');
    }
}
