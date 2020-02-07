@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit universite {{$universites->nom_universite}}</div>

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


                <form action="{{route('universite.update', ['id' => $universites->id])}}" method="POST">          <!--/post/store-->
                {{csrf_field()}}


                    <div class="form-group">
                        <label for="nom_universite">nom_universite</label>
                        <input type="text" class="form-control" name="nom_universite" placeholder="Enter nom_universite" value="{{$universites->nom_universite}}" />
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
