@extends('layouts.app')

@section('content')
@if ($usuario[0]->rol == '')
<div class="container">
  <div class="row">
      <div class="col">
          <p class="alert alert-warning" role="alert">Tu registro esta siendo verificado por un ADMINISTRADOR, cuando sea confirmado podras empezar a usar nuestros servicios!</p>
      </div>
  </div>
</div>
@else
<div class="container" style="background-color: rgba(0, 255, 255, 0.37)">
  <div class="row"><p></p></div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="<?= asset('img/trabajadores.jpg'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Plantilla de trabajadores</h5>
                  <p class="card-text">Aqui puedes consultar una tabla con todos los trabajadores</p>
                  <a href="{{ url('trabajadores')}}" class="btn btn-primary ">Continuar</a>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="<?= asset('img/incidencias.jpg'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Partes de servicio</h5>
                  <p class="card-text">Aqui puedes consultar tus partes de servicio</p>
                  <a href="{{url('servicios')}}" class="btn btn-primary">Continuar</a>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="<?= asset('img/mareas.jpg'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Tabla de mareas</h5>
                  <p class="card-text">Aqui puedes consultar la tabla de mareas</p>
                  <a href="{{url('web')}}" class="btn btn-primary">Continuar</a>
                </div>
              </div>
        </div>
    </div>
    <p></p>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="<?= asset('img/productos-limpieza.jpg'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Partes de limpieza</h5>
                  <p class="card-text">Una tabla que contiene los partes de limpieza</p>
                  <a href="{{url('web')}}" class="btn btn-primary">Continuar</a>
                </div>
              </div>
        </div>
    </div>
    <div class="row"><p></p></div>
</div>
@endif
@endsection
