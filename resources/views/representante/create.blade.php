
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/mesadirectivas">Mesa Directiva</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/distritos">Distritos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/urbanizaciones">Urbanizaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cargos">Cargos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/representantes">Representantes</a>
            </li>
            
        </ul>
        </div>
    </div>
    </nav>
    <h1 class="text-center">Crear Representante</h1>
    @stop

    @section('content')
    <form  action="/representantes" method="POST">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Carnet</label>
            <input id="carnet" name="carnet" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Celular</label>
            <input id="celular" name="celular" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Distrito</label>
            <select  id="distrito" name="" value="a" onload="onloadDistrito(distrito.value);"  onchange="onSelectDistrito(distrito.value);" class="form-control" tabindex="1">
            <option  value="">-Selecciona-</option>
            @foreach($distritos as $distrito)
            <option  value="{{$distrito->id}}">{{$distrito->nombre}}</option>
            @endforeach 
            </select>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Urbanizacion</label>
            <select  id="id_urbanizacion" name="id_urbanizacion" type="text" class="form-control" tabindex="1">
            <option  value="">-Selecciona-</option>
            </select>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cargo</label>
            <select  id="id_cargo" name="id_cargo" type="text" class="form-control" tabindex="1">
            <option  value="">-Selecciona-</option>
            @foreach($cargos as $cargo)
            <option  value="{{$cargo->id}}">{{$cargo->nombre}}</option>
            @endforeach 
            </select>
        </div>
        <a href="/representantes" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    @stop
    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @stop
    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>

        function onSelectDistrito($value){
            var idDistrtio = $value;  
            console.log(idDistrtio);    
            if(! idDistrtio){
                $('#id_urbanizacion').html('<option  value="">-Selecciona-</option>');
                return;
            }     
            $.get('/api/representantes/'+idDistrtio+'/distritos', function (data){
                console.log(data); 
               var html_select = '<option  value="">-Selecciona-</option>'; 
                for (var i=0; i<data.length; i++)
                  html_select += '<option  value="'+data[i].id+'">'+data[i].nombre+'</option>';
                $('#id_urbanizacion').html(html_select);
            });
        }

     
    </script>
    @stop   
