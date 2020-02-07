@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Universites</div>

                <div class="card-body">

                @if($universites->count() >0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($universites as $universite)
                        <tr>
                            <th>{{$universite->nom_universite}}</th>
                            <td>
                                <a href="{{route('universite.edit',['id' => $universite->id])}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('universite.delete',['id' => $universite->id])}}" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <p class="text-center">No universites</p>
                        @endif
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
