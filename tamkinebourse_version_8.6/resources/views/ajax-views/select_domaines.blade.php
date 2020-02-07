<div class="form-group">
    <label for="id_domaine_fk">Domaine</label>
    <select class="form-control" id="id_domaine_fk" name="id_domaine_fk">
        <option value="---"> --- </option>
        @foreach ($domaines as $domaine)
        <option value="{{$domaine->id}}">DOMAINE {{$domaine->nom_domaine}}</option>
        @endforeach
    </select>
</div>
