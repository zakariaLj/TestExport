<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    protected $fillable = ['nom'];

    public $timestamps = false;

    public function reservation(){
        return $this->belongsTo('App\Reservation');
    }
    public function quadrimestre(){
        return $this->hasMany('App\Quadrimestre');
    }
    public function anneeCours(){
        return $this->hasMany('App\AnneeCours');
    }
}
