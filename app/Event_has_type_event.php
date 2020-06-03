<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_has_type_event extends Model
{
    public function event(){
        return $this->belongsTo('App\Couleur', 'couleur_id');
    }
    public function typeEvent(){
        return $this->belongsTo('App\TypeEvent', 'type_event_id');
    }
}
