@extends ('layouts.plantillaBase')

@section('contenido')
    <h1 class="text-center">Crear Representante</h1>
    <form action="/representantes/{{$representante->id}}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$representante->nombre}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Carnet</label>
            <input id="carnet" name="carnet" type="text" class="form-control" tabindex="1"  value="{{$representante->carnet}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Celular</label>
            <input id="celular" name="celular" type="text" class="form-control" tabindex="1"  value="{{$representante->celular}}">
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Distrito</label>
            <select  id="distrito" onchange="onSelectDistrito(distrito.value);" name=""  class="form-control" tabindex="1" value="">
            <option  id="distritoinicio" value="">{{$representante->urbanizaciones->distritos->nombre}}</option>
            @foreach($distritos as $distrito)
            <option  value="{{$distrito->id}}">{{$distrito->nombre}}</option>
            @endforeach 
            </select>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Urbanizacion</label>
            <select  id="id_urbanizacion" name="id_urbanizacion" type="text" class="form-control" tabindex="1" value="{{$representante->id_urbanizacion}}">
            <option  value="{{$representante->id_urbanizacion}}">{{$representante->urbanizaciones->nombre}}</option>
            </select>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cargo</label>
            <select  id="id_cargo" name="id_cargo" type="text" class="form-control" tabindex="1" value="{{$representante->id_cargo}}">
            <option  value="{{$representante->id_cargo}}">{{$representante->cargos->nombre}}</option>
            @foreach($cargos as $cargo)
            <option  value="{{$cargo->id}}">{{$cargo->nombre}}</option>
            @endforeach 
            </select>
        </div>
        <a href="/representantes" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection



@section('jss')
    <script>
        function onSelectDistrito($value){
            var idDistrtio = $value;      
            if(! idDistrtio){
                $('#id_urbanizacion').html('<option  value="">-Selecciona-</option>');
                return;
            }     
            $.get('/api/representantes/'+idDistrtio+'/distritos', function (data){
               var html_select = '<option  value="">-Selecciona-</option>'; 
                for (var i=0; i<data.length; i++)
                  html_select += '<option  value="'+data[i].id+'">'+data[i].nombre+'</option>';
                $('#id_urbanizacion').html(html_select);
            });
        }
    </script>
@endsection