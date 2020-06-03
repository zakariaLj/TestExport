@extends('adminlte::page')

@section('title', 'Overlap')

@section('content_header')
    <h1 class="display-1 text-center">Overlap</h1>
@stop

@section('content')
<div class="text-center">
    <p>Bienvenue sur la page d'accueil de Overlap</p>
    
</div>
@yield('formulaire')
@yield('content')
@stop

@section('css')
    <link rel="stylesheet" href="/Overlap/public/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@stop
@section('js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <script src="{{asset("js/form.js")}}"></script>
    <script>
        $( function() {
            $( "#heureDebut" ).timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '8',
                maxTime: '18',
                defaultTime: '8',
                startTime: '10:00',
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });
        });
        $( function() {
            $("#heureFin").timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '8',
                maxTime: '18',
                defaultTime: '9',
                startTime: '10:00',
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });
        });
            $(function () {
                $("#datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    //dateFormat: "dd/mm/yy",
                    dateFormat: "yy-mm-dd",
                    //minDate: new Date(),//TODO get les bonnes dates minimum et maximum
                    //maxDate: new Date(),
                    monthNamesShort: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                    dayNamesMin: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"]
                });
            });
            $(function () {
                $("#horaire").hide();

            });

            $("#sel_liste_horaires").change(function () {
                if($("select[name='sel_nom_horaires'] > option:selected").val() != 0){
                    $("#horaire").fadeIn();
                }
                if($("select[name='sel_nom_horaires'] > option:selected").val() == 0){
                    $("#horaire").fadeOut();
                }
            });
    </script>
@include('sweetalert::alert')

@stop