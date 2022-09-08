@extends ('layouts.plantillaBase')

@section('contenido')

<h1 class="text-center">Urbanizaciones</h1>
    <a href="urbanizaciones/create" class="btn btn-primary mb-2">Crear</a>
        <table id="table" class="table table-dark table-striped mt-4">
        <thead class="bg-primary text-white">
        <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Distrito</th>
{{--                <th>Acciones</th>--}}
            </tr>
        </thead>
        <tbody>
            @foreach($urbanizaciones as $urbanizacion)
            <tr>
                <td>{{$urbanizacion->id}}</td>
                <td>{{$urbanizacion->nombre}}</td>
                <td>{{$urbanizacion->distritos->nombre}}</td>
                <td>
                {{--<form action="{{ route ('urbanizaciones.destroy',$urbanizacion->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/urbanizaciones/{{$urbanizacion->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>--}}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

@endsection

