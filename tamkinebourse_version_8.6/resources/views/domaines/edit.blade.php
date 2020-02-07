@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit domaine {{$domaines->nom_domaine}}</div>

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


                <form action="{{route('domaine.update', ['id' => $domaines->id])}}" method="POST">          <!--/post/store-->
                {{csrf_field()}}


                    <div class="form-group">
                        <label for="nom_domaine">nom_domaine</label>
                        <input type="text" class="form-control" name="nom_domaine" placeholder="Enter nom_domaine" value="{{$domaines->nom_domaine}}" />
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
