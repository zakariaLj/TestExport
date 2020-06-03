<?php

namespace App\Exports;

use App\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;


use DB;
class ReservationExport implements FromCollection
{



// STYLE DE LA FEUILLE EXCELE
        public function registerEvents():array
    {
            $styleArray = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '#000000'],
                    ],
                ],
            ];
            $styleArray2 = [
                'borders' => [
                    'allborders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '#000000'],
                    ],
                ],
            ];
            
        return [
            
            BeforeSheet::class => function (BeforeSheet $event) use ($styleArray){
                $event->sheet->setCellValue('B2', "A et B");    
                $event->sheet->setCellValue('C2', "2020-2021  1er bachelier-Premier Quadrimestre ");
                $event->sheet->setCellValue('C3', "0");
                $event->sheet->setCellValue('D3', "1");
                $event->sheet->setCellValue('E3', "2");
                $event->sheet->setCellValue('F3', "3");
                $event->sheet->setCellValue('G3', "4");
                $event->sheet->setCellValue('H3', "5");
                $event->sheet->setCellValue('I3', "6");
                $event->sheet->setCellValue('J3', "7");
                $event->sheet->setCellValue('K3', "8");
                $event->sheet->setCellValue('L3', "9");
                $event->sheet->setCellValue('M3', "10");
                $event->sheet->setCellValue('N3', "11");
                $event->sheet->setCellValue('O3', "12");
                $event->sheet->setCellValue('P3', "13");
                $event->sheet->setCellValue('Q3', "14");
                $event->sheet->setCellValue('R3', "15");
                $event->sheet->setCellValue('S3', "16");
                $event->sheet->setCellValue('B4', "Lundi");
                $event->sheet->setCellValue('B16', "Mardi");
                $event->sheet->setCellValue('B28', "Mercredi");
                $event->sheet->setCellValue('B40', "Jeudi");
                $event->sheet->setCellValue('B52', "Vendredi");


                

            },
            AfterSheet::class=>function (AfterSheet $event) use ($styleArray){
            $event->sheet->getStyle('C2:S2')->applyFromArray($styleArray);
            $event->sheet->getStyle('B2:B3')->applyFromArray($styleArray);
            $event->sheet->getStyle('C3:S3')->applyFromArray($styleArray);
            $event->sheet->getStyle('B4:B64')->applyFromArray($styleArray);
            
           
            }
        ];
    }

// BASE DE DONNE : 

        public function collection()
    {
        $type = DB::table('reservations')->select('Event_id')->get();
        return Reservation::all() ;
    }
    public function startCell(): string
    {
        return 'C4';
    }
    public function headings(): array
    {
        return [
            'Event_id'
            
        ];
    }
    public function title(): string
    {
        return 'reservations';
    }


}