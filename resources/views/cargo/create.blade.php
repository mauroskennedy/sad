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
    <h1 class="text-center">Crear Cargos</h1>
@stop

@section('content')
    <form action="/cargos" method="POST">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
        </div>
        <a href="/cargos" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop
@section('js')
@stop   








