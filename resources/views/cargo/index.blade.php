@extends ('layouts.plantillaBase')

@section('contenido')
    <h1 class="text-center">Cargos Distrito 1</h1>
    <a href="cargos/create" class="btn btn-primary mb-2">Crear</a>
        <table id="table" class="table table-white table-striped mt-4">
        <thead class="bg-primary text-black">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cargos as $cargo)
            <tr>
                <td>{{$cargo->id}}</td>
                <td>{{$cargo->nombre}}</td>
                <td>
                <form action="{{ route ('cargos.destroy',$cargo->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/cargos/{{$cargo->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
@stop











