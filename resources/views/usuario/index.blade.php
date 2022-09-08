@extends ('layouts.plantillaBase')

@section('contenido')

<h1 class="text-center">Usuarios</h1>
    <a href="usuarios/create" class="btn btn-primary mb-2">Crear</a>
        <table id="table" class="table table-dark table-striped mt-4">
        <thead class="bg-primary text-white">
        <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>C.I.</th>
                <th>Celular</th>
                <th>usuario</th>
                <th>contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellidoPaterno}}</td>
                <td>{{$usuario->apellidoMaterno}}</td>
                <td>{{$usuario->carnet}}</td>
                <td>{{$usuario->celular}}</td>
                <td>{{$usuario->usuario}}</td>
                <td>{{$usuario->password}}</td>
                <td>
                <form action="{{ route ('usuarios.destroy',$usuarios->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/usuarios/{{$usuarios->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

@endsection

