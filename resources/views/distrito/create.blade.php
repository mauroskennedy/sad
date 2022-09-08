@extends ('layouts.plantillaBase')

@section('contenido')
<h1 class="text-center">Crear Distrito</h1>
    <form action="/distritos" method="POST">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Abreviacion</label>
            <input id="abreviacion" name="abreviacion" type="text" class="form-control" tabindex="1">
        </div>
        <a href="/distritos" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
