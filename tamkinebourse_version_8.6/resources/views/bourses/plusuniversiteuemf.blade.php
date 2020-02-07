@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col">

        <!-- Card -->
  <div class="card mb-4">

    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top" src="/images_locale/merite.png" alt="Card image cap" />
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title">Bourse de mérite</h4>
      <!--Text-->
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
    <!--  <center> <button type="button" class="btn btn-light-blue btn-md" data-toggle="modal" data-target="modal-merite"><a> Voir plus </a></button> </center> -->

<!-- Modal button -->
<center><button type="button" class="btn btn-light-bleu btn-md"><a href="/bourse_merite"> Voir plus</a>

</button></center>


    </div>

  </div>
  <!-- Card -->
      </div>
      <div class="col">

        <!-- Card -->
  <div class="card mb-4">

    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top" src="/images_locale/excellence.png" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title">Bourse d'excellence</h4>
      <!--Text-->
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
     <!-- <center> <button type="button" class="btn btn-light-blue btn-md"><a href="/bourse_exellance"> Voir plus </a></button> </center>-->

     <!-- Modal button -->
     <center><button type="button" class="btn btn-light-bleu btn-md"><a href="/bourse_excellence"> Voir plus</a>
</button></center>

    </div>

  </div>
  <!-- Card -->
      </div>
      <div class="col">

        <!-- Card -->
  <div class="card mb-4">

    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top" src="/images_locale/scolarite.png" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title">Bourse d'Afrique</h4>
      <!--Text-->
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <!-- <center> <button type="button" class="btn btn-light-blue btn-md"><a href="/bourse_scolarite"> Voir plus </a></button> </center> -->

      <!-- Modal button -->
      <center><button type="button" class="btn btn-light-bleu btn-md"><a href="/bourse_afrique"> Voir plus</a>
</button></center>
<!-- Modal body -->
<div class="modal fade" id="bourse_afrique" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Bourse d'Afrique</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Some quick example text to build on the card title and make up the bulk of the card's content.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a style="color: white" href="{{ route('register') }}">Inscrivez vous</a></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal button // -->

    </div>

  </div>
  <!-- Card -->
      </div>
      <div class="col">

        <!-- Card -->
  <div class="card mb-4">

    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top" src="/images_locale/solidarite.png" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title">Bourse de Solidarité</h4>
      <!--Text-->
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <!-- <center> <button type="button" class="btn btn-light-blue btn-md"><a href="/bourse_solidarite"> Voir plus </a></button> </center> -->

<!-- Modal button -->
<center><button type="button" class="btn btn-light-bleu btn-md"><a href="/bourse_solidarite"> Voir plus</a>
</button></center>
<!-- Modal body -->
<div class="modal fade" id="bourse_solidarite" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Bourse de Solidarité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Some quick example text to build on the card title and make up the bulk of the card's content.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a style="color: white" href="{{ route('register') }}">Inscrivez vous</a></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>


@endsection
