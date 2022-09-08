@extends ('layouts.plantillaBase')

@section('contenido')
<h1 class="text-center">Editar Distrito</h1>
    <form action="/distritos/{{$distrito->id}}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$distrito->nombre}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Abreviacion</label>
            <input id="abreviacion" name="abreviacion" type="text" class="form-control" tabindex="1" value="{{$distrito->abreviacion}}">
        </div>
        <a href="/distritos" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection




