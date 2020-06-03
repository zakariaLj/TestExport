<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $fillable = ['nom'];

    public $timestamps = false;

    public function eventHasEnseignant(){
        return $this->belongsToMany('App\Event', 'event_has_enseignants');
    }
}
