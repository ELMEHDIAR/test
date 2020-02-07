@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
      
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Inscription Valider </div>
                <center>

                    <div class="alert alert-primary" role="alert">
                        Bonjour {{ Auth::user()->prenom }} {{ Auth::user()->nom }}, Votre dossier d'inscription pour une Bourse Tamkine est complet <br />  
                    </div>
        
                </center>
                
 

            </div>
        </div>
    </div>
</div>
</div>  
@endsection
