@extends ('layouts.plantillaBase')

@section('contenido')
<h1 class="text-center">Distritos</h1>
    <a href="distritos/create" class="btn btn-primary mb-2">Crear</a>
        <table id="table" class="table table-dark table-striped mt-4">
        <thead class="bg-primary text-white">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Abreviacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($distritos as $distrito)
            <tr>
                <td>{{$distrito->id}}</td>
                <td>{{$distrito->nombre}}</td>
                <td>{{$distrito->abreviacion}}</td>
                <td>
                <form action="{{ route ('distritos.destroy',$distrito->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/distritos/{{$distrito->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
@endsection


