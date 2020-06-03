<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $fillable = ['nom'];

    public $timestamps = false;

    public function reservation(){
        return $this->belongsTo('App\Reservation');
    }
}
