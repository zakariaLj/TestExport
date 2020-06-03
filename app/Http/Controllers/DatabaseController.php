<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function index(){
        $annees = DB::table('annee_cours')->get();
        $quadrimestres = DB::table('quadrimestres')->get();
        $events = DB::table('events')->get();
        $types = DB::table('type_events')->get();
        $locaux = DB::table('locals')->get();
        $enseignants = DB::table('enseignants')->get();
        $horaires = DB::table('horaires')->get();
        return view("form", [
            "events" => $events,
            "quadrimestres" => $quadrimestres,
            "annee_cours" => $annees,
            "typesCours" => $types,
            "locaux" => $locaux,
            "enseignants" => $enseignants,
            "horaires" => $horaires
            ]);
    }
}
