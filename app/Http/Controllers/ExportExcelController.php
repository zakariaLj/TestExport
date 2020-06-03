<?php


namespace App\Http\Controllers;
use App\Event;
use App\Local;
use App\Couleur;
use App\Horaire;
use App\Exports\ReservationExport;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\WithTitle;
// use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class ExportExcelController extends Controller
{


    function index()
    {
        $donneesRes = Reservation::all();
        $events = Event::all();
        $locals = Local::all();
        $couleurs = Couleur::all();
        $horaires = Horaire::all();

        //dd($events[$donneesRes[0]->Event_id]->nom);

        //DB::table('reservations')->join('events', 'event_id', '=', 'events.id')->get();

        return view('listeHoraires', compact('donneesRes', 'events', 'locals', 'couleurs', 'horaires'));
    }

    public function show(){
        $reservation = new Reservation();
        $event = $reservation->event();
        $horaire = $reservation->horaire();
        $local = $reservation->local();
    }

    function excel()
    {
        $reservation = Reservation::all();
        $donneesRes = DB::table('reservations')->get()->toArray();
        $donneesTab[] = array('N° semaine', 'Date', 'Heure de début', 'Heure de fin', 'Cours', 'Horaire', 'Local');
        $styleArray = [
            'B2:G8',
            [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => 'FFFF0000'],
                    ],
                ]
            ]
        ];
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->getStyle('B2:G8')->applyFromArray($styleArray);
        foreach($donneesRes as $donnee)
        {
            $donneesTab[] = array(
                'N° semaine'  => $donnee->numero_semaine,
                'Date'   => $donnee->date,
                'Heure de début' => $donnee->heure_debut,
                'Heure de fin' => $donnee->heure_fin,
                'Cours'    => $donnee->Event_id,
                'Horaire' => $donnee->horaire_id,
                'Local'   => $donnee->local_id
            );
        }
        
        // $export = new Reservation();
        return Excel::download($donneesTab, "horaire.xlsx");
    }

    
}