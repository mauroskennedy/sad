@extends ('layouts.plantillaBase')

@section('contenido')

    <h1 class="text-center">Urbanizaciones Distrito {{$distritoId}}</h1>



<a href="/mesadirectivas" class="btn btn-primary mb-2">Volver</a>
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

          <tr>
              <td>{{$urbanizacionByDistrito->id}}</td>
              <td>{{$urbanizacionByDistrito->distritos->abreviacion}}</td>
              <td>{{$urbanizacionByDistrito->nombre}}</td>
              <td>


                  <a href="/mesadirectivasDistritos2/{{$urbanizacionByDistrito->id}}/mesaDirectivaByUrbanizacion" class="btn btn-primary">Registrar</a>

                  <a href="/mesadirectivas/{{$urbanizacionByDistrito->id}}/edit"  class="btn btn-danger">Editar</a>
          </tr>


          @endforeach
        </tbody>
        </table>
@stop

