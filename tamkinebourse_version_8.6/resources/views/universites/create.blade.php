@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Universite</div>

                <div class="card-body">


                @if(count($errors)>0)
                <ul class="navbar-nav mr-auto">
                    @foreach ($errors->all() as $error)
                    <li class="nav-item active">
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
                @endif


                <form action="{{route('universite.store')}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="nom_universite" placeholder="Enter universite name" />
                        </div>

                        <!-- <div class="form-group">
                    <label for="nom_universite">Universite</label>
                <select class="form-control" id="nom_universite" name="nom_universite">
                    @foreach ($universites as $universite)
                    <option value="{{$universite->id}}">{{$universite->nom_universite}}</option>
                    @endforeach
                      </select>
                </div> -->

                        <div class="form-check">
                        @foreach ($domaines as $domaine)
                        <input class="form-check-input" type="checkbox" name="domaines[]" value="{{$domaine->id}}"></input>
                       <label class="form-check-label">
                            {{$domaine->nom_domaine}}
                       </label>
                       <br />
                        @endforeach
                    </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
