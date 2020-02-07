<div class="form-group">
    <label for="id_direction_fk">Direction Provinciale</label>
    <select class="form-control" id="id_direction_fk" name="id_direction_fk">
        <option value="---"> --- </option>
        @foreach ($directions as $dirpro)
        <option value="{{$dirpro->id}}">{{$dirpro->nom_direction}}</option>
        @endforeach
    </select>
</div>
