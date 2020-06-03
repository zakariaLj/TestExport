<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['numero_semaine', 'date', 'heure_debut', 'heure_fin'];//Champs que l'on pourra remplir

    public $timestamps = false;//Pour éviter les colonnes "created_at" et "updated_at" dans les tables

    /*public static function create($data)
    {

    }*/

    public function event(){
        return $this->hasOne('App\Event');//Une réservation ne peut avoir qu'un seul event
    }
    public function horaire(){
        return $this->hasOne('App\Horaire');//Une réservation ne peut avoir qu'un seul horaire
    }
    public function local(){
        return $this->hasOne('App\Local');//Une réservation ne peut avoir qu'un seul local
    }
    
}
