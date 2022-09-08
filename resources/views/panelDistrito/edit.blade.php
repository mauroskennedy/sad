@extends ('layouts.plantillaBase')
    
@section('content')
<h1 class="text-center">{{$urbanizacion->distritos->nombre}} Mesa Directiva {{$urbanizacion->nombre}}</h1>
<a href="/panelDistrito" class="btn btn-primary mb-2">Volver</a>
<table id="table" class="table table-dark table-striped mt-4">
        <thead class="text-white">
        <tr>
                <th>Id</th>
                <th>Cargo</th>
                <th>Nombre</th>
                <th>Carnet</th>
                <th>Celular</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cargos as $cargo)
            <tr>
                 @if($tamaño>0)
                <td>{{$representantes[$cargo->id-1]->id}}</td>
                @else
                <td></td>
                @endif    

                <td>{{$cargo->nombre}}</td>                
                @if($tamaño>0)
                <td>{{$representantes[$cargo->id-1]->nombre}}</td>
                @else
                <td></td>
                @endif    
                @if($tamaño>0)
                <td>{{$representantes[$cargo->id-1]->carnet}}</td>
                @else
                <td></td>
                @endif
                @if($tamaño>0)
                <td>{{$representantes[$cargo->id-1]->celular}}</td>
                @else
                <td></td>
                @endif
            </tr>
            @endforeach
        </tbody>
</table>

<h3 class="text-blue mt-5">Editar Mesa Directiva</h3>
<div class="container">

<form action="/panelDistrito/{{$urbanizacion->id}}" method="POST">
    @csrf
    @method('PUT')
       <!-- componente distrito -->
      <!-- componente urbanizacion -->
  <div class="row">
    <div class="col-12 col-lg-12 col-xl-2 mb-3" >
    <label tabindex="1" for="">Distrito</label>
    </div>
    
    <div class="col-12 col-lg-12 col-xl-3 mb-3">
        <input class="form-control" type="text" placeholder="{{$urbanizacion->distritos->nombre}}" aria-label="Disabled input example" disabled>
    </div>


    <div class="col-12 col-lg-12 col-xl-2 mb-3">
        <label tabindex="1" for="">Urbanizacion</label>
    </div>
 
    <div class="col-12 col-lg-12 col-xl-4 mb-3">
    <input class="form-control" type="text" placeholder="{{$urbanizacion->nombre}}" aria-label="Disabled input example" disabled>
  </div>
<!-- componente cargo -->

  @foreach($cargos as $cargo)

  <div class="card mb-3" >
  <div class="card-header h4">{{$cargo->nombre}}:</div>
  <div class="card-body text-dark">
  <div class="row">
        <div class="col-12 col-lg-12 col-xl-5  mb-3" >
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input id="{{$cargo->nombre}}" name="si{{$cargo->id}}" type="text" class="form-control" tabindex="1" value="{{$representantes[$cargo->id-1]->nombre}}">
        </div>

        <div class="col-12 col-lg-12 col-xl-2  mb-3" >
        <label for="exampleInputEmail1" class="form-label">Carnet</label>
        <input id="{{$cargo->celular}}" name="sisi{{$cargo->id}}" type="text" class="form-control" tabindex="1"  value="{{$representantes[$cargo->id-1]->carnet}}">
        </div>
        <div class="col-12 col-lg-12 col-xl-2  mb-3" >
        <label for="exampleInputEmail1" class="form-label">Celular</label>
        <input id="{{$cargo->id}}" name="{{$cargo->id}}" type="text" class="form-control" tabindex="1"  value="{{$representantes[$cargo->id-1]->celular}}">
        </div>
  </div>
  </div>
</div>

  @endforeach

  <div class="row">
        <div class="col-6 col-sm-6 col-lg-2" >
        <a href="/panelDistrito" class="btn btn-secondary">Cancelar</a>
        </div>
        <div class="col-6 col-sm-6 col-lg-2" >
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
  </div>

</form>
</div>

@endsection

@section('jss')

@endsection  


