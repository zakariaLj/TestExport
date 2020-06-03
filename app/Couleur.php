<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    protected $fillable = ['nom', 'code_hexa'];

    public $timestamps = false;

    public function event(){
        return $this->belongsTo('App\Event');
    }
}