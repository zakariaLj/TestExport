@extends('adminlte')<!-- Hérite de la vue "adminlte" -->

@section('formulaire')

<div class="container">
    <button class="ui-button ui-corner-all ui-widget my-3" data-toggle="modal" data-target="#addHoraireModal">
        <span>Créer un nouvel horaire</span>
    </button><!-- Bouton de création d'un nouvel horaire -->

    <select class="form-control select2 select2-hidden-accessible " name="sel_nom_horaires" id="sel_liste_horaires"></select>

</div>

    <br /><br />
    <hr>

<div class="container-fluid" id="horaire">
<div class="container">

    <div class="card card-primary ">
                  <div class="card-header">
                    <h3 class="card-title">Horaire</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form">

                        <div class="card-body">
                            <div>
                                <label for="dateReservation">Date de réservation : </label>
                                <input type="datetime" class="form-control w-25" name="dateReservation" id="datepicker">
                            </div>

                            <div>
                                <label for="event">Intitulé du module:</label>
                                <select class="form-control select2 select2-hidden-accessible" name="event" id="event">
                                    <option value="0">Choisissez un cours</option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->nom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="typeCours">Type de cours : </label>
                                    <select class="form-control select2 select2-hidden-accessible" name="typeCours" id="typeCours">
                                        <option value="0">Choisissez un module</option>
                                        @foreach($typesCours as $type)
                                            <option value="{{$type->id}}">{{$type->nom}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div>
                                    <label for="enseignant">Enseignant : </label>
                                    <select class="form-control select2 select2-hidden-accessible" name="enseignant" id="enseignant">
                                        <option value="0">Choisissez un enseignant</option>
                                        @foreach($enseignants as $enseignant)
                                            <option value="{{$enseignant->id}}">{{$enseignant->nom}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div>
                                <label for="local">Local : </label>
                                <select class="form-control select2 select2-hidden-accessible" name="local" id="local">
                                    <option value="0">Choisissez un local</option>
                                    @foreach($locaux as $loc)
                                        <option value="{{$loc->id}}">{{$loc->nom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row justify-content-center mt-5">
                                <div class="col-md-4 d-flex flex-column">
                                    <label for="heure">Heure de début : </label>
                                    <input type="text" class="timepicker form-control" id="heureDebut" name="heureDebut">
                                </div>
                                <div class="col-md-4 d-flex flex-column">
                                    <label for="heure">Heure de fin : </label>
                                    <input type="text" class="timepicker form-control" id="heureFin" name="heureFin">
                                </div>
                                <div class="col-md-4 d-flex flex-column">
                                    <label for="nbSemaines">Nombre de semaines : </label>
                                    <input type="number" min="1" value="1" class="form-control" id="nbSemaines" name="nbSemaines">
                                </div>
                                <button class="ui-button ui-corner-all ui-widget mt-3" id="add_formulaire">Ajouter</button><!-- Bouton d'ajout d'horaire -->
                            </div>

                        </div>

                    </div>

                </form>
        </div>
</div>

    @include('addHoraire')
@endsection