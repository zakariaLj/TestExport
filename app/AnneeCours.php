<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnneeCours extends Model
{
    protected $fillable = ['nom', 'code_hexa'];

    public $timestamps = false;

    public function event(){
        return $this->belongsTo('App\Event');
    }
    public function horaire(){
        return $this->belongsTo('App\Horaire');
    }
}
