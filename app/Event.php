<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['nom'];

    public $timestamps = false;

    public function couleur(){
        return $this->hasOne('App\Couleur');
    }
    public function anneeCours(){
        return $this->hasOne('App\AnneeCours');
    }
    public function reservation(){
        return $this->belongsTo('App\Reservation');
    }
    public function eventHasTypeEvent(){
        return $this->belongsToMany('App\TypeEvent', 'event_has_type_events');
    }
    public function eventHasEnseignant(){
        return $this->belongsToMany('App\Enseignant', 'event_has_enseignants');
    }
}