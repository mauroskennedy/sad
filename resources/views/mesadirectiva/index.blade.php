@extends ('layouts.plantillaBase')

@section('contenido')
<h1 class="text-center">Distritos Municipales</h1>
    <a href="mesadirectivas/create" class="btn btn-primary mb-2">Crear</a>
        <table id="table" class="table table-dark table-striped mt-4">
        <thead class="text-white">
        <tr>
                <th>Id</th>
                <th>Distrito</th>
                <th>Urbanizacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($distritos as $distrito)
            <tr>
                <td>{{$distrito->id}}</td>
                <td id = "distrito">{{$distrito->nombre}}</td>
                <script>
                  
                </script>
                <td id="cantidadUrbanizacione">{{$urbanizacionesList[$distrito->id]}}</td>
                <td>
                    <a href="/mesadirectivasDistritos/{{$distrito->id}}/urbanizacionByDistrito" class="btn btn-primary">Detalle Distrito</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
@endsection




