@extends('layouts.app')

<style>
    .centre {
        text-align: center;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="alert alert-danger" role="alert" id="alert_head">
                    Veuillez poursuivre votre inscription après l'obtention du baccalauréat, et télécharger le relevé de notes
             du baccalauréat et une copie de l'attestation de réussite au baccalauréat.
                    <a href="/info/suite">Cliquer ici.</a>
                </div>
                <div class="card-header centre">{{Auth::user()->prenom}} {{Auth::user()->nom}} </div>

                <div class="card-body">
                    <div class="col-md-10">
                        <div class="card-body">

                            <ul>
                                <li><b> Nom Complet:</b> {{Auth::user()->prenom}} {{Auth::user()->nom}} </li>
                                <li><b> CIN:</b> {{ $inscription->cin}} </li>
                                <li><b> Date de naissance:</b> {{ $inscription->date_naissance}} </li>
                                <li><b> Télephone:</b> {{ $inscription->telephone}} </li>
                                <li><b> Email:</b> {{Auth::user()->email}} </li>
                                <li><b> Adresse:</b> {{Auth::user()->adresse}} </li>
                                <li><b> Ville:</b> {{Auth::user()->ville}} </li>
                            </ul>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Etablissement</th>
                                        <th> filière</th>
                                        <th> Ville</th>
                                        @if( $inscription->type_inscription == "M")
                                        <th> A.Régionale</th>
                                        <th> D.Provinciale</th>
                                        @elseif ( $inscription->type_inscription == "E")
                                        <th> Pays </th>
                                        @endif


                                        <th> Note de la première année du BAC</th>
                                        <th> E.Régional </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th> {{ $inscription->etablissement}} </th>
                                        <th> {{ $inscription->filiere_bac}} </th>
                                        <th> {{Auth::user()->ville}} </th>
                                        @if( $inscription->type_inscription == "M")
                                        <th>{{ $inscription->aref->nom_aref }} </th>
                                        <th>{{ $inscription->direction->nom_direction }} </th>
                                        @elseif ( $inscription->type_inscription == "E")
                                        <th>{{ $inscription->pays }} </th>
                                        @endif
                                        <th>{{ $inscription->note_premierbac}} </th>
                                        <th>{{ $inscription->note_examreg}} </th>
                                    </tr>
                                </tbody>
                            </table>


                            <ul>
                                <li>Année d'inscription: {{ $inscription->annee_inscription}} </li>
                                <li> Université : {{ $inscription->universite->nom_universite}} </li>
                                <li> Domaine : {{ $inscription->domaine->nom_domaine}} </li>
                            </ul>

                            <h5> Vos documents : </h5>
                            <hr>

                            <?php
                            $doc_extensio_featured_1 = substr($inscription->featured_1, -4);
                            $doc_extensio_featured_2 = substr($inscription->featured_2, -4);
                            $doc_extensio_featured_3 = substr($inscription->featured_3, -4);
                            $doc_extensio_featured_4 = substr($inscription->featured_4, -4);
                            ?>

                            <div class="container">

                                <a href="{{ url('/') }}/{{ $inscription->featured_1 }}" target="_blank">
                                    @if( strpos($doc_extensio_featured_1, 'doc') !== false )
                                    <img src="/storage/images_doc_pdf/doc.png" class="mr-3" height="100px" width="100px" alt="FEATURED_1">
                                    @elseif( strpos($doc_extensio_featured_1, 'pdf') !== false )
                                    <img src="/storage/images_doc_pdf/doc.png" class="mr-3" height="100px" width="100px" alt="FEATURED_1">
                                    @else
                                    <img src="/{{ $inscription->featured_1 }}" class="mr-3" height="100px" width="100px" alt="FEATURED_1">
                                    @endif
                                </a>

                                <a href="{{ url('/') }}/{{ $inscription->featured_2 }}" target="_blank">
                                    @if( strpos($doc_extensio_featured_2, 'doc') !== false )
                                    <img src="/storage/images_doc_pdf/doc.png" class="mr-3" height="100px" width="100px" alt="featured_2">
                                    @elseif( strpos($doc_extensio_featured_2, 'pdf') !== false )
                                    <img src="/storage/images_doc_pdf/pdf.png" class="mr-3" height="100px" width="100px" alt="featured_2">
                                    @else
                                    <img src="/{{ $inscription->featured_2 }}" class="mr-3" height="100px" width="100px" alt="featured_2">
                                    @endif
                                </a>

                                <a href="{{ url('/') }}/{{ $inscription->featured_3 }}" target="_blank">
                                    @if( strpos($doc_extensio_featured_3, 'doc') !== false )
                                    <img src="/storage/images_doc_pdf/doc.png" class="mr-3" height="100px" width="100px" alt="featured_3">
                                    @elseif( strpos($doc_extensio_featured_3, 'pdf') !== false )
                                    <img src="/storage/images_doc_pdf/pdf.png" class="mr-3" height="100px" width="100px" alt="featured_3">
                                    @else
                                    <img src="/{{ $inscription->featured_3 }}" class="mr-3" height="100px" width="100px" alt="featured_3">
                                    @endif
                                </a>

                                <a href="{{ url('/') }}/{{ $inscription->featured_4 }}" target="_blank">
                                    @if( strpos($doc_extensio_featured_4, 'doc') !== false )
                                    <img src="/storage/images_doc_pdf/doc.png" class="mr-3" height="100px" width="100px" alt="featured_4">
                                    @elseif( strpos($doc_extensio_featured_4, 'pdf') !== false )
                                    <img src="/storage/images_doc_pdf/pdf.png" class="mr-3" height="100px" width="100px" alt="featured_4">
                                    @else
                                    <img src="/{{ $inscription->featured_4 }}" class="mr-3" height="100px" width="100px" alt="featured_4">
                                    @endif
                                </a>

                            </div>

                            <hr>

                            {{-- <a href="{{url('/inscriptions/detail', ['id' => $inscription->id])}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Supprimer</a> --}}
                            <a href="{{url('/inscriptions/edit', ['id' => $inscription->id])}}" class="btn btn-success">Modifier</a>
                            <a href="{{url('/telecharger_pdf')}}" class="btn btn-primary">Sauvgarder votre pré-inscription</a>



                            @if( !$is_in )
                                    <a href="/info/suite" class="btn btn-danger">Compléter votre pré-inscription</a>
                            @else
                                    <script type="text/javascript">
                                        /* $(document).ready(function () {
                                            $("#alert_head").hide();
                                        }); */
                                        var dah = document.getElementById("alert_head");
                                        dah.style.display = "none";
                                    </script>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
