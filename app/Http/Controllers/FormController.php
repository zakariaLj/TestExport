<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class FormController extends Controller
{
    public function store(Request $request){
        $validateur = Validator::make($request->input(), array(
            'annee' => 'required',
            'quadrimestre' => 'required',
            'dateReservation' => 'required',
            'event' => 'required',
            'typeCours' => 'required',
            'enseignant' => 'required',
            'local' => 'required',
            'heureDebut' => 'required',
            'heureFin' => 'required',
            'nombreSemaine' => 'required'
        ));

        if ($validateur->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validateur->errors(),
            ], 422);
        }

        $reservation = Task::create($request->all());

        return response()->json([
            'error' => false,
            'reservation'  => $reservation,
        ], 200);
    }
}
