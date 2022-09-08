@extends ('layouts.plantillaBaseDespacho')

@section('contenido')
    <h1 class="text-center">Crear Urbanizacion</h1>
    <form action="/urbanizaciones" method="POST">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Id distrito</label>
            <select  id="id_distrito" name="id_distrito" type="text" class="form-control" tabindex="1">
            <option  value="">-Selecciona-</option>
            @foreach($distritos as $distrito)
            <option  value="{{$distrito->id}}">{{$distrito->nombre}}</option>
            @endforeach
            </select>
        </div>
        <a href="/urbanizaciones" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
