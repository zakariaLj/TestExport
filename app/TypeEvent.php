<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEvent extends Model
{
    public function create()
    {

    }
    public function eventHasTypeEvent(){
        return $this->belongsToMany('App\Event', 'event_has_type_event');
    }
}
