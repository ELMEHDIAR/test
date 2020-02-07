@extends("layouts.app")

@section("content")

<div class="container">
    <div style="margin-bottom: 400px">

        <table class="table">
            <thead>
                <th>CIN</th>
                <th>DATE NAISSANCE</th>
                <th>TYPE BOURSE</th>
                <th>ETABLISSEMENT</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                @foreach( $inscriptions as $inscription )
                <tr>
                    <td>{{ $inscription->cin }}</td>
                    <td>{{ $inscription->date_naissance }}</td>
                    <td>{{ $inscription->type_bourse }}</td>
                    <td>{{ $inscription->etablissement }}</td>
                    <td><a class="btn btn-primary" href="{{ url('/liste-inscriptions/detail', $inscription->id) }}"> Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $inscriptions->links() }}   <!-- // pagination -->

    </div>
</div>

@endsection
