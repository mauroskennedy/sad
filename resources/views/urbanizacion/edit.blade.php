@extends ('layouts.plantillaBase')

@section('contenido')
<h1 class="text-center">Editar Articulo</h1>
<form action="/urbanizaciones/{{$urbanizacion->id}}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$urbanizacion->nombre}}">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Id distrito</label>
        <select  id="id_distrito" name="id_distrito" type="text" class="form-control" tabindex="1" value="{{$urbanizacion->id_distrito}}">    
        <option  value="{{$urbanizacion->id_distrito}}">{{$urbanizacion->distritos->nombre}}</option>
        @foreach($distritos as $distrito)
         <option  value="{{$distrito->id}}">{{$distrito->nombre}}</option>
        @endforeach 
        </select>

    </div>
    <a href="/urbanizaciones" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection|
