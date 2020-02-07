@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <center>

            <div class="alert alert-primary" role="alert">
                Bonjour {{ Auth::user()->prenom }} {{ Auth::user()->nom }}, <br />
                veuillez choisir un seul type d'inscription, et modifier les informations suivantes.<br />
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

                    <div id="div2" class="">


                        <div id="show_form">
                            <p><strong id="in_text"></strong></p>
                            <form action="{{ route('inscriptions.update', ['id' => $inscriptions->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="type_inscription" id="type_inscription" value="0">

                                <div class="form-group">
                                    <label for="cin" id="cin_label">Cin : </label>
                                    <input type="text" class="form-control" name="cin" id="cin" value="{{$inscriptions->cin}}">
                                </div>

                                <!-- <div class="form-group">
                                    <label for="date_naissance">Date de naissance</label>
                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{$inscriptions->date_naissance}}" />
                                </div> -->

                                <div class="form-group">
                                    <label for="date_naissance">Date de naissance</label>
                                    <input type="text" class="form-control" id="date" name="date_naissance" value="{{$inscriptions->date_naissance}}" />
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleRadio">Type de bourse</label>
                                    <br />
                                    <input type="radio" class="form-radio-input" id="type_bourse" name="type_bourse" value="bourse nationale" checked>
                                    <label class="form-radio-label" for="type_bourse">bourse nationale</label>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="form-radio-input" id="type_bourse" name="type_bourse" disabled>
                                    <label class="form-radio-label" for="type_bourse" style="color:grey">bourse
                                        internationale (pas disponible à ce moment là)</label>
                                </div>

                                <div class="form-group">
                                    <label for="etablissement">Établissement</label>
                                    <input type="text" class="form-control" id="etablissement" name="etablissement" value="{{$inscriptions->etablissement}}" />
                                </div>

                                <div class="form-group">
                                    <label for="filiere_bac">Filière bac</label>
                                    <input type="text" class="form-control" id="filiere_bac" name="filiere_bac" value="{{$inscriptions->filiere_bac}}" />
                                </div>

                                <hr>

                                <div id="hide_academie_direction">

                                    <div class="form-group">
                                        <label for="id_aref_fk">Academie Régional :</label>
                                        <select class="form-control" name="id_aref_fk" id="id_aref_fk">
                                            @foreach ($aref as $ar)
                                            @if ($ar->id == $inscriptions->id_aref_fk)
                                            <option value="{{$ar->id}}" selected>{{$ar->nom_aref}}</option>
                                            @else
                                            <option value="{{$ar->id}}">{{$ar->nom_aref}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>


                                    <div id="get_directions_select">

                                        <div class="form-group">
                                            <label for="id_direction_fk">Direction Provinciale</label>
                                            <select class="form-control" name="id_direction_fk" id="id_direction_fk">
                                                @foreach ($direction as $dr)
                                                <option value="{{$dr->id}}" selected>{{$dr->nom_direction}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                </div>

                                <div id="hide_pays">
                                    <label for="pays">Pays :</label>
                                    <select class="form-control" id="pays" name="pays">
                                        <option value="{{$inscriptions->pays}}">{{$inscriptions->pays}}</option>
                                        <option value="ALERGIE">ALERGIE</option>
                                        <option value="SENEGALE">SENEGALE</option>
                                        <option value="GABON">GABON</option>
                                        <option value="MALI">MALI</option>
                                    </select>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="note_premierbac">Note premiere année bac : </label>
                                    <input type="text" class="form-control" name="note_premierbac" id="note_premierbac" value="{{$inscriptions->note_premierbac}}">
                                </div>

                                <div class="form-group">
                                    <label for="note_examreg">Note examen Regionale : </label>
                                    <input type="text" class="form-control" name="note_examreg" id="note_examreg" value="{{$inscriptions->note_examreg}}">
                                </div>


                                <div class="form-group">
                                    <label for="situation_pere">Situation Pere : </label>
                                    <select class="form-control" name="situation_pere" id="situation_pere">
                                        <option value="{{$inscriptions->situation_pere}}">{{$inscriptions->situation_pere}}</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="situation_mere">Situation Mere : </label>
                                    <select class="form-control" name="situation_mere" id="situation_mere">
                                        <option value="{{$inscriptions->situation_mere}}">{{$inscriptions->situation_mere}}</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select></div>


                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{$inscriptions->telephone}}" />
                                </div>

                                <div class="form-group">
                                    <label for="annee_inscription">L'année d'inscription</label>
                                    <input type="text" class="form-control" name="annee_inscription" id="annee_inscription" value="2019">
                                </div>

                                <div class="form-group">
                                    <label for="id_universite_fk">Universite</label>
                                    <select class="form-control" name="id_universite_fk" id="id_universite_fk">
                                        @foreach ($universite as $un)
                                        @if ($un->id == $inscriptions->id_universite_fk)
                                        <option value="{{$un->id}}" selected>{{$un->nom_universite}}</option>
                                        @else
                                        <option value="{{$un->id}}">{{$un->nom_universite}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div id="get_domaines_select">

                                    <div class="form-group">
                                        <label for="id_domaine_fk">Domaine</label>
                                        <select class="form-control" name="id_domaine_fk" id="id_domaine_fk">
                                            @foreach ($domaine as $dm)
                                            @if ($dm->id == $inscriptions->id_domaine_fk)
                                            <option value="{{$dm->id}}" selected>{{$dm->nom_domaine}}</option>
                                            @else
                                            <option value="{{$dm->id}}">{{$dm->nom_domaine}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div id="get_fillieres_select">

                                    <div class="form-group">
                                        <label for="id_filiere_fk">Filière</label>
                                        <select class="form-control" name="id_filiere_fk" id="id_filiere_fk">
                                            @foreach ($filiere as $fl)
                                                @if ($fl->id == $inscriptions->id_filiere_fk)
                                                    <option value="{{$fl->id}}" selected>{{$fl->nom_filiere}}</option>
                                                @else
                                                    <option value="{{$fl->id}}">{{$fl->nom_filiere}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <h5> Vos documents : </h5>
                                <hr>

                                <?php
                                    $doc_extensio_featured_1 = substr($inscriptions->featured_1, -4);
                                    $doc_extensio_featured_2 = substr($inscriptions->featured_2, -4);
                                    $doc_extensio_featured_3 = substr($inscriptions->featured_3, -4);
                                    $doc_extensio_featured_4 = substr($inscriptions->featured_4, -4);
                                ?>

                                    <div class="form-group" id="main_featured_1">
                                        <div id="preview_featured_1">
                                                <a href="{{ url('/') }}/{{ $inscriptions->featured_1 }}" target="_blank">
                                                @if( strpos($doc_extensio_featured_1, 'doc') !== false )
                                                <img src="/storage/images/doc.png" class="mr-3" height="100px" width="100px" alt="FEATURED_1">
                                                @elseif( strpos($doc_extensio_featured_1, 'pdf') !== false )
                                                <img src="/storage/images/doc.png" class="mr-3" height="100px" width="100px" alt="FEATURED_1">
                                                @else
                                                <img src="/{{ $inscriptions->featured_1 }}" class="mr-3" height="100px" width="100px" alt="FEATURED_1">
                                                @endif
                                            </a>
                                            <a href="#" title="Modifier l'image" id="click_featured_1">
                                                Cliquer ici pour modifier le document.
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group" id="main_featured_2">
                                        <div id="preview_featured_2">
                                        <a href="{{ url('/') }}/{{ $inscriptions->featured_2 }}" target="_blank">
                                                @if( strpos($doc_extensio_featured_2, 'doc') !== false )
                                                <img src="/storage/images/doc.png" class="mr-3" height="100px" width="100px" alt="featured_2">
                                                @elseif( strpos($doc_extensio_featured_2, 'pdf') !== false )
                                                <img src="/storage/images/pdf.png" class="mr-3" height="100px" width="100px" alt="featured_2">
                                                @else
                                                <img src="/{{ $inscriptions->featured_2 }}" class="mr-3" height="100px" width="100px" alt="featured_2">
                                                @endif
                                            </a>
                                            <a href="#" title="Modifier l'image" id="click_featured_2">
                                                Cliquer ici pour modifier le document.
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group" id="main_featured_3">
                                        <div id="preview_featured_3">
                                        <a href="{{ url('/') }}/{{ $inscriptions->featured_3 }}" target="_blank">
                                                @if( strpos($doc_extensio_featured_3, 'doc') !== false )
                                                <img src="/storage/images/doc.png" class="mr-3" height="100px" width="100px" alt="featured_3">
                                                @elseif( strpos($doc_extensio_featured_3, 'pdf') !== false )
                                                <img src="/storage/images/pdf.png" class="mr-3" height="100px" width="100px" alt="featured_3">
                                                @else
                                                <img src="/{{ $inscriptions->featured_3 }}" class="mr-3" height="100px" width="100px" alt="featured_3">
                                                @endif
                                            </a>
                                            <a href="#" title="Modifier l'image" id="click_featured_3">
                                                Cliquer ici pour modifier le document.
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group" id="main_featured_4">
                                        <div id="preview_featured_4">
                                        <a href="{{ url('/') }}/{{ $inscriptions->featured_4 }}" target="_blank">
                                                @if( strpos($doc_extensio_featured_4, 'doc') !== false )
                                                <img src="/storage/images_doc_pdf/doc.png" class="mr-3" height="100px" width="100px" alt="featured_4">
                                                @elseif( strpos($doc_extensio_featured_4, 'pdf') !== false )
                                                <img src="/storage/images_doc_pdf/pdf.png" class="mr-3" height="100px" width="100px" alt="featured_4">
                                                @else
                                                <img src="/{{ $inscriptions->featured_4 }}" class="mr-3" height="100px" width="100px" alt="featured_4">
                                                @endif
                                            </a>
                                            <a href="#" title="Modifier l'image" id="click_featured_4">
                                                Cliquer ici pour modifier le document.
                                            </a>
                                        </div>
                                    </div>


                                <input type="hidden" name="id_user_fk" value="{{ Auth::user()->id }}">

                                <hr>

                                <button type="submit" class="btn btn-primary">Inscription</button>
                                <a href="/info" class="btn btn-danger">Annuler</a>
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


<script>
    $(document).ready(function() {

        $('#click_featured_1').on('click', function(e) {
            e.preventDefault();
            change_image_html = "<div id='change_featured_1'><label for='featured_1'>Veuillez choisir un document :</label><input type='file' class='form-control-file' name='featured_1'><br><a href='#' class='btn btn-warning' id='cancel_featured_1'><i class='fa fa-undo'>  </i>  Annuler</a></div>";
            $('#main_featured_1').append(change_image_html);
            $('#preview_featured_1').hide();
        });

        $("#main_featured_1").bind("DOMSubtreeModified", function() {
            $('#cancel_featured_1').on('click', function(e) {
                e.preventDefault();
                $('#preview_featured_1').show();
                $('#change_featured_1').remove();
            });
        });

        $('#click_featured_2').on('click', function(e) {
            e.preventDefault();
            $('#preview_featured_2').hide();
            change_image_html = '<div id="change_featured_2"><label for="featured_2">Veuillez choisir un document :</label><input type="file" class="form-control-file" name="featured_2" /><br><a href="#" class="btn btn-warning" id="cancel_featured_2"><i class="fa fa-undo">  </i>  Annuler</a></div>';
            $('#main_featured_2').append(change_image_html);
        });

        $("#main_featured_2").bind("DOMSubtreeModified", function() {
            $('#cancel_featured_2').on('click', function(e) {
                e.preventDefault();
                $('#preview_featured_2').show();
                $('#change_featured_2').remove();
            });
        });

        $('#click_featured_3').on('click', function(e) {
            e.preventDefault();
            $('#preview_featured_3').hide();
            change_image_html = '<div id="change_featured_3"><label for="featured_3">Veuillez choisir un document :</label><input type="file" class="form-control-file" name="featured_3" /><br><a href="#" class="btn btn-warning" id="cancel_featured_3"><i class="fa fa-undo">  </i>  Annuler</a></div>';
            $('#main_featured_3').append(change_image_html);
        });

        $("#main_featured_3").bind("DOMSubtreeModified", function() {
            $('#cancel_featured_3').on('click', function(e) {
                e.preventDefault();
                $('#preview_featured_3').show();
                $('#change_featured_3').remove();
            });
        });

        $('#click_featured_4').on('click', function(e) {
            e.preventDefault();
            $('#preview_featured_4').hide();
            change_image_html = '<div id="change_featured_4"><label for="featured_4">Veuillez choisir un document :</label><input type="file" class="form-control-file" name="featured_4" /><br><a href="#" class="btn btn-warning" id="cancel_featured_4"><i class="fa fa-undo">  </i>  Annuler</a></div>';
            $('#main_featured_4').append(change_image_html);
        });

        $("#main_featured_4").bind("DOMSubtreeModified", function() {
            $('#cancel_featured_4').on('click', function(e) {
                e.preventDefault();
                $('#preview_featured_4').show();
                $('#change_featured_4').remove();
            });
        });

    });
</script>

@if( Auth::user()->inscription_interne->type_inscription == "M")
<script type="text/javascript">
    $(document).ready(function() {
        $("#in_text").html("Inscription Marocain"); //html supprimer et remplacer le contenu
        $("#cin_label").html("Cin");
        $("#hide_academie_direction").show();
        $("#hide_pays").hide();
        $("#type_inscription").val("M");
    });
</script>
@endif

@if( Auth::user()->inscription_interne->type_inscription == "E")
<script type="text/javascript">
    $(document).ready(function() {
        $("#in_text").html("Inscription Etrangére");
        $("#cin_label").html("Identifiant");
        $("#hide_pays").show();
        $("#hide_academie_direction").hide();
        $("#type_inscription").val("E");
    });
</script>
@endif

<script type="text/javascript">
    $(document).ready(function() {

        // DIRECTIONS //

        $('#id_aref_fk').on('change', function() {

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
                success: function(result) {
                    console.log(result);
                    $('#get_directions_select').html(result);
                },
                error: function(result) {
                    console.log("test");
                },
            });

        });

        // DOMAINES //

        $('#id_universite_fk').on('change', function() {

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
                success: function(result) {
                    console.log(result);
                    $('#get_domaines_select').html(result);
                    html_filiere = '<div class="form-group"> <label for="id_filiere_fk"> Filières </label> <select class="form-control" id="id_filiere_fk" name="id_filiere_fk" disabled>  <option value="---">---</option> </select> </div>';
                    $('#get_fillieres_select').html(html_filiere);
                },
                error: function(result) {
                    console.log("test");
                },
            });

        });

        // FILLIERES //

        $('#id_domaine_fk').on('change', function() {

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
                success: function(result) {
                    console.log(result);
                    $('#get_fillieres_select').html(result);
                },
                error: function(result) {
                    console.log("test");
                },
            });
        });

        $(document).ajaxComplete(function() {
            $('#id_domaine_fk').on('change', function() {

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
                    success: function(result) {
                        console.log(result);
                        $('#get_fillieres_select').html(result);
                    },
                    error: function(result) {
                        console.log("test");
                    },
                });
            });
        });

    });
</script>
@endsection
