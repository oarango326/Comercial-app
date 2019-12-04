@extends('layout')
@section('contenido')
<div class="form-group align-center">
        <h1>{{$articulo->nombre}}</h1>
            <div >
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <img src="{{$articulo->img_src}}" alt="" width="300" height="300">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <label for="lblcliente">Codigo</label>
                            <input type="text" class="form-control" name="codigo" value="{{$articulo->codigo}}" disabled>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <label for="lblcif">EAN</label>
                            <input type="text" class="form-control" name="ean" value="{{$articulo->ean}}" disabled>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <label for="lblcif">Precio</label>
                            <input type="text" class="form-control" name="precio" value="{{str_replace(".",",",$articulo->precio)}}€" disabled>
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                            <a class="btn btn-primary align" style="margin:5px"  href="{{route('articulos.index')}}" role="button">Volver</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                    <a class="btn btn-primary align" style="margin:5px"  href="{{route('articulos.edit',$articulo->id)}}" role="button">Modificar</a>
                    </div>
                </div>
            </div>
    </div>
    @stop
