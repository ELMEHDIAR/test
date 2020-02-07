
@extends('layouts.app')

@section('content')


<!-- <nav style="margin-left: 30px"> <a href="/liste_etudiant_interne">liste d'étudiant marocain</a> | <a href="/liste_etudiant_externe">liste d'étudiant étrangère</a> </nav> -->


<h3 class="text-center"> Liste Etudiants Marocain </h3>

<div class="container">
<form action="/interne_search_final" method="POST">
        {{ csrf_field() }}

        <div class="card">
          <div class="card-header">

          </div>
          <div class="card-body">
            <h5 class="card-title">Faire une recherche</h5>
            <p class="card-text">


              <div class="container">
                <div class="row">
                  <div class="col">
                    <input type="text"  name="cin" id="cin" class="form-control" placeholder="CIN">
                  </div>
                  <div class="col">
                    <input type="text"  name="telephone" id="telephone" class="form-control" placeholder="Téléphone">
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col">
                    <input type="text"  name="note_premierbac1" id="note_premierbac1" class="form-control" placeholder="Notes première année du BAC MIN">
                  </div>
                  <div class="col">
                    <input type="text"  name="note_premierbac2" id="note_premierbac2" class="form-control" placeholder="Notes première année du BAC MAX">
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col">
                    <input type="text"  name="note_regionale1" id="note_regionale1" class="form-control" placeholder="Notes contrôle régional (MIN) ">
                  </div>
                  <div class="col">
                    <input type="text"  name="note_regionale2" id="note_regionale2" class="form-control" placeholder="Notes contrôle régional (Max)">
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="col">
                    <input type="text" name="note_bac1" id="note_bac1" class="form-control" placeholder="Notes generale du BAC (MIN) ">
                  </div>
                  <div class="col">
                    <input type="text" name="note_bac2" id="note_bac2" class="form-control" placeholder="Notes generale du BAC (Max)">
                  </div>
                </div>



              </div>

            </p>
            <button type="submit" class="btn btn-primary col-12">Recherche</button>
          </div>
        </div>







    {{--  <table>

     <tr>

     <td><input type="text"  name="cin" id="cin" class="form-control" placeholder="cin"></td>
     <td><input type="text"  name="telephone" id="telephone" class="form-control" placeholder="téléphone"></td>

     <td><input type="text"  name="note_premierbac1" id="note_premierbac1" class="form-control" placeholder="Note première année du BAC MIN"></td>
     <td><input type="text"  name="note_premierbac2" id="note_premierbac2" class="form-control" placeholder="Note première année du BAC MAX"></td>

     <td><input type="text"  name="note_regionale1" id="note_regionale1" class="form-control" placeholder="note régionale min"></td>
     <td><input type="text"  name="note_regionale2" id="note_regionale2" class="form-control" placeholder="note régionale max"></td>



    </tr>

    </table> --}}
    <br />


    <!-- <a href="{{route('export_excel.in')}}"> Export excel </a> -->
    </form>

    <form action="{{ route('export_excel.interne') }}" method="POST">
    {{ csrf_field() }}
    <td><input type="hidden"  name="cin" id="cin" class="form-control" placeholder="cin" value="{{ Request::get('cin') }}"></td>
    <td><input type="hidden"  name="telephone" id="telephone" class="form-control" placeholder="téléphone" value="{{ Request::get('telephone') }}"></td>

<td><input type="hidden"  name="note_premierbac1" id="note_premierbac1" class="form-control" placeholder="note premierbac min" value="{{ Request::get('note_premierbac1') }}"></td>
<td><input type="hidden"  name="note_premierbac2" id="note_premierbac2" class="form-control" placeholder="note premierbac max" value="{{ Request::get('note_premierbac2') }}"></td>

<td><input type="hidden"  name="note_regionale1" id="note_regionale1" class="form-control" placeholder="note régionale min" value="{{ Request::get('note_regionale1') }}"></td>
<td><input type="hidden"  name="note_regionale2" id="note_regionale2" class="form-control" placeholder="note régionale max" value="{{ Request::get('note_regionale2') }}"></td>

<td><input type="hidden"  name="note_bac1" id="note_bac1" class="form-control" placeholder="note régionale min" value="{{ Request::get('note_bac1') }}"></td>
<td><input type="hidden"  name="note_bac2" id="note_bac2" class="form-control" placeholder="note régionale max" value="{{ Request::get('note_bac2') }}"></td>

    <center><button type="submit" class="btn btn-success col-2">Télécharger</button></center>
    </form>

    @if (session('status'))
    <div class="alert alert-danger" role="alert">
        {{ session('status') }}
    </div>
@endif
</div>

</div>
<div class="row">
  <div class="col-12">

  <div class="md-card-content" style="overflow-x: auto; margin:20px;">

  <table class="table table-striped uk-table">
        <thead>
          <tr>
            <th class="table-active">Cin</th>
            <th class="table-active">Prenom</th>
            <th class="table-active">Nom</th>
            <th class="table-active">Date Naissance</th>
            <th class="table-active">Telephone</th>
            <th class="table-active">Ville</th>
            <th class="table-active">Adresse</th>
            <th class="table-active">Email</th>
            <th class="table-active">Établissement</th>
            <th class="table-active">Filière Bac</th>
            <th class="table-active">Academie</th>
            <th class="table-active">Direction </th>
            <th class="table-active">Premier Bac</th>
            <th class="table-active">Bac general</th>
            <th class="table-active">Note Régionale</th>
            <th class="table-active">Type Bourse</th>
            <th class="table-active">Universite </th>
            <th class="table-active">Domaine </th>
            <th class="table-active">Filiere </th>
            <th class="table-active">Année Inscription  </th>
            <th class="table-active">Situation Père </th>
            <th class="table-active"> Situation Mère </th>
            <th class="table-active"> Situation Père </th>
            <th class="table-active"> Situation Mère </th>
            <th class="table-active"> Premier Bac </th>
            <th class="table-active"> Exam Reg </th>
            <th class="table-active"> Fichier Bac </th>
            <th class="table-active"> Relevés de note </th>
          </tr>
        </thead>
        <tbody>
                <tr>
                    @foreach ($in as $s)
                <td class="table-primary">{{$s->cin}}</td>
                <td class="table-primary">{{$s->prenom}}</td>
                <td class="table-primary">{{$s->nom}}</td>
                <td class="table-primary">{{$s->date_naissance}}</td>
                <td class="table-primary">{{$s->telephone}}</td>
                <td class="table-primary">{{$s->ville}}</td>
                <td class="table-primary">{{$s->adresse}}</td>
                <td class="table-primary">{{$s->email}}</td>
                <td class="table-primary">{{$s->etablissement}}</td>
                <td class="table-primary">{{$s->filiere_bac}}</td>
                <td class="table-primary">{{$s->nom_aref}}</td>
                <td class="table-primary">{{$s->nom_direction}}</td>
                <td class="table-primary">{{$s->note_premierbac}}</td>
                <td class="table-primary">{{$s->note_bac}}</td>
                <td class="table-primary">{{$s->note_examreg}}</td>
                <td class="table-primary">{{$s->type_bourse}}</td>
                <td class="table-primary">{{$s->nom_universite}}</td>
                <td class="table-primary">{{$s->nom_domaine}}</td>
                <td class="table-primary">{{$s->nom_filiere}}</td>
                <td class="table-primary">{{$s->annee_inscription}}</td>
                <td class="table-primary">{{$s->situation_pere}}</td>
                <td class="table-primary">{{$s->situation_mere}}</td>
                <td class="table-primary">
                    <a href= "{{'/'}}{{$s->featured_1}}" download= "{{'/'}}{{$s->featured_1}}">
                        <button class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Situation.Père </button>
                      </a>
                </td>
                <td class="table-primary">
                    <a href= "{{'/'}}{{$s->featured_2}}" download= "{{'/'}}{{$s->featured_2}}">
                        <button class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Situation.Mère </button>
                      </a>
                </td>
                <td class="table-primary">
                    <a href= "{{'/'}}{{$s->featured_3}}" download= "{{'/'}}{{$s->featured_3}}">
                        <button class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Premier.Bac </button>
                    </a>
                </td>
                <td class="table-primary">
                    <a href= "{{'/'}}{{$s->featured_4}}" download= "{{'/'}}{{$s->featured_4}}">
                        <button class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Exam.Reg </button>
                    </a>
                </td>

                <td class="table-primary">
                    <a href= "{{'/'}}{{$s->featured_01}}" download= "{{'/'}}{{$s->featured_01}}">
                        <button class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Fichier Bac </button>
                    </a>
                </td>
                <td class="table-primary">
                    <a href= "{{'/'}}{{$s->featured_02}}" download= "{{'/'}}{{$s->featured_02}}">
                        <button class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Relevés de note </button>
                    </a>
                </td>
                </tr>
                    @endforeach


        </tbody>
      </table>


      </div>
  </div>
</div>

@endsection
