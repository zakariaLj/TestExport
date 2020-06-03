<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class AddReservationController extends Controller
{

    public function create(Request $request)
    {
        $rules = array(
            //'annee'    =>  'required',
            //'quadrimestre' => 'required',
            'dateReservation' => 'required',
            'event'         => 'required',
            'typeCours' => 'required',
            'enseignant' => 'required',
            'local'     => 'required',
            'heureDebut' => 'required',
            'heureFin' => 'required',
            'nombreSemaine' => 'required',
            'horaire' => 'required'
        );
        

        //Traitement de la date afin d'avoir le bon numéro de semaine

        $dateRes = $request->dateReservation;
        $dateResTime = strtotime($dateRes);
        $dateResStr = \date("Y-m-d", $dateResTime);
        $date = new DateTime($dateResStr);
        $premierQuadrimestre = DB::table('quadrimestres')->select('date_debut')->where('id', 1)->get();
        $premierQuadrimestreTime = strtotime($premierQuadrimestre);
        $premierQuadrimestreStr = \date("Y-m-d", $premierQuadrimestreTime);
        $dateQuad = new DateTime($premierQuadrimestreStr);
        $ecart = $date->diff($dateQuad)->d;
        $ecartInt = (int)$ecart;

        //Fin du traitement

        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            // return response()->json(['errors' => $error->errors()->all()]);
             Alert::warning("Attention", "Pas d'horraire enregister");

        }else{
            Alert::success('Horaire enregistrer');
        }

        $form_data = array(
            /*'annee'        =>  $request->annee,
            'quadrimestre' => $request->quadrimestre,
            'typeCours'     => $request->typeCours,*/
            'enseignant'    => $request->enseignant,
            'numero_semaine' => $ecartInt,
            'date'           => $request->dateReservation,
            'heure_debut'    => $request->heureDebut,
            'heure_fin'      => $request->heureFin,
            'horaire_id'      => $request->horaire,
            'local_id'         => $request->local,
            'event_id'         => $request->event
        );

        //Reservation::create($form_data);

        /*$requete = DB::raw("SELECT COUNT(*) FROM reservations
        WHERE " . $request->heureDebut . " <= \"18:00\"
        AND " . $request->heureFin . " >= \"08:00\"
        AND reservations.local_id = " . $request->local . "
        AND reservations.enseignant_id = " . $request->enseignant . "
        AND reservations.date = " . $dateRes)->getValue();*/

        $requete = DB::table('reservations')
                   ->whereRaw('heure_debut <= \'' . $request->heureDebut . '\'')
                   ->whereRaw('heure_fin >= \'' . $request->heureDebut . '\'')
                   ->whereRaw('heure_debut <= \'' . $request->heureFin . '\'')
                   ->whereRaw('heure_fin >= \'' . $request->heureFin . '\'')
                   ->whereRaw('reservations.local_id = ' . $request->local)
                   ->whereRaw('reservations.enseignant_id = ' . $request->enseignant)
                   ->whereRaw('reservations.date = \'' . $dateRes . '\'')->count('*');

        //dd($requete);

        if($requete > 0)
        {
            
            $overlap = "Il y a un problème de chevauchement aux endroits suivants : \n";
            for ($i = 0; $i < $requete; $i++)
            {
                $local = DB::table('reservations')->join('locals', 'locals.id', '=', 'reservations.local_id')->get('nom')->where('id', $i);
                $enseignant = DB::table('reservations')->join('enseignants', 'enseignants.id', '=', 'reservations.enseignant_id')->get('nom')->where('id', $i);
                $heureDebut = DB::table('reservations')->get('heure_debut')->where('id', $i);
                $heureFin = DB::table('reservations')->get('heure_fin')->where('id', $i);

                $overlap .= $local[$i]->nom . " avec " . $enseignant[$i]->nom . " de " . $heureDebut[$i]->heure_debut . " à " . $heureFin[$i]->heure_fin . "\n";
            }
            $overlap .= "Souhaitez-vous écraser ces enregistrements ?";
            echo json_encode($overlap);
        }
        else
        {
            $nbSemaines = $request->nombreSemaine;

            for ($i = 0; $i < $nbSemaines; $i++) {
                $semaine = date('Y-m-d', strtotime($dateRes . " + 7 days"));
                DB::table('reservations')->insert([
                    'numero_semaine' => $ecartInt,
                    'date'           => $dateRes,
                    'heure_debut'    => $request->heureDebut,
                    'heure_fin'      => $request->heureFin,
                    'horaire_id'      => $request->horaire,
                    'local_id'         => $request->local,
                    'event_id'         => $request->event,
                    'enseignant_id' => $request->enseignant
                ]);
                $ecartInt++;
                $dateRes = $semaine;
            }

            //$typeCours = (new \App\TypeEvent)->create();

            return response()->json([
                //'annee' => $request->annee,
                //'quadrimestre' => $request->quadrimestre,
                'typeCours'     => $request->typeCours,
                'enseignant'    => $request->enseignant,
                'numero_semaine' => $ecartInt,
                'date'           => $request->dateReservation,
                'heure_debut'    => $request->heureDebut,
                'heure_fin'      => $request->heureFin,
                'local_id'       => $request->local,
                'event_id'       => $request->event,
                'horaire_id'     => $request->horaire
            ]);
        }
    }
}
