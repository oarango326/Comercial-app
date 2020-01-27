@extends('layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start">
            <h3 style="margin:5px">Articulos</h3>
        </div>

        <div class="col-xs-12 col-sm-3 col-lg-3 offset-6 justify-content-start">
            <a class="btn btn-primary m-1" href="{{route('articulos.create')}}" role="button"
                id="btnCreateArticulo">Nuevo Articulo</a>
        </div>

    </div>

    @if (count($articulos)==0 || is_null($articulos))
    <hr>
    <h3>No hay Registros</h3>
    @else
    <div class="row justify-content-center ">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width:20%">Codigo</th>
                    <th style="width:20%">Nombre</th>
                    <th style="width:30%">EAN</th>
                    <th style="width:30%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $articulo)
                <tr>
                    <td>{{$articulo->codigo}}</td>
                    <td>{{$articulo->nombre}}</td>
                    <td>{{$articulo->ean}}</td>
                    <td class="form-inline">
                        <a href="{{route('articulos.show',$articulo->id )}}"
                            class="btn btn-primary btn-sm m-1 align-content-end">Ver</a>
                        <form action="{{route('articulos.update', $articulo->id )}}" method="post">
                            {!!method_field('PUT')!!}
                            {!! csrf_field() !!}
                            @if($articulo->activo=='1')
                            <input type="hidden" name="activar" value="0">
                            <button type="submit"
                                class="btn btn-info btn-sm m-1 align-content-end activa">Desactivar</button>
                            @else
                            <input type="hidden" name="activar" value="1">
                            <button type="submit"
                                class="btn btn-success btn-sm m-1 align-content-end activa">Activar</button>
                            @endif
                        </form>

                        {{-- <form action="{{route('articulos.destroy', $articulo->id )}}" method="post">
                        {!!method_field('DELETE')!!}
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-danger btn-sm m-1 align-content-end">Borrar</button>
                        </form> --}}
                        <button type="button" class="btn btn-danger btn-sm m-1 btnDelete" data-toggle="modal"
                            data-target="#modalDelete" data-id="{{$articulo->id}}"
                            data-nombre="{{$articulo->codigo}} {{$articulo->nombre}}">
                            Eliminar
                        </button>
                    </td>
                    {{-- <div class="card" style="width: 18rem; margin:5px">
                        <img src="{{$articulo->img_src}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-text">{{$articulo->nombre}}</p>
                            </div>
                            <div class="col">
                                <a href="{{route('articulos.show',$articulo->id )}}"
                                    class="btn btn-primary align-content-end">Ver</a>
                            </div>
                        </div>
                    </div>
    </div> --}}
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endif
@if(session()->has('info'))
<script>
    alert('{{session('info')}}')
</script>
@endif
@include('articulos.ArticulosModal')
</div>
@stop
