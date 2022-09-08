@extends ('layouts.plantillaBase')

@section('contenido')
    <h1 class="text-center">Crear Urbanizacion</h1>
    <form action="/urbanizacionesPanel" method="POST">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Distrito</label>
            
            <select  id="id_distrito" name="id_distrito" type="text" class="form-control" tabindex="1" disabled>
            <option  value="1">Distrito Municipal 1</option>
            </select>
        </div>
        <a href="/urbanizacionesPanel" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
