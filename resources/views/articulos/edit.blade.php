@extends('layout')
@section('contenido')
<div class="form-group align-center">
    @if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <h1>Editar Articulo: {{$articulo->nombre}}</h1>
    <form action="{{route('articulos.update', $articulo->id)}}" method="post">
        {{ csrf_field() }}
        {!!method_field('PUT')!!}
        <div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <img src="{{$articulo->img_src}}" alt="" width="400" height="400">
                        </div>
                        <div class="row">
                            <input class="m-2" type="file" name="img_src" id="img_src">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lblnombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{$articulo->nombre }}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lblcliente">Codigo</label>
                        <input type="text" class="form-control" name="codigo" value="{{$articulo->codigo }}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lblcif">EAN</label>
                        <input type="text" class="form-control" name="ean" value="{{$articulo->ean }}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lblcif">Precio</label>
                        <input type="text" class="form-control" name="precio" value="{{$articulo->precio }}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lblcategoria">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="{{$articulo->categoria->id}}" selected>{{$articulo->categoria->nombre}}
                            </option>
                            @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" name="precio" value="{{$articulo->categoria->id }}">
                        --}}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lblfabricante">Fabricante</label>
                        <select name="fabricante_id" id="fabricante_id" class="form-control">
                            <option value="{{$articulo->fabricante->id}}" selected>{{$articulo->fabricante->nombre}}
                            </option>
                            @foreach ($fabricantes as $fabricante)
                            <option value="{{$fabricante->id}}">{{$fabricante->nombre}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" name="precio" value="{{$articulo->fabricante->id }}">
                        --}}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lblactivo">Estado</label>
                        <select name="activo" id="activo" class="form-control">
                            @if($articulo->activo=='1')
                            <option style="color:green" value="{{$articulo->activo}}" selected>Activo</option>
                            <option value="0" style="color:red">Inactivo</option>
                            @else
                            <option style="color:red" value="{{$articulo->activo}}" selected>Inactivo</option>
                            <option style="color:green" value="1">Activo</option>
                            @endif
                        </select>

                        {{-- <input type="text" class="form-control" name="precio" value="{{$articulo->activo }}"> --}}
                    </div>

                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <a class="btn btn-primary align" style="margin:5px"
                        href="{{route('articulos.show', $articulo->id )}}" role="button">Volver</a>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <input type="submit" class="btn btn-primary align" style="margin:5px" role="button"
                        value="Actualizar">
                </div>
            </div>
        </div>
    </form>
</div>
@stop
