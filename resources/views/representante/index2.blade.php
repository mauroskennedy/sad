@extends ('layouts.plantillaBaseDespacho')

@section('contenido')
<h1 class="text-center">Representantes Distritos Municipales</h1>
<h2 class="text-center">Ciudad de El Alto</2>
  {{--  <a href="representantes/create" class="btn btn-primary mb-2">Crear</a>--}}
        <table id="table" class="table table-light table-striped mt-4">
        <thead class="text-black">
        <tr>

            <th>Distrito</th>
            <th>Urbanizacion</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Carnet</th>
                <th>Celular</th>



            </tr>
        </thead>
        <tbody>
            @foreach($representantes as $representante)
            <tr>
                <td>{{$representante->urbanizaciones->distritos->abreviacion}}</td>
                <td>{{$representante->urbanizaciones->nombre}}</td>
                <td>{{$representante->nombre}}</td>
                <td>{{$representante->cargos->nombre}}</td>
                <td>{{$representante->carnet}}</td>
                <td>{{$representante->celular}}</td>



            </tr>
            @endforeach
        </tbody>
        </table>
@endsection


