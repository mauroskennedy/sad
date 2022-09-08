@extends ('layouts.plantillaBase')

@section('contenido')  
<h1 class="text-center">Crear Mesa Directiva</h1>
<div class="container">
<form  action="/mesadirectivas" method="POST">
@csrf
       <!-- componente distrito -->
      <!-- componente urbanizacion -->
  <div class="row">
    <div class="col-12 col-lg-12 col-xl-2 mb-3 text-center" >
    <label tabindex="1" for="" class="h4">Distrito</label>
    </div>
    
    <div class="col-12 col-lg-12 col-xl-3 mb-3 ">
    <label tabindex="1" for="" class="h4">{{$urbanizacion[0]->id_distrito}}</label>
    <!-- <select id="distrito" name="" value="a" onload="onloadDistrito(distrito.value);"  onchange="onSelectDistrito(distrito.value);" class="form-select" tabindex="1">
                    <option  value="">-Selecciona-</option>
                    @foreach($distritos as $distrito)
                    <option  value="{{$distrito->id}}">{{$distrito->nombre}}</option>
                    @endforeach 
        </select> -->
    </div>


    <div class="col-12 col-lg-12 col-xl-2 mb-3 text-center">
        <label tabindex="1" for="" class="h4">Urbanizacion</label>
    </div>
 
    <div class="col-12 col-lg-12 col-xl-4 mb-3">

    <input style="display: none;" value="{{$urbanizacion[0]->id}}" id="id_urbanizacion" name="id_urbanizacion" type="text" class="form-control" tabindex="1">
    
    <label tabindex="1" for="" class="h4">{{$urbanizacion[0]->nombre}}</label>

  
    
     
    <!-- <label name="id_urbanizacion" value="{{$urbanizacion[0]->id}}" tabindex="1" for="" class="h4">{{$urbanizacion[0]->nombre}}</label> -->

    <!-- <select  id="id_urbanizacion" name="id_urbanizacion" class="form-select" tabindex="1">
                    <option  value="">-Selecciona-</option>
    </select> -->
    </div>
  </div>

  <div class="row">
        <div class="col-12 col-sm-12 col-lg-3 mb-3" >
        <a href="/mesadirectivas" class="btn btn-secondary" style="width: 100%;">Cancelar</a>
        </div>
        <div class="col-12 col-sm-12 col-lg-3 mb-3">
        <button type="submit" class="btn btn-primary" style="width: 100%;">Guardar</button>
        </div>
  </div>
  
<!-- componente cargo -->

  @foreach($cargos as $cargo)

  <div class="card mb-3" >
  <div class="card-header h4">{{$cargo->nombre}}:</div>
  <div class="card-body text-dark">
  <div class="row">
        <div class="col-12 col-lg-12 col-xl-5  mb-3" >
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input value="" id="{{$cargo->nombre}}" name="si{{$cargo->id}}" type="text" class="form-control" tabindex="1">
        </div>

        <div class="col-12 col-lg-12 col-xl-2  mb-3" >
        <label for="exampleInputEmail1" class="form-label">Carnet</label>
        <input value="" id="{{$cargo->celular}}" name="sisi{{$cargo->id}}" type="text" class="form-control" tabindex="1">
        </div>
        <div class="col-12 col-lg-12 col-xl-2  mb-3" >
        <label for="exampleInputEmail1" class="form-label">Celular</label>
        <input value="" id="{{$cargo->id}}" name="{{$cargo->id}}" type="text" class="form-control" tabindex="1">
        </div>
  </div>
  </div>
</div>

  @endforeach

  

</form>
</div>

@endsection

@section('js')
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
@stop   


