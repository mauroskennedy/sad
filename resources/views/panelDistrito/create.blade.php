@extends ('layouts.plantillaBase')

@section('contenido')  
  <!-- cambio por distrito -->
<h1 class="text-center">Crear Mesa Directiva Distrito Municipal 1{{$urbanizacon}}</h1>
<!-- cambio por distrito -->
<div class="container">
<form  action="/panelDistrito" method="POST">
@csrf
       <!-- componente distrito -->
      <!-- componente urbanizacion -->
  <div class="row">
    <div class="col-12 col-lg-12 col-xl-2 mb-3 text-center" >
    <label tabindex="1" for="" class="h4">Distrito</label>
    </div>

     <!-- cambio por distrito -->
    <div class="col-12 col-lg-12 col-xl-3 mb-3 ">
    <input id="distrito" class="form-control" type="text" name="{{(($distritos[0]){'id'})}}" value="{{(($distritos[0]){'nombre'})}}" aria-label="Disabled input example" disabled>
    </div>
    <!-- cambio por distrito -->

    <div class="col-12 col-lg-12 col-xl-2 mb-3 text-center">
        <label tabindex="1" for="" class="h4">Urbanizacion</label>
    </div>
 
    <div class="col-12 col-lg-12 col-xl-4 mb-3">
    <select  id="id_urbanizacion" name="id_urbanizacion" class="form-select" tabindex="1">
                    <option  value="">-Selecciona-</option>
    </select>
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

  <div class="row">
        <div class="col-12 col-sm-12 col-lg-3 mb-3" >
        <a href="/panelDistrito" class="btn btn-secondary" style="width: 100%;">Cancelar</a>
        </div>
        <div class="col-12 col-sm-12 col-lg-3 mb-3">
        <button type="submit" class="btn btn-primary" style="width: 100%;">Guardar</button>
        </div>
  </div>

</form>
</div>

@endsection

@section('js')

 <!-- cambio por distrito -->
    <script type="text/javascript">
        window.onload = function () { 
          
          var idDistrtio = '1';      
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

 <!-- cambio por distrito -->
@stop   


