@extends('layout')
@section('contenido')
<div class="form-group align-center container">
    <h1>{{$articulo->nombre}}</h1>
    <div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="{{$articulo->img_src}}" alt="" width="300" height="300">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="lblnombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{$articulo->nombre}}" disabled>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="lblcodigo">Codigo</label>
                    <input type="text" class="form-control" name="codigo" value="{{$articulo->codigo}}" disabled>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="lblena">EAN</label>
                    <input type="text" class="form-control" name="ean" value="{{$articulo->ean}}" disabled>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="lblprecio">Precio</label>
                    <input type="text" class="form-control" name="precio"
                        value="{{str_replace(".",",",$articulo->precio)}}€" disabled>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="lblcategoria">Categoria</label>
                    <input type="text" class="form-control" name="categoria" value="{{$articulo->categoria->nombre}}"
                        disabled>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="lblfabricante">Fabricante</label>
                    <input type="text" class="form-control" name="fabricante" value="{{$articulo->fabricante->nombre}}"
                        disabled>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="lblestado">Estado</label>
                    <input type="text" class="form-control" name="estado"
                        value="{{($articulo->activo)?"Activo":"Inactivo"}}" disabled>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-6 d-flex justify-content-start">
                <a class="btn btn-primary align" style="margin:5px" href="{{route('articulos.index')}}"
                    role="button">Volver</a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-primary align" style="margin:5px" href="{{route('articulos.edit',$articulo->id)}}"
                    role="button">Modificar</a>
            </div>
        </div>
    </div>
</div>
@stop
