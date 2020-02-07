<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Programme Tamkine Excellence') }}</title>
    <link rel="icon" type="image/png" href="/images_locale/tamkine.jpg">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- my code -->
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/all.css')}}" rel="stylesheet" type="text/css">

    <!--My CSS-->
    <link href="{{ asset('css/my_style.css') }}" rel="stylesheet" type="text/css" />

<!-- My Javascript Date -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}" defer></script>

</head>

<style>
.mycolor{

    background-color: #3258a5;
}

</style>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar navbar-dark navbar-laravel mycolor">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="/images_locale/logo.png" alt="" width="50px" height="50px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand">

                    <a class="nav-link" href="{{ url('/') }}">
                    <div class="navBar_mystyle_nav">
                        <span>
                          <i class="fas fa-home"></i>
                           Accueil
                        </span>
                    </div>
                    </a>

                    @if( Auth::user() )

                       @if( Auth::user()->inscription_interne && !Auth::user()->role == "admin" )
                        <a class="nav-link" href="{{ url('info') }}"><div class="navBar_mystyle_nav"><span><i class="fa fa-id-card" aria-hidden="true"></i> Page d'informations</span></div></a>
                        @elseif( !Auth::user()->inscription_interne && !Auth::user()->role == "admin" )
                        <a class="nav-link" href="{{ url('home') }}"><div class="navBar_mystyle_nav"><span><i class="fa fa-id-card" aria-hidden="true"></i> Page d'inscription</span></div></a>
                        @endif

                        @if( Auth::user()->role == "admin" )
                        <a class="nav-link" href="{{ url('/admin/gestion') }}">
                        <div class="navBar_mystyle_nav"><span><i class="fas fa-chart-line">

                        </i> Statistiques</span></div></a>
                        <a class="nav-link" href="/liste_etudiant_interne ">
                        <div class="navBar_mystyle_nav"><span><i class="fas fa-list-alt">

                        </i> Liste Etudiants Marocains</span></div></a>
                        <a class="nav-link" href="/liste_etudiant_externe ">
                        <div class="navBar_mystyle_nav"><span><i class="fas fa-th-list">

                        </i> Liste Etudiants Étrangèrs</span></div></a>

                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Etape finale
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/liste_finale_interne">Liste Etudiant Marocain</a>
                            <a class="dropdown-item" href="/liste_finale_externe">Liste Etudiant Étrangères</a>
                        </div>


                       <!--  <p >
    <a href="/liste_etudiant_interne ">
      <button  type="button" class="btn btn-primary btn-lg btn-block">
        <i class="fa fa-file fa-lg white-text" >
           </i> Liste Etudiant Interne
          </button>
         </a></p>
        <p>
         <a href="/liste_etudiant_externe ">
           <button  type="button" class="btn btn-secondary  btn-lg btn-block">
             <i class="fa fa-file fa-lg white-text" >
                </i> Liste Etudiant Externe
               </button>
              </a>
        </p> -->

                        @endif

                    @endif

                </a>

                <!-- <a class="navbar-brand">
                    <a style="color:white" class="nav-link" href="{{ route('register') }}">S'Inscrire</a>
                </a>

                <a class="navbar-brand">
                    <a style="color:white" class="nav-link" href="{{ route('login') }}">Se connecter</a>
                </a> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><div class="navBar_mystyle"><span>Se connecter</span></div></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><div class="navBar_mystyle"><span>{{ __('Inscrivez vous') }}</span></div></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style="color: white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->prenom }} {{ Auth::user()->nom }}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">

                <div class="container">
                          @if ( count( $errors ) > 0 )
                              <div class="alert alert-danger">
                                  @foreach ($errors->all() as $error)
                                      <i class="fa fa-info-circle">   </i>  {{ $error }}<br>
                                  @endforeach
                              </div>
                          @endif
                      </div>

                      <div>
                          @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong><i class="fa fa-info-circle">   </i>  {{ $message }}</strong>
                          </div>
                          @endif
                      </div>

            @yield('content')
        </main>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small indigo mycolor" style="color:white;margin-bottom:0px;margin-bottom:0px">

        <!-- Footer Links -->
        <div class="container mycolor" style="background:#3258a5;color:white;margin-bottom:0px">

          <!-- Grid row-->
          <div class="row text-center d-flex justify-content-center pt-5 mb-3" style="color:white">

            <!-- Grid column -->
            <div class="col-md-2 mb-3">
              <h6 class="text-uppercase font-weight-bold">
                <a href="{{ route('register') }}" style="background:#3258a5;color:white">S'inscrire</a>
              </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 mb-3">
              <h6 class="text-uppercase font-weight-bold">
                <a href="{{ route('login') }}" style="background:#3258a5;color:white">Se connecter</a>
              </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 mb-3">
              <h6 class="text-uppercase font-weight-bold">
                <a href="https://tutoring.tamkine.org" style="background:#3258a5;color:white">Tamkine Tutoring</a>
              </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 mb-3">
              <h6 class="text-uppercase font-weight-bold">
                <a href="https://tamkine.org" style="background:#3258a5;color:white">Tamkine.org</a>
              </h6>
            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row-->
          <hr class="rgba-white-light" style="margin: 0 20%;">

          <!-- Grid row-->
          <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

            <!-- Grid column -->
            <div class="col-md-8 col-12 mt-5">
              <p style="line-height: 1.7rem">Tamkine est une communauté grandissante
                 de compétences diverses passionnées et motivées consciente
                 de la problématique de l’éducation au Maroc et soucieuse de répondre
                à l’appel de Sa Majesté le Roi Mohammed VI de faire de ce besoin vital une priorité nationale..</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row-->
          <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

          <!-- Grid row-->
          <div class="row pb-3" style="text-align:center">

            <!-- Grid column -->
            <div class="col-md-12">

              <div class="mb-5 flex-center">

                <!-- Facebook -->
                <a class="fb-ic">
                  <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic">
                  <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
                </a>
                <!-- Google +-->
                <a class="gplus-ic">
                  <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
                </a>
                <!--Linkedin -->
                <a class="li-ic">
                  <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
                </a>
                <!--Instagram-->
                <a class="ins-ic">
                  <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
                </a>
                <!--Pinterest-->
                <a class="pin-ic">
                  <i class="fab fa-pinterest fa-lg white-text"> </i>
                </a>

              </div>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row-->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->

         <div class="footer-copyright text-center py-0"> ft© 2020 Copyright : Tous droits réservés
            <center>   <a href="https://tamkine.org">www.tamkine.org</a> </center>
        </div>

        <!-- Copyright -->

      </footer>
    </body>
    </html>
