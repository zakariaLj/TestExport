<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_has_enseignant extends Model
{
    public function event(){
        return $this->belongsTo('App\Couleur', 'couleur_id');
    }
    public function anneeCours(){
        return $this->belongsTo('App\AnneeCours', 'annee_cours_id');
    }
}
