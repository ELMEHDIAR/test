@extends('layouts.app')
@section('content')

<style>
.card-img-top{
    width: 400px;
    height: 200px;
}
</style>



<div class="">
  <marquee scrollamount="25"><h1 style="color:#3258a5" class="font-weight-bold">
    Conditions requises pour postuler pour une Bourse Tamkine</h1></marquee>
  <div class="row">
    <div class="col-md-auto my-4 text-center">
       <img class="" src="/images_locale/logo2.png" alt="" width="300px" height="220px">
      
    </div>
    <div class="col">
       <div style=" margin-left:120px" class="">
        <ol>
            <li>Créer un compte sur le site de Bourse Tamkine.</li>
            <li>Choisir l'université où vous voulez poursuivre vos études universitaires.</li>
            <li>Choisir la filière que vous voulez poursuivre vos études universitaires.</li>
            <li>Renseigner le formulaire Bourse Tamkine.</li>
            <li>Télécharger :</li>
            <p> - Votre Relevé de notes de la Première année du Baccalauréat.</p>
            <li>Sauvegarder votre mot de passe que vous utiliserez pour compléter <br>
               votre dossier après l'obtention du Baccalauréat.</li>
          </ol>
       </div>
    </div>
    <div class="col-md-auto text-center ">
       <img class="" src="/images_locale/bourse.png" alt="" width="300px" height="300px">
    </div>
  </div>
</div>

{{-- <div class="container">
    <div class="row">
      <div class="col">
          <center> <img class="" src="/images_locale/bourse.png" alt="" width="400px" height="400px"></center>
      </div>
      <div class="col" style="padding-top:25px">
        <h1> NB:</h1>
        <p> Les conditions requises pour postuler pour une bourse :</p>
        <ol>
            <li>Créer un compte sur le site de Bourse Tamkine.</li>
            <li>Choisir l'université où vous voulez poursuivre vos études universitaires.</li>
            <li>Choisir la filière que vous voulez poursuivre vos études universitaires.</li>
            <li>Renseigner le formulaire Bourse Tamkine.</li>
            <li>Télécharger :</li>
            <p> - Votre Relevé de notes de la Première année du Baccalauréat.</p>
            <li>Sauvegarder votre mot de passe que vous utiliserez pour compléter votre dossier après l'obtention du Baccalauréat.</li>
          </ol>
      </div>
      <div class="col">
        <center> <img class="" src="/images_locale/logo2.png" alt="" width="400px" height="400px"></center>
      </div>
    </div>
  </div> --}}



  <div class="jumbotron card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">
    <div class="text-white text-center py-5 px-4">
      <div>
        <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>Choisissez votre parcours universitaire</strong></h2>
        <h3 class="mx-5 mb-5"> Vous voulez devenir Ingenieur ou Gesitionnaire de Resources humaines,
           et suivre vos études dans l'une des meilleures universités du Royaume: La Fondation Tamkine vous ouvre l'accès à une Bourse
            Tamkine. Vous avez une bonne note aux  examans régional et national , Rejoignez-nous,
            <a  src="" href="{{ route('register') }}" style="color:#3258a5">
              <span> Postulez pour la Bourse Tamkine.</span></a>
        </h3>
        <!-- <p> <a href="/register" class="btn btn-primary">Je m'inscris</a></p> -->

        <div class="container">
            <div class="row">
              <div class="col-sm">

               <!-- Card -->
        <div class="card text-primary">

            <!-- Card image -->
            <img class="card-img-top" src="/images_locale/umf.jpg" alt="Card image cap">

            <!-- Card content -->
            <div class="card-body">

              <!-- Title -->
              <h4 class="card-title text-blue"><a>Université Euro-Méditerranéenne de Fès</a></h4>
              <!-- Text -->
              <p class="card-text">
                L’Université Euro-Méditerranéenne de Fès est placée sous la Présidence d’Honneur de Sa Majesté le Roi Mohammed VI...</p>
              <!-- Button -->
              <a href="/plusuniversiteuemf" class="btn btn-primary">Lire la suite</a>

            </div>

          </div>
          <!-- Card -->

              </div>
              <div class="col-sm">

                <div class="card text-primary">

                    <!-- Card image -->
                    <img class="card-img-top" src="/images_locale/uir.jpg" alt="Card image cap">

                    <!-- Card content -->
                    <div class="card-body">

                      <!-- Title -->
                      <h4 class="card-title text-blue"><a>Université Internationale de Rabat</a></h4>
                      <!-- Text -->
                      <p class="card-text">L’Université Internationale de Rabat ou UIR est une université privée fondée en 2010 sous contrat avec l’État marocain.</p>
                      <!-- Button -->
                      <a href="#" class="btn btn-primary">Lire la suite</a>

                    </div>

                  </div>

              </div>
              <div class="col-sm">

                <div class="card text-primary">

                    <!-- Card image -->
                    <img class="card-img-top" src="/images_locale/akhawin.jpg" alt="Card image cap">

                    <!-- Card content -->
                    <div class="card-body">

                      <!-- Title -->
                      <h4 class="card-title text-blue"><a>Al Akhawayn University</a></h4>
                      <!-- Text -->
                      <p class="card-text">L'université Al Akhawayn est une institution d’enseignement supérieur et de recherche scientifique anglophone située à Ifrane, au Moyen Atlas marocain.</p>
                      <!-- Button -->
                      <a href="#" class="btn btn-primary">Lire la suite</a>

                    </div>

                  </div>

              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
@endsection
