<div class="modal fade" id="addHoraireModal">
    <div class="modal-dialog">
        <div class="modal-content">



            <form id="frmAddHoraire">
                
                <div class="modal-header">
                    <h4 class="modal-title">
                        Ajouter un nouvel horaire
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <div id="form-result">
                    </div>
                    <div class="form-group">
                        <label>
                            Nom de l'horaire
                        </label>
                        <input type="text" class="form-control" id="nomHoraire" name="nomHoraire" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <label>
                            Année de cours
                        </label>
                        <select class="form-control" id="anneeCours" name="anneeCours">
                            <option value="0">Choisissez une année</option>
                            @foreach($annee_cours as $annee)
                                <option value="{{$annee->id}}">{{$annee->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            Quadrimestre
                        </label>
                        <select class="form-control" id="quadrimestre" name="quadrimestre">
                            <option value="0">Choisissez un quadrimestre</option>
                            @foreach($quadrimestres as $quadrimestre)
                                <option value="{{$quadrimestre->id}}">{{$quadrimestre->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Annuler">
                    <button class="btn btn-info" id="btn-add" type="submit" value="Ajouter">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>