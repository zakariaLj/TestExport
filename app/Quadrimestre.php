<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quadrimestre extends Model
{
    public function horaire(){
        return $this->belongsTo('App\Horaire');
    }
}
