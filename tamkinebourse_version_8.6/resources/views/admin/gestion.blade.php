@extends('layouts.app')

 @section('content')

 <div class="container">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="">
          <ul class="list-group text-center" >

            <p>
              Etat des demandes de Bourses Tamkine par type d'inscription
      </p>
          <li class="list-group-item d-flex justify-content-between align-items-center mx-4">
            Nombre total d'inscriptions  :
            <span class="badge badge-primary badge-pill mx-4">{{ $total_inscriptions }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center mx-4">
            Nombre d'nscriptions Élèves Marocains :
            <span class="badge badge-primary badge-pill mx-4">{{$inscrit}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center mx-4">
            Nombre d'inscription Élèves Etrangers :
            <span class="badge badge-primary badge-pill mx-4">{{$inscritex}}</span>
          </li>
          </ul>
          </div>
      </div>
      <div class="col">
        <div class="">
          <ul class="list-group text-center">

            <p>
              Etat des demandes de Bourses Tamkine pour chaque Université
      </p>
          <li class="list-group-item d-flex justify-content-between align-items-center mx-4">
            Université Internationale de Rabat
            <span class="badge badge-primary badge-pill mx-4">{{$u_01->count()}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center mx-4">
            Université Euro-Méditerranéenne de Fès :
            <span class="badge badge-primary badge-pill mx-4">{{$u_02->count()}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center mx-4">
            Université Al Akhawayn :
            <span class="badge badge-primary badge-pill mx-4"> {{$u_03->count()}}</span>
          </li>
          </ul>
          </div>
      </div>
    </div>

  </div>

<div class="text-center my-4 py-4 px-4 mx-4">
  <div class="shadow-sm p-3 mb-5 bg-dark rounded">
  <table class="table table-sm table-dark border border-warning">
    <thead>
      <h3 class="text-decoration-none text-white">Etat des demandes de Bourses Tamkine par Académie Régionale </h3>
      <tr>
        <th scope="col"><h3>Numéro de l'AREF</h3> </th>
        <th scope="col"><h3>Nom de l'AREF</h3></th>
        <th scope="col"><h3>Nombre d'inscriptions</h3></th>
      </tr>
    </thead>
    <tbody>
      <tr class="bg-primary">
        <th scope="row">1</th>
        <!--<td> <a href=""> Tanger-Tetouan-Al Hoceima</a></td>-->
        <td>
         {{--  <a type="text" data-toggle="modal" data-target="#myModal">Tanger-Tetouan-Al Hoceima</a> --}}
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Tanger-Tetouan-Al Hoceima
          </button>
        </td>
        <td>{{$ex_1->count()}}</td>

      </tr>
      <tr class="bg-dark">
        <th scope="row">2</th>
        <td>
          {{--  <a type="text" data-toggle="modal" data-target="#myModalone">Oriental </a> --}}
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModalone">
            Oriental
          </button>
        </td>
        <td>{{$ex_2->count()}}</td>

      </tr>
      <tr class="bg-info">
        <th scope="row">3</th>
        <td>
          {{-- <a type="text" data-toggle="modal" data-target="#myModaltwo">Fes-Meknes </a> --}}
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal3">
            Fes-Meknes
          </button>
         </td>
        <td>{{$ex_3->count()}}</td>

      </tr>
      <tr class="bg-primary">
        <th scope="row">4</th>
        <td>
          {{-- <a type="text" data-toggle="modal" data-target="#myModalthree">Rabat-Sale-Kenitra </a> --}}
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">
            Rabat-Sale-Kenitra
          </button>
         </td>
        <td>{{$ex_4->count()}}</td>

      </tr>
      <tr class="bg-info">
        <th scope="row">5</th>
        <td>
          {{-- <a type="text" data-toggle="modal" data-target="#myModalfour">Beni Mellal-Khenifra </a> --}}
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5">
            Beni Mellal-Khenifra
          </button>
         </td>
        <td>{{$ex_5->count()}}</td>

      </tr>
      <tr class="bg-dark">
        <th scope="row">6</th>
        <td>
          {{-- <a type="text" data-toggle="modal" data-target="#myModalfive">Casablanca-Settat </a> --}}
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal6">
            Casablanca-Settat
          </button>
        </td>
        <td>{{$ex_6->count()}}</td>

      </tr>
      <tr class="bg-primary">
        <th scope="row">7</th>
        <td>
          {{-- <a type="text" data-toggle="modal" data-target="#myModalsix">Marrakech-Safi </a> --}}
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal7">
            Marrakech-Safi
          </button>
        </td>
        <td>{{$ex_7->count()}}</td>

      </tr>
      <tr class="bg-info">
        <th scope="row">8</th>
        <td>
         {{--  <a type="text" data-toggle="modal" data-target="#myModalseven">Draa-Tafilalet </a>  --}}

          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal8">
            Draa-Tafilalet
          </button>
        </td>
        <td>{{$ex_8->count()}}</td>

      </tr>
      <tr class="bg-primary">
        <th scope="row">9</th>
        <td>
          {{-- <a type="text" data-toggle="modal" data-target="#myModaleight">Souss-Massa </a>  --}}
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal9">
            Souss-Massa
          </button>
        </td>
        <td>{{$ex_9->count()}}</td>

      </tr>
      <tr class="bg-info">
        <th scope="row">10</th>
        <td>
          {{-- <a type="text" data-toggle="modal" data-target="#myModalnine">Guelmim-Oued Noun </a> --}}
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal10">
            Guelmim-Oued Noun
          </button>
        </td>
        <td>{{$ex_10->count()}}</td>

      </tr>
      <tr class="bg-dark">
        <th scope="row">11</th>
        <td>
         {{--  <a type="text" data-toggle="modal" data-target="#myModalten">Laayoune-Sakia El Hamra </a>  --}}
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal11">
            Laayoune-Sakia El Hamra
          </button>
        </td>
        <td>{{$ex_11->count()}}</td>

      </tr>
      <tr class="bg-info">
        <th scope="row">12</th>
        <td>
          {{-- <a type="text" data-toggle="modal" data-target="#myModaleleven">Dakhla-Oued Ed-Dahab </a>  --}}

          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal12">
            Dakhla-Oued Ed-Dahab
          </button>
        </td>
        <td>{{$ex_12->count()}}</td>
      </tr>
    </tbody>
  </table>
</div>


 </div>
</div>






  <!-- contaoner de modal-->
<div class="container">
 <!-- Modal  zero-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  <table class="table table-striped border border-primary">
    <thead>
      <tr>
        <th scope="col">Numéro</th>
        <th scope="col">Direction Provinciale</th>
        <th scope="col">Nombre d'iscriptions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Direction Provinciale de Tanger-Assilah</td>
        <td>{{$di_01->count()}}</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Direction Provinciale de M'diq-Fnideq</td>
        <td>{{$di_02->count()}}</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Direction Provinciale de Tetouan</td>
        <td>{{$di_03->count()}}</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Direction Provinciale de Fahs-Anjra</td>
        <td>{{$di_04->count()}}</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Direction Provinciale de Larache</td>
        <td>{{$di_05->count()}}</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Direction Provinciale d'Al Hoceima</td>
        <td>{{$di_06->count()}}</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Direction Provinciale de Chefchaouen</td>
        <td>{{$di_07->count()}}</td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Direction Provinciale de Ouezzane</td>
        <td>{{$di_08->count()}}</td>
      </tr>
    </tbody>
  </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  </div>


    <!-- myModalone-->
<div class="container">
  <div class="modal fade" id="myModalone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  <table class="table table-striped border border-primary">
    <thead>
      <tr>
        <th scope="col">Numéro</th>
        <th scope="col">Direction Provinciale</th>
        <th scope="col">Nombre d'iscriptions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Direction Provinciale de Nador</td>
        <td>{{$di_09->count()}}</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Direction Provinciale de Driouch</td>
        <td>{{$di_10->count()}}</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Direction Provinciale de Jerada</td>
        <td>{{$di_11->count()}}</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Direction Provinciale de Berkane</td>
        <td>{{$di_12->count()}}</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Direction Provinciale de Taourirt</td>
        <td>{{$di_13->count()}}</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Direction Provinciale de Guercif</td>
        <td>{{$di_14->count()}}</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Direction Provinciale de Figuig</td>
        <td>{{$di_15->count()}}</td>
      </tr>
    </tbody>
  </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  </div>


  {{-- mymodal3 --}}
  <div class="container">
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
        <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale de Fes</td>
          <td>{{$di_16->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale de Fes</td>
          <td>{{$di_17->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Direction Provinciale dEl Hajeb</td>
          <td>{{$di_18->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale dIfrane</td>
          <td>{{$di_19->count()}}</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Direction Provinciale de Moulay Yaacoub</td>
          <td>{{$di_20->count()}}</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Direction Provinciale de Sefrou</td>
          <td>{{$di_21->count()}}</td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>Direction Provinciale de Boulemane</td>
          <td>{{$di_22->count()}}</td>
        </tr>
        <tr>
          <th scope="row">8</th>
          <td>Direction Provinciale de Taounate</td>
          <td>{{$di_23->count()}}</td>
        </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>

    {{-- mymodal4 --}}
  <div class="container">
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
        <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale de Rabat</td>
          <td>{{$di_24->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale de Sale</td>
          <td>{{$di_25->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Direction Provinciale de Skhirate-Temara</td>
          <td>{{$di_26->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale de Kenitra</td>
          <td>{{$di_27->count()}}</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Direction Provinciale de Khemisset</td>
          <td>{{$di_28->count()}}</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Direction Provinciale de Sidi Kacem</td>
          <td>{{$di_29->count()}}</td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>Direction Provinciale de Sidi Slimane</td>
          <td>{{$di_30->count()}}</td>
        </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>

    {{-- mymodal5 --}}


    <div id="myModalfour" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
             <h4 class="modal-title">Les Directions suivis</h4>
          </div>
          <div class="modal-body">
            <p>Direction Provinciale de Beni-Mellal : {{$di_31->count()}} </p>
            <p>Direction Provinciale d'Azilal : {{$di_32->count()}} </p>
            <p>Direction Provinciale de Fquih Ben Salah : {{$di_33->count()}} </p>
            <p>Direction Provinciale de Khenifra : {{$di_34->count()}}  </p>
            <p>Direction Provinciale de Khouribga : {{$di_35->count()}}  </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>

      </div>
    </div>


  <div class="container">
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
          <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale de Beni-Mellal</td>
          <td>{{$di_31->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale d'Azilal</td>
          <td>{{$di_32->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>irection Provinciale de Fquih Ben Salah</td>
          <td>{{$di_33->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale de Khenifra</td>
          <td>{{$di_34->count()}}</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Direction Provinciale de Khouribga</td>
          <td>{{$di_35->count()}}</td>
        </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>

    {{-- mymodal6 --}}
  <div class="container">
    <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
          <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale de Casablanca</td>
          <td>{{$di_36->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale de Mohammedia</td>
          <td>{{$di_37->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Direction Provinciale d'El Jadida</td>
          <td>{{$di_38->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale de Nouaceur</td>
          <td>{{$di_39->count()}}</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Direction Provinciale de Mediouna</td>
          <td>{{$di_40->count()}}</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Direction Provinciale de Benslimane </td>
          <td>{{$di_41->count()}}</td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>Direction Provinciale de Berrechid</td>
          <td>{{$di_42->count()}}</td>
        </tr>
        <th scope="row">8</th>
        <td>Direction Provinciale de Settat</td>
        <td>{{$di_43->count()}}</td>
      </tr>
      <th scope="row">9</th>
      <td>Direction Provinciale de Sidi Bennour</td>
      <td>{{$di_44->count()}}</td>
    </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    {{-- mymodal7 --}}

  <div class="container">
    <div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
        <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale de Marrakech </td>
          <td>{{$di_45->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale de Chichaoua</td>
          <td>{{$di_46->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Direction Provinciale d'Al Haouz</td>
          <td>{{$di_57->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale d'El Kelaa des Sraghna</td>
          <td>{{$di_48->count()}}</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Direction Provinciale d'Essaouira</td>
          <td>{{$di_49->count()}}</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Direction Provinciale de Rehamna </td>
          <td>{{$di_50->count()}}</td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>Direction Provinciale de Safi</td>
          <td>{{$di_51->count()}}</td>
        </tr>
        <tr>
        <th scope="row">8</th>
        <td>Direction Provinciale de Youssoufia</td>
        <td>{{$di_52->count()}}</td>
      </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>

    {{-- mymodal8 --}}
  <div class="container">
    <div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
        <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale d'Errachidia</td>
          <td>{{$di_53->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale de Ouarzazate</td>
          <td>{{$di_54->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Direction Provinciale de Midelt</td>
          <td>{{$di_55->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale de Tinghir</td>
          <td>{{$di_56->count()}}</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Direction Provinciale de Zagora</td>
          <td>{{$di_57->count()}}</td>
        </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>

    {{-- mymodal9 --}}
  <div class="container">
    <div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
          <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale d'Agadir Ida-Outanane</td>
          <td>{{$di_58->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale d'Inezgane-Ait Melloul</td>
          <td>{{$di_59->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Direction Provinciale de Chtouka-Ait Baha</td>
          <td>{{$di_60->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale de Taroudant</td>
          <td>{{$di_61->count()}}</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>irection Provinciale de Tiznit</td>
          <td>{{$di_62->count()}}</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Direction Provinciale de Tata </td>
          <td>{{$di_63->count()}}</td>
        </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>

    {{-- mymodal10 --}}
  <div class="container">
    <div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
          <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale de Guelmim </td>
          <td>{{$di_64->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale d'Assa-Zag</td>
          <td>{{$di_65->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Direction Provinciale de Tan-Tan</td>
          <td>{{$di_66->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale de Sidi Ifni</td>
          <td>{{$di_67->count()}}</td>
        </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>

    {{-- mymodal11 --}}
  <div class="container">
    <div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
        <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale de Laayoune</td>
          <td>{{$di_68->count()}}</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Direction Provinciale de Boujdour</td>
          <td>{{$di_69->count()}}</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Direction Provinciale de Tarfaya</td>
          <td>{{$di_70->count()}}</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Direction Provinciale d'Es-Semara </td>
          <td>{{$di_71->count()}}</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Direction Provinciale d'Oued Ed-Dahab </td>
          <td>{{$di_72->count()}}</td>
        </tr>
      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>



        {{-- mymodal12 --}}
  <div class="container">
    <div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre d'inscriptions par Direction Provinciale : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <table class="table table-striped border border-primary">
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Direction Provinciale</th>
        <th scope="col">Nombre d'iscriptions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Direction Provinciale d'Aousserd</td>
          <td>{{$di_73->count()}}</td>
        </tr>

      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </div>



@endsection
