<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "DatabaseController@index");
Route::post('add_horaire','AddHoraireController@create');
Route::post('show_horaires','AddHoraireController@show');
Route::post('add_reservation', 'AddReservationController@create');

Route::get('/listeHoraires', 'ExportExcelController@index');
Route::get('/listeHoraires/excel', 'ExportExcelController@excel')->name('export_excel.excel');

Route::get('listeHoraires/excel',  function(){
    return Excel::download(new App\Exports\ReservationExport, 'Horaire.xlsx');
})->name('export_excel.excel');
