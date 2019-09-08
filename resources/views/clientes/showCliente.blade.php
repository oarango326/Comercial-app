@extends('layout')
@section('contenido')
<div class="form-group align-center">
        <h1>Cliente</h1>
            <div >
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <label for="lblcliente">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <label for="lblcif">CIF</label>
                        <input type="text" class="form-control" name="cif" value="{{$cliente->cif}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lbldireccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="{{$cliente->direccion}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <label for="lbldireccion">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="{{$cliente->ciudad}}" disabled>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <label for="lbldireccion">Provincia</label>
                        <input type="text" class="form-control" name="estado" value="{{$cliente->estado}}" disabled>
                    </div>
                    <div class="col-xs-2 col-sm-4 col-md-4">
                        <label for="lblcp">Codigo Postal</label>
                        <input type="text" class="form-control" maxlength="5" size="5" name="codigoPostal" value="{{$cliente->cp}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                         <label for="lbltelefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                         <label for="lblemail">Email</label>
                        <input type="email" class="form-control" name="email" value="" disabled>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                            <a class="btn btn-primary align" style="margin:5px"  href="{{route('clientes.index')}}" role="button">Volver</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                            <a class="btn btn-primary align" style="margin:5px"  href="{{route('clientes.edit', $cliente->id)}}" role="button">Modificar</a>
                    </div>
                </div>
            </div>
    </div>
    @stop
