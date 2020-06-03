$(document).ready(function() {

    function charger_ld_nom_horaires()
    {
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //au chargement de la page, on insère dans la liste déroulante le nom des horaires existants
        $.ajax({
            type: 'POST',
            url: 'show_horaires',
            dataType: 'json',
            success: function(data)
            {
                //je vide la liste déroulante des horaires
                $("[name='sel_nom_horaires']").empty();

                $("[name='sel_nom_horaires']").append($('<option/>').val('0').html('Choisissez un horaire')); //première valeur de la liste déroulante
                    $.each(data, function(idx, cont) //parcours du retour php qui est au format json
                    {
                        $.each(cont, function(idx, nom) //parcours du retour php qui est au format json
                        {
                            $("[name='sel_nom_horaires']").append($('<option/>').val(nom.id).html(nom.nom));
                        }); //fin du 1er premier each


                    })//fin du 2e each


            },
            error:function()
            {
                alert("erreur");
            }

        });

    }

    //DD: au chargement du site, j'appelle cette fonction pour charger la liste déroulante des noms des horaires
    charger_ld_nom_horaires();

    //Méthode améliorée pour demander le nom, l'année et le quadrimestre en même temps
    $("#btn-add").click(function()
    {
            if ($("#nomHoraire").val() != "" && $("#anneeCours").val() != 0 && $("#quadrimestre").val() != 0)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    //type get or post
                    type: 'POST',
                    //route avec laquelle js va travailler en PHP (créer controller)
                    url: 'add_horaire',
                    //les données qu'on va envoyer à PHP
                    data: {
                        nom: $("#nomHoraire").val(),
                        quadrimestre_id: $("#quadrimestre").val(),
                        annee_cours_id: $("#anneeCours").val()
                    },
                    //le type de retour, peut être text, html, xml ou json
                    dataType: 'json',
                    //en cas de succès du côté serveur, retour etat 4 et réponse 200
                    //callback
                    success: function()
                    {
                        alert("Horaire enregistré");
                        $('#frmAddHoraire').trigger("reset");
                        $("#frmAddHoraire.close").click();
                        charger_ld_nom_horaires();
                    },
                    error: function(data)
                    {
                        console.log(data);
                        var errors = $.parseJSON(data.responseText);
                        $('#add-task-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-task-errors').append('<li>' + value + '</li>');
                        });
                        $("#add-error-bag").show();
                    }
                });
            }
            else
            {
                alert("erreur");
            }
        })
    });

    $('#add_formulaire').click(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'add_reservation',
            data: {
                horaire: $("#sel_liste_horaires").val(),
                //annee : $("#anneeCours").val(),
                quadrimestre: $("#quadrimestre").val(),
                dateReservation: $("#datepicker").val(),
                event: $("#event").val(),
                typeCours: $("#typeCours").val(),
                enseignant: $("#enseignant").val(),
                local: $("#local").val(),
                heureDebut: $("#heureDebut").val(),
                heureFin: $("#heureFin").val(),
                nombreSemaine: $("#nbSemaines").val()
            },
            dataType: 'json',

            success: function(data)
            {
                if(data > 0)
                {
                    alert("chevauchement");
                }
                else
                {
                    
                    console.log(data);
                    //$('#addFormulaire').trigger("reset");
                    $("#addFormulaire.close").click();
                }
            },
            error: function(data)
            {
                console.log(data);
                
                console.log(data);
                var errors = $.parseJSON(data.responseText);
                $('#add-task-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#add-task-errors').append('<li>' + value + '</li>');
                });
                $("#add-error-bag").show();
            }
        });
    });