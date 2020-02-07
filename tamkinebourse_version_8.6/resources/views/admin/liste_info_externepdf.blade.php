<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
            <li><b> Nom Complet:</b> {{Auth::user()->prenom}} {{Auth::user()->nom}}  </li>
            <li><b> Cin:</b> {{Auth::user()->inscription_externe->cin}} </li>
            <li><b> Date naissance:</b> {{Auth::user()->inscription_externe->date_naissance}} </li>
            <li><b> Téléphone:</b> {{Auth::user()->inscription_externe->telephone}}  </li>
            <li><b> Email:</b> {{Auth::user()->email}}  </li>
        </ul>
    </td>
    <td>
        <ul>
            <li><b> Adresse:</b> {{Auth::user()->adresse}}  </li>
            <li><b> Pays:</b> {{Auth::user()->inscription_externe->pays}}  </li>
            <li><b> Ville:</b> {{Auth::user()->ville}}  </li>
            <li><b> Année d'Inscription:</b> {{Auth::user()->inscription_externe->annee_inscription}}  </li>
            <li><b> Université:</b> {{Auth::user()->inscription_externe->universite->nom_universite}} </li>
            <li><b> Domaine:</b> {{Auth::user()->inscription_externe->domaine->nom_domaine}}  </li>
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
                <th scope="col">Note du 1ère Année de Baccalauréat</th>
                <th scope="col">Note de l'Examen Régional</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{Auth::user()->inscription_externe->etablissement}}</td>
                <td>{{Auth::user()->inscription_externe->filiere_bac}}</td>
                <td>{{Auth::user()->inscription_externe->note_premierbac}}</td>
                <td>{{Auth::user()->inscription_externe->note_examreg}}</td>
            </tr>
        </tbody>
    </table>
</div>

</body>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

</html>


