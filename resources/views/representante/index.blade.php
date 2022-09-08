@extends ('layouts.plantillaBaseDespacho')

@section('contenido')
<h1 class="text-center">Representantes 14 Distritos</h1>
    {{--<a href="representantes/create" class="btn btn-primary mb-2">Crear</a>--}}
        <table id="table" class="table table-ligth table-striped mt-4">
        <thead class="text-black fs-4">
        <tr>

            <th>Distrito</th>
            <th>Urbanizacion</th>
            <th>Cargo</th>
                <th>Nombre</th>
                <th>Carnet</th>
                <th>Celular</th>



{{--                <th>Acciones</th>--}}
            </tr>
        </thead>
        <tbody class="fs-5">
            @foreach($representantes as $representante)
            <tr>

                <td>{{$representante->urbanizaciones->distritos->abreviacion}}</td>
                <td>{{$representante->urbanizaciones->nombre}}</td>
                <td>{{$representante->cargos->nombre}}</td>

                <td>{{$representante->nombre}}</td>


                <td>{{$representante->carnet}}</td>
                <td>{{$representante->celular}}</td>



               {{-- <td>
                <form action="{{ route ('representantes.destroy',$representante->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/representantes/{{$representante->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                </td>--}}
            </tr>
            @endforeach
        </tbody>
        </table>
@endsection


