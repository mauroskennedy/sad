@extends ('layouts.plantillaBaseDespacho')

@section('contenido')

    <h1 class="text-center">Unidades Educativas Distrito Municipal {{$distritoId}}</h1>
    <h2 class="text-center">Ciudad de El Alto</h2>


<a href="/panelsDespacho" class="btn btn-primary mb-2">Volver</a>
<table id="table" class="table table-Light table-striped mt-4">
        <thead class="text-black fs-4">
        <tr>
                <th>Nombre</th>
                <th>Turno</th>
                <th>Distrito</th>

            </tr>
        </thead>
        <tbody class="fs-5">
            @foreach($unidades as $unidad)


            @if($unidad->id_distrito == $distritoId)
            <tr>

                <td>{{$unidad->nombre}}</td>
                <td>{{$unidad->turno}}</td>
                <td>{{$unidad->id_distrito}}</td>

            </tr>
            @endif
            @endforeach


        </tbody>
        </table>
@endsection



