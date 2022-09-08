@extends ('layouts.plantillaBaseDespacho')

@section('contenido')
<h1 class="text-center">Ciudad de El Alto</h1>
<h2 class="text-center">14 Distritos Municipales</h2>
<h6 class="text-end">actulizado 15/06/2022</h6>
    <!-- <a href="mesadirectivas/create" class="btn btn-primary mb-2">Crear</a> -->
        <table id="table" class="table table-Light table-striped mt-4">
        <thead class="text-black fs-4">
        <tr>
            <th>Nº</th>
                <th>Distrito</th>
            <th>Fundacion</th>
            <th>Sub Alcalde</th>
            <th>Control Social</th>
            <th>Secretario Organizacion</th>

            <th>Urbanizaciones</th>
            <th>Presidentes</th>
              {{--  <th>Infraestuctura Educativas</th>
            <th>Centros de Salud</th>
            <th>Canchas Deportivas</th>


--}}
            </tr>
        </thead>
        <tbody class="fs-5">
            @foreach($distritos as $distrito)
            <tr>
                <td id = "distrito">{{$distrito->id}}</td>
                <td id = "distrito">{{$distrito->abreviacion}}</td>
                <td id = "distrito">{{$distrito->fundacion}}</td>



                <td id = "distrito">{{$distrito->subAlcalde}}</td>
                <td id = "distrito">{{$distrito->ControlSocial}}</td>
                <td id = "distrito">{{$distrito->SecretarioOrganizacion}}</td>

                <td id="cantidadUrbanizacione">
                    <div class="d-flex justify-content-between">
                        <div class="ml-5 fw-bold">{{$urbanizacionesList[$distrito->id]}}</div>
                    </div>

                </td>
                <td class="text-center fw-bold">
                <a href="/mesadirectivasDistritos3/{{$distrito->id}}/urbanizacionByDistrito" class="btn btn-primary mr-5 ">Ver</a>
                </td>

                {{--<td  id="cantidadInfraestructura">
                    <div class="d-flex justify-content-between">
                        <div class="ml-5" >{{$infraestructuraList[$distrito->id]}}</div>
                        <a href="/mesadirectivasDistritos4/{{$distrito->id}}/urbanizacionByDistrito" class="btn btn-danger mr-5">Ver</a>
                    </div>

                </td>

                <td id="">
                    <div class="d-flex justify-content-between">
                        <div class="ml-5">0</div>
                        <a href="/mesadirectivasDistritos3/{{$distrito->id}}/urbanizacionByDistrito" class="btn btn-secondary mr-5">Ver</a>
                    </div>

                </td>

                <td id="">
                    <div class="d-flex justify-content-between">
                        <div class="ml-5">0</div>
                        <a href="/mesadirectivasDistritos3/{{$distrito->id}}/urbanizacionByDistrito" class="btn btn-dark mr-5">Ver</a>
                    </div>

                </td>--}}


            </tr>
            @endforeach
        </tbody>
        </table>
@endsection




