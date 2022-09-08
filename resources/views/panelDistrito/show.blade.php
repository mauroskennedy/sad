@extends ('layouts.plantillaBase')

@section('contenido')

<h1 class="text-center">Urbanizaciones Distrito {{$distritoId}}</h1>
<a href="/panelDistrito" class="btn btn-primary mb-2">Volver</a>
        <table id="table" class="table table-dark table-striped mt-4">
        <thead class="bg-primary text-white">
        <tr>
                <th>Id</th>
                <th>Distrito</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($urbanizacionesByDistrito as $urbanizacionByDistrito)
            @if($urbanizacionByDistrito->id_distrito == $distritoId)
            <tr>
                <td id="si{{$urbanizacionByDistrito->id}}">{{$urbanizacionByDistrito->id}}</td>
                <td>{{$urbanizacionByDistrito->distritos->abreviacion}}</td>
                <td>{{$urbanizacionByDistrito->nombre}}</td>
                <td>
            
                    <a href="/panelDistrito/{{$urbanizacionByDistrito->id}}/edit" class="btn btn-info">Mesa Directiva</a>

                    <a href="../../panelDistrito/create" class="btn btn-info">crear Mesa Directiva</a>
               
                </td>
            </tr>
            @endif
            
            @endforeach
        </tbody>
        </table>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop
@section('js')
 
@stop  


