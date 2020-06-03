{{-- <!--
 export_excel.blade.php
!-->

{{-- <!DOCTYPE html>
<html>
<head>
    <title>Liste des réservations</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
    </style>
</head>
<body>
<br /> --}}
@extends('adminlte::page')

@section('content')
    
    @section('css')
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}

            <style type="text/css">
                .box{
                    width:600px;
                    margin:0 auto;
                    border:1px solid #ccc;
                }
            </style>
    @stop

    <div class="container">
        <h3 align="center">Liste des réservations</h3><br />
        <div align="center">
            <a href="{{ route('export_excel.excel') }}" class="btn btn-success">Générer un horaire Excel</a>
        </div>
        <br />

        <div class="card">
            <!-- /.card-header -->
            <div class="card-body card-header table-responsive p-0">
              <table class="table table-hover table-bordered text-nowrap">
                <thead>
                  <tr class="bg-dark text-light">
                    <td>N° semaine</td>
                    <td>Date</td>
                    <td>Heure de début</td>
                    <td>Heure de fin</td>
                    <td>Cours</td>
                    <td>Couleurs</td>
                    <td>Horaire</td>
                    <td>Local</td>
                  </tr>
                </thead>
                <tbody>
                    @foreach($donneesRes as $donnee)
                        <tr>
                            <td>{{ $donnee->numero_semaine }}</td>
                            <td>{{ $donnee->date }}</td>
                            <td>{{ $donnee->heure_debut }}</td>
                            <td>{{ $donnee->heure_fin }}</td>
                            {{-- <td>{{ $events[$donnee->Event_id]->nom }}</td> --}}
                            <td>
                                {{-- Afficher le nom de l'evenement --}}
                                @for ($i = 0; $i < count($events); $i++)
                                    @if ($events[$i]->id === $donnee->Event_id )
                                        {{$events[$i]->nom}}
                                    @endif
                                @endfor
                            </td>
                            {{-- <td>{{$couleurs[$events[$donnee->Event_id]->couleur_id]->nom}}</td> --}}
                            <td class="
                            {{-- selectioner la couleur de background equivalente a la couleur de l'event --}}
                                @for ($i = 0; $i < count($couleurs); $i++)
                                    @for ($j = 0; $j < count($events); $j++)
                                        @if ($couleurs[$i]->id === $events[$j]->couleur_id && $donnee->Event_id === $events[$j]->id)
                                            
                                                @switch($couleurs[$i]->nom)
                                                    @case ("ROUGE")
                                                        bg-danger
                                                    @break;
                                                    @case ("VERT")
                                                        bg-success
                                                    @break;
                                                    @case ("JAUNE")
                                                        bg-warning
                                                    @break 
                                                    @case ("BLEU")
                                                        bg-primary
                                                    @break;
                                                @endswitch
                                            
                                        @endif
                                    @endfor
                                @endfor">
                                {{-- Afficher la couleur de l'evenement --}}
                                @for ($i = 0; $i < count($couleurs); $i++)
                                    @for ($j = 0; $j < count($events); $j++)
                                        @if ($couleurs[$i]->id === $events[$j]->couleur_id && $donnee->Event_id === $events[$j]->id)
                                            {{$couleurs[$i]->nom}}
                                        @endif
                                    @endfor
                                @endfor
                            </td>
                            {{-- <td>{{ $donnee->horaire_id }}</td> --}}
                            <td>
                                {{-- Afficher le nom de L'horaire --}}
                                @for ($i = 0; $i < count($horaires); $i++)
                                    @if ($horaires[$i]->id === $donnee->horaire_id)
                                        {{$horaires[$i]->nom}}
                                    @endif
                                @endfor
                            </td>
                            {{-- <td>{{ $locals[$donnee->local_id]->nom }}</td> --}}
                            <td>
                                {{-- Afficher le nom du local --}}
                                @for ($i = 0; $i < count($locals); $i++)
                                    @if ($locals[$i]->id === $donnee->local_id )
                                        {{$locals[$i]->nom}}
                                    @endif
                                @endfor
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        
     
                    

    </div>

    @section('script')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    @stop
    
@endsection

{{-- </body>
</html> --}}