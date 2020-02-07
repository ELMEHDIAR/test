<div class="form-group">
    <label for="id_filiere_fk">Filière</label>
    <select class="form-control" id="id_filiere_fk" name="id_filiere_fk">
        <option value="------"> ------ </option>
        @foreach ($fillieres as $filliere)
        <option value="{{$filliere->id}}">FILIÈRE {{$filliere->nom_filiere}}</option>
        @endforeach
    </select>
</div>
