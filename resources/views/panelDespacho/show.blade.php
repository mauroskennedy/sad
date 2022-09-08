@extends ('layouts.plantillaBaseDespacho')

@section('contenido')

    <h1 class="text-center">Presidentes Urbanizaciones Distrito Municipal {{$distritoId}}</h1>
    <h2 class="text-center">Ciudad de El Alto</h2>

        <h6 class="text-end">Aniversario: {{$dis[0]->fundacion}}</h6>
        <h6 class="text-end">Sub Alcalde: {{$dis[0]->subAlcalde}}</h6>
        <h6 class="text-end">Control Social: {{$dis[0]->ControlSocial}}</h6>
        <h6 class="text-end">Secretario de Organizacion: {{$dis[0]->SecretarioOrganizacion}}</h6>

<a href="/panelsDespacho" class="btn btn-primary mb-2">Volver</a>
<table id="table" class="table table-Light table-striped mt-4">
        <thead class="text-black fs-4">
        <tr>
            <th>Distrito</th>
            <th>Urbanizacion</th>
                <th>Cargo</th>
            <th>Nombre</th>
                <th>Carnet</th>
                <th>Celular</th>



            </tr>
        </thead>
        <tbody class="fs-5">
            @foreach($representantes as $representante)


            @if($representante->urbanizaciones->distritos->id == $distritoId)
            <tr>
                <td>{{$representante->urbanizaciones->distritos->abreviacion}}</td>
                <td>{{$representante->urbanizaciones->nombre}}</td>
                <td>{{$representante->cargos->nombre}}</td>
                <td>{{$representante->nombre}}</td>
                <td>{{$representante->carnet}}</td>
                <td>{{$representante->celular}}</td>



            </tr>
            @endif

            @endforeach


        </tbody>
        </table>
@endsection



