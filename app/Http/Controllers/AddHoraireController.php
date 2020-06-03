<?php

namespace App\Http\Controllers;



//je déclare le model (App\Horaire)
use App\Horaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddHoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $rules = array(
            'nom'    =>  'required',
            'quadrimestre_id' => 'required',
            'annee_cours_id' => 'required'
        );
    

        $validateur = Validator::make($request->all(), $rules);

        if($validateur->fails())
        {
            return response()->json(['errors' => $validateur->errors()->all()]);
        }else{
    
            DB::table('horaires')->insert([
                'nom' => $request->nom,
                'quadrimestre_id' => $request->quadrimestre_id,
                'annee_cours_id' => $request->annee_cours_id
            ]);







        }


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    
    public function show()
    {
        //je récupère les données de la table horaires (id et nom) avec une requête SELECT et je trie par nom
        $horaires = DB::table('horaires')->orderBy('nom')->get();
        
        //je retourne le résultat au format JSON
        return response()->json([$horaires]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddHoraire  $addHoraire
     * @return \Illuminate\Http\Response
     */
    public function edit(AddHoraire $addHoraire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddHoraire  $addHoraire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddHoraire $addHoraire)
    {
        $horaires = DB::table('horaires')->get();
        
        //return response()->json(['id' => $horaires->id, 'nom' => $horaires->nom]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddHoraire  $addHoraire
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddHoraire $addHoraire)
    {
        //
    }
}
