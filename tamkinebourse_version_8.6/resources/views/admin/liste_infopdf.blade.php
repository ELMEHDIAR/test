<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

    <center>
        <img src="{{ public_path('/images_locale/logo2.png') }}" width="120" height="80">
        <br />
        <h1 style="color: #3258a5">Fondation Tamkine</h1>
        <h4 style="color: #3258a5"><i>Programme Tamkine Excellence</i></h4>
    </center>

    <table class="table">
        <tr>
            <td>
                <ul>
                    <li><b> Nom Complet:</b> {{Auth::user()->prenom}} {{Auth::user()->nom}} </li>
                    <li><b> Cin:</b> {{Auth::user()->inscription_interne->cin}} </li>
                    <li><b> Date naissance:</b> {{Auth::user()->inscription_interne->date_naissance}} </li>
                    <li><b> Télephone:</b> {{Auth::user()->inscription_interne->telephone}} </li>
                    <li><b> Email:</b> {{Auth::user()->email}} </li>
                </ul>
            </td>
            <td>
                <ul>
                    <li><b> Adresse:</b> {{Auth::user()->adresse}}
                    <li><b> Ville:</b> {{Auth::user()->ville}} </li>
                    <li><b> Année d'Inscription:</b> {{Auth::user()->inscription_interne->annee_inscription}} </li>
                    <li><b> Université:</b> {{Auth::user()->inscription_interne->universite->nom_universite}} </li>
                    <li><b> Domaine:</b> {{Auth::user()->inscription_interne->domaine->nom_domaine}} </li>
                </ul>
            </td>
            </ul>
    </table>

    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Établissement</th>
                    <th scope="col">Filière</th>
                    @if( Auth::user()->inscription_interne->type_inscription == "M")
                    <th scope="col">Academie Régionale</th>
                    <th scope="col">Direction Provinciale</th>
                    @elseif( Auth::user()->inscription_interne->type_inscription == "E")
                    <th scope="col">Pays</th>
                    @endif
                    <th scope="col">Note du 1ère Année de Baccalauréat</th>
                    <th scope="col">Note de l'Examen Régional</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{Auth::user()->inscription_interne->etablissement}}</td>
                    <td>{{Auth::user()->inscription_interne->filiere_bac}}</td>
                    @if( Auth::user()->inscription_interne->type_inscription == "M")
                    <td>{{Auth::user()->inscription_interne->aref->nom_aref}}</td>
                    <td>{{Auth::user()->inscription_interne->direction->nom_direction}}</td>
                    @elseif( Auth::user()->inscription_interne->type_inscription == "E")
                    <td>{{ Auth::user()->inscription_interne->pays }}</td>
                    @endif
                    <td>{{Auth::user()->inscription_interne->note_premierbac}}</td>
                    <td>{{Auth::user()->inscription_interne->note_examreg}}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
