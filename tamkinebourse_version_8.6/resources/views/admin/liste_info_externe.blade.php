@extends('layouts.app')

<style>

.centre{

 text-align: center;

}

</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

            <div class="alert alert-danger" role="alert">
            veuillez continuez votre inscription après l'obtenir de votre diplome du baccalauréat, et envoyer une relever de note du baccalauréat et une copie du baccalauréat
            </div>
                <div class="card-header centre">{{Auth::user()->prenom}} {{Auth::user()->nom}}  </div>

                <div class="card-body">
                  <div class="col-md-10">
                    <div class="card-body">

                        <ul>
                          <li><b> Nom Complet:</b> {{Auth::user()->prenom}} {{Auth::user()->nom}}  </li>
                          <li><b> Cin:</b> {{Auth::user()->inscription_externe->cin}} </li>
                          <li><b> Date naissance:</b> {{Auth::user()->inscription_externe->date_naissance}} </li>
                          <li><b> Téléphone:</b> {{Auth::user()->inscription_externe->telephone}}  </li>
                          <li><b> Email:</b> {{Auth::user()->email}}  </li>
                          <li><b> Adresse:</b> {{Auth::user()->adresse}}  </li>
                          <li><b> Ville:</b> {{Auth::user()->ville}}  </li>
                        </ul>


                        <table class="table">
                            <thead>
                                <tr>
                                  <th> Établissement</th>
                                  <th> Filière</th>
                                  <th> Pays</th>
                                  <th> Premier Bac</th>
                                  <th> E.Régional </th>
                                  </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th> {{Auth::user()->inscription_externe->etablissement}}   </th>
                                    <th> {{Auth::user()->inscription_externe->filiere_bac}}  </th>
                                    <th> {{Auth::user()->inscription_externe->pays}}  </th>
                                    <th>{{Auth::user()->inscription_externe->note_premierbac}} </th>
                                    <th>{{Auth::user()->inscription_externe->note_examreg}} </th>
                                    </tr>
                            </tbody>
                        </table>

                        
                        <ul>
                            <li>Annee Inscription: {{Auth::user()->inscription_externe->annee_inscription}}  </li>
                            <li> Universite : {{Auth::user()->inscription_externe->universite->nom_universite}} </li>
                            <li> Domaine : {{Auth::user()->inscription_externe->domaine->nom_domaine}}  </li>
                          </ul>
                      <button type="submit" class="btn btn-primary">Modifier</button>
                      <button type="submit" class="btn btn-primary"><a href="{{url('/telecharger_externe_pdf')}}" style="color: white">Exporter vers PDF</a></button>

                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
