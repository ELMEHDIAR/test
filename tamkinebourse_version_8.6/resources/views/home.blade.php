@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <center>

            <div class="alert alert-primary" role="alert">
                Bonjour {{ Auth::user()->prenom }} {{ Auth::user()->nom }}, <br />
                Veuillez choisir votre type d'inscription, et renseigner le formulaire suivant .<br />
                {{ Auth::user()->email }}


            </div>

        </center>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inscription</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <center>
                        <p><strong> Choisir votre type d'inscription </strong></p>

                        <button type="button" id="morocco" class="btn btn-primary">&nbsp;&nbsp; Élève
                            Marocain &nbsp;&nbsp;</button>
                        <button type="button" id="other" class="btn btn-primary">&nbsp;&nbsp; Élève
                            Étranger &nbsp;&nbsp;</button>
                    </center>
                    <!-- <div class="form-group">
                            <input type="radio" name="tab" value="igotnone" onclick="show1();" />Inscription marocain
                            <input type="radio" name="tab" value="igottwo" onclick="show2();" />Inscription african
                    </div> -->


                    <div id="div2" class="">


                        <div id="show_form">
                        <p><strong id="in_text">Élève marocain</strong></p>
                            <form action="{{ route('ajouter_inscription') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="type_inscription" id="type_inscription" value="0">


                            <div class="form-group">
                                <label for="cin" id="cin_label">CIN : </label>
                                <input type="text" class="form-control" name="cin" id="cin">
                            </div>

                            <div class="form-group">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="text" class="form-control" id="date" name="date_naissance"/>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="exampleRadio">Type de bourse</label>
                                <br />
                                <input type="radio" class="form-radio-input" id="type_bourse" name="type_bourse"
                                    value="bourse nationale" checked>
                                <label class="form-radio-label" for="type_bourse">bourse nationale</label>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" class="form-radio-input" id="type_bourse" name="type_bourse"
                                    disabled>
                                <label class="form-radio-label" for="type_bourse" style="color:grey">bourse
                                    internationale (pas encore disponible)</label>
                            </div>

                            <div class="form-group">
                                <label for="etablissement">Établissement</label>
                                <input type="text" class="form-control" id="etablissement" name="etablissement" />
                            </div>

                            <div class="form-group">
                                <label for="filiere_bac">Type de baccalauréat</label>
                                <input type="text" class="form-control" id="filiere_bac" name="filiere_bac" />
                            </div>

                            <hr>

                            <div id="hide_academie_direction">

                                <div class="form-group">
                                    <label for="id_aref_fk">Academie Régionale :</label>
                                    <select class="form-control" id="id_aref_fk" name="id_aref_fk">
                                        <option value="---">---</option>
                                        @foreach ($aref as $ar)
                                        <option value="{{$ar->id}}">{{$ar->nom_aref}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="get_directions_select">
                                    <div class="form-group">
                                        <label for="id_direction_fk">Direction Provinciale</label>
                                        <select class="form-control" id="id_direction_fk" name="id_direction_fk"
                                            disabled>
                                            <option value="---">---</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div id="hide_pays">
                                <label for="pays">Pays :</label>
                                <select class="form-control" id="pays" name="pays">
                                    <option value="---">---</option>
                                    <option value="ALERGIE">ALERGIE</option>
                                    <option value="SENEGALE">SENEGALE</option>
                                    <option value="GABON">GABON</option>
                                    <option value="MALI">MALI</option>
                                </select>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="note_premierbac">Note de la premiére année de BAC : </label>
                                <input type="text" class="form-control" name="note_premierbac" id="note_premierbac">
                            </div>

                            <div class="form-group">
                                <label for="note_examreg">Note de l'Examen Régional : </label>
                                <input type="text" class="form-control" name="note_examreg" id="note_examreg">
                            </div>


                            <div class="form-group">
                                <label for="situation_pere">Situation du Pére : </label>
                                <select class="form-control" name="situation_pere" id="situation_pere">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="situation_mere">Situation de la Mére : </label>
                                <select class="form-control" name="situation_mere" id="situation_mere">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select></div>


                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" />
                            </div>

                            <div class="form-group">
                                <label for="annee_inscription">L'année d'inscription</label>
                                <input type="text" class="form-control" name="annee_inscription" id="annee_inscription"
                                    value="2020">
                            </div>

                            <div class="form-group">
                                <label for="id_universite_fk">Université</label>
                                <select class="form-control" id="id_universite_fk" name="id_universite_fk">
                                    <option value="---">---</option>
                                    @foreach ($universite as $un)
                                    <option value="{{$un->id}}">{{$un->nom_universite}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="get_domaines_select">

                                <div class="form-group">
                                    <label for="id_domaine_fk"> Domaine </label>
                                    <select class="form-control" id="id_domaine_fk" name="id_domaine_fk" disabled>
                                        <option value="---">---</option>
                                    </select>
                                </div>

                            </div>

                            <div id="get_fillieres_select">

                            <div class="form-group">
                                    <label for="id_filiere_fk"> Filière </label>
                                    <select class="form-control" id="id_filiere_fk" name="id_filiere_fk" disabled>
                                        <option value="---">---</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="featured_1">Télécharger votre relevé de notes de la première année du baccalauréat</label>
                                <input type="file" class="form-control-file" name="featured_1" />
                            </div>

                            <div class="form-group">
                                <label for="featured_2">Télécharger votre relevé de notes de l'examen Régional</label>
                                <input type="file" class="form-control-file" name="featured_2" />
                            </div>

                            <div class="form-group">
                                <label for="featured_3">Télécharger la déclaraton de revenus de votre Père</label>
                                <input type="file" class="form-control-file" name="featured_3" />
                            </div>

                            <div class="form-group">
                                <label for="featured_4">Télécharger la déclaraton de revenus de votre Mère</label>
                                <input type="file" class="form-control-file" name="featured_4" />
                            </div>


                            <input type="hidden" name="id_user_fk" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>

                        </form>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Date -->
<script type="text/javascript">
        $(function() {
            $("#date").mask("99/99/9999");
        });
</script>

<script type="text/javascript">

    $(document).ready(function () {
        $("#show_form").hide();

        $("#morocco").click(function() {
            $("#show_form").show();
            $("#in_text").html("Élève Marocain");
            $("#other").prop("disabled", false);
            $(this).prop("disabled",true);
            $("#cin_label").html("CIN");
            $("#hide_academie_direction").show();
            $("#hide_pays").hide();
            $("#type_inscription").val("M");
        });

        $("#other").click(function() {
            $("#show_form").show();
            $("#in_text").html("Élève Étranger");
            $("#morocco").prop("disabled", false);
            $("#cin_label").html("Identifiant");
            $(this).prop("disabled", true);
            $("#hide_pays").show();
            $("#hide_academie_direction").hide();
            $("#type_inscription").val("E");
        });

        // DIRECTIONS //

        $('#id_aref_fk').on('change', function () {

            console.log($("#id_aref_fk option:selected").val());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            id_aref = $("#id_aref_fk option:selected").val();

            $.ajax({
                url: "{{ url('/') }}" + "/get_directions/" + id_aref,
                method: 'get',
                success: function (result) {
                    console.log(result);
                    $('#get_directions_select').html(result);
                },
                error: function (result) {
                    console.log("test");
                },
            });

        });

        // DOMAINES //

        $('#id_universite_fk').on('change', function () {

            console.log($("#id_universite_fk option:selected").val());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            id_aref = $("#id_universite_fk option:selected").val();

            $.ajax({
                url: "{{ url('/') }}" + "/get_domaines/" + id_aref,
                method: 'get',
                success: function (result) {
                    console.log(result);
                    $('#get_domaines_select').html(result);
                    html_filiere = '<div class="form-group"> <label for="id_filiere_fk"> Filière </label> <select class="form-control" id="id_filiere_fk" name="id_filiere_fk" disabled>  <option value="---">---</option> </select> </div>';
                    $('#get_fillieres_select').html(html_filiere);
                },
                error: function (result) {
                    console.log("test");
                },
            });

        });

        // FILLIERES //

        $(document).ajaxComplete(function () {
            $('#id_domaine_fk').on('change', function () {

                console.log($("#id_domaine_fk option:selected").val());

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                id_domaine = $("#id_domaine_fk option:selected").val();

                $.ajax({
                    url: "{{ url('/') }}" + "/get_fillieres/" + id_domaine,
                    method: 'get',
                    success: function (result) {
                        console.log(result);
                        $('#get_fillieres_select').html(result);
                    },
                    error: function (result) {
                        console.log("test");
                    },
                });
            });
        });

    });

</script>
@endsection
