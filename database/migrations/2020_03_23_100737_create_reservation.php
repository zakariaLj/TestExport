<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('numero_semaine');
            $table->dateTime('date');
            $table->string('heure_debut', 45);
            $table->string('heure_fin', 45);
            $table->integer('Event_id')->unsigned()->index();
            $table->integer('horaire_id')->unsigned()->index();
            $table->integer('local_id')->unsigned()->index();
            $table->integer('enseignant_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
