@extends('layout')
@section('contenido')

<div class="row" >
    <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start" >
            <h3  style="margin:5px">Articulos</h3>
    </div>

    <div class="col-xs-12 col-sm-3 col-lg-3 offset-6 justify-content-start" >
            <a class="btn btn-primary m-1"  href="#" data-toggle="modal"
            data-target="#modalcreateclient" role="button"
            id="modalCreateClient">Nuevo Articulo</a>
    </div>

</div>

@if (count($articulos)==0 || is_null($articulos))
<hr>
    <h3>No hay Registros</h3>
    @else
    <hr>
    <div class="row justify-content-center text-left ">
    @foreach ($articulos as $articulo)
        <div class="card" style="width: 18rem; margin:5px">
            <img src="{{$articulo->img_src}}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p class="card-text">{{$articulo->nombre}}</p>
                    </div>
                    <div class="col">
                        <a href="#" class="btn btn-primary align-content-end">Ver</a>
                     </div>

                </div>
            </div>
        </div>
    @endforeach
    </div>
@endif
@stop

