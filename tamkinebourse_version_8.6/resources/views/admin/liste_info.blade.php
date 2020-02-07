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
            Veuillez poursuivre votre inscription après l'obtention du baccalauréat, et télécharger le relevé de notes
             du baccalauréat et une copie de l'attestation de réussite au baccalauréat
            </div>
                <div class="card-header centre">{{Auth::user()->prenom}} {{Auth::user()->nom}}  </div>

                <div class="card-body">
                  <div class="col-md-10">
                    <div class="card-body">

                        <ul>
                          <li><b> Nom Complet:</b> {{Auth::user()->prenom}} {{Auth::user()->nom}}  </li>
                          <li><b> CIN:</b> {{Auth::user()->inscription_interne->cin}} </li>
                          <li><b> Date naissance:</b> {{Auth::user()->inscription_interne->date_naissance}} </li>
                          <li><b> Télephone:</b> {{Auth::user()->inscription_interne->telephone}}  </li>
                          <li><b> Email:</b> {{Auth::user()->email}}  </li>
                          <li><b> Adresse:</b> {{Auth::user()->adresse}}  </li>
                          <li><b> Ville:</b> {{Auth::user()->ville}}  </li>
                        </ul>


                        <table class="table">
                            <thead>
                                <tr>
                                  <th> Établissement</th>
                                  <th> Filière</th> 
                                  <th> A.RégionalE</th>
                                  <th> D.Provinciale</th>
                                  <th> Premier Bac</th>
                                  <th> E.Régional </th>
                                  </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th> {{Auth::user()->inscription_interne->etablissement}}   </th>
                                    <th> {{Auth::user()->inscription_interne->filiere_bac}}  </th> 
                                    <th>{{Auth::user()->inscription_interne->aref->nom_aref}} </th>
                                    <th>{{Auth::user()->inscription_interne->direction->nom_direction}} </th>
                                    <th>{{Auth::user()->inscription_interne->note_premierbac}} </th>
                                    <th>{{Auth::user()->inscription_interne->note_examreg}} </th>
                                    </tr>
                            </tbody>
                        </table>


                        <ul>
                            <li>Annee Inscription: {{Auth::user()->inscription_interne->annee_inscription}}  </li>
                            <li> Universite : {{Auth::user()->inscription_interne->universite->nom_universite}} </li>
                            <li> Domaine : {{Auth::user()->inscription_interne->domaine->nom_domaine}}  </li>
                          </ul>
                      <button type="submit" class="btn btn-primary">Modifier</button>
                      <button type="submit" class="btn btn-primary"><a href="{{url('/telecharger_pdf')}}" style="color: white">Exporter vers PDF</a></button>

                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
