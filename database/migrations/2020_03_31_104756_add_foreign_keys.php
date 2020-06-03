<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_has_type_events', function (Blueprint $table){
            $table->foreign('Event_id')->references('id')->on('events');
            $table->foreign('type_event_id')->references('id')->on('type_events');
        });
        Schema::table('events', function (Blueprint $table){
            $table->foreign('couleur_id')->references('id')->on('couleurs');
            $table->foreign('annee_cours_id')->references('id')->on('annee_cours');
        });
        Schema::table('event_has_enseignants', function (Blueprint $table){
            $table->foreign('Event_id')->references('id')->on('events');
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
        });
        Schema::table('reservations', function (Blueprint $table){
            $table->foreign('Event_id')->references('id')->on('events');
            $table->foreign('horaire_id')->references('id')->on('horaires');
            $table->foreign('local_id')->references('id')->on('locals');
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
        });
        Schema::table('horaires', function (Blueprint $table){
            $table->foreign('quadrimestre_id')->references('id')->on('quadrimestres');
            $table->foreign('annee_cours_id')->references('id')->on('annee_cours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('event_has_type_events');
        Schema::dropIfExists('events');
        Schema::dropIfExists('reservation_has_quadrimestres');
        Schema::dropIfExists('event_has_locals');
        Schema::dropIfExists('event_has_enseignants');
        Schema::dropIfExists('reservations');
    }
}
