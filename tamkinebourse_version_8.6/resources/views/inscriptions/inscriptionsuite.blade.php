@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Merci de compléter votre dossier d'inscription </div>
                <center>

                    <div class="alert alert-primary" role="alert">
                        Bonjour {{ Auth::user()->prenom }} {{ Auth::user()->nom }}, <br />  
                    </div>
        
                </center>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif 
                    <!-- <div class="form-group">
                            <input type="radio" name="tab" value="igotnone" onclick="show1();" />Inscription marocain
                            <input type="radio" name="tab" value="igottwo" onclick="show2();" />Inscription african
                    </div> -->

                    


                        <form action="{{ route('suite.ajouter') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group">
                                <label for="note_bac">Votre note générale du Baccalauréat : </label>
                                <input type="text" class="form-control" name="note_bac" id="note_bac">
                            </div>
 
                            <div class="form-group">
                                <label for="featured_01">Télécharger votre attestation de réussite au baccalauréat</label>
                                <input type="file" class="form-control-file" name="featured_01" />
                            </div>
                            <div class="form-group">
                                <label for="featured_02">Télécharger votre Relevé de notes du baccalauréat </label>
                                <input type="file" class="form-control-file" name="featured_02" />
                            </div> 


                            <input type="hidden" name="id_inscriptions_fk" value="{{ Auth::user()->inscription_interne->id}}">

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Validez votre inscription</button></div>
                        </form>
                        </div> 
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div> 
@endsection
