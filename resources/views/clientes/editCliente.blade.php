@extends('layout')
@section('contenido')
<div class="form-group align-center">
    <h1>Actualizar Cliente</h1>
    @if(session()->has('info'))
        {{session('info')}}
        <div class="row">
                <div class="col-6 d-flex justify-content-start">
                        <a class="btn btn-primary align" style="margin:5px"  href="{{route('clientes.index')}}" role="button">Volver</a>
                </div>
        </div>
    @else
        <form action="{{route('clientes.update', $cliente->id)}}" method="POST">
            {!!method_field('PUT')!!}
            {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <label for="lblcliente">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" value="{{$cliente->nombre}}">
                        <span class="fieldleft">{{$errors->first('Nombre')}}</span>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <label for="lblcif">CIF</label>
                        <input type="text" class="form-control" name="Cif" value="{{$cliente->cif}}">
                        <span class="fieldleft">{{$errors->first('Cif')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lbldireccion">Direccion</label>
                        <input type="text" class="form-control" name="Direccion" value="{{$cliente->direccion}}">
                        <span class="fieldleft">{{ $errors->first('Direccion')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <label for="lbldireccion">Ciudad</label>
                        <input type="text" class="form-control" name="Ciudad" value="{{$cliente->ciudad}}">
                        <span class="fieldleft">{{ $errors->first('Ciudad')}}</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <label for="lbldireccion">Provincia</label>
                        <input type="text" class="form-control" name="Estado" value="{{$cliente->estado}}" >
                        <span class="fieldleft">{{ $errors->first('Estado')}}</span>
                    </div>
                    <div class="col-xs-2 col-sm-4 col-md-4">
                        <label for="lblcp">Codigo Postal</label>
                        <input type="text" class="form-control" maxlength="5" size="5" name="CodigoPostal" value="{{$cliente->cp}}">
                        <span class="fieldleft">{{$errors->first('CodigoPostal')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                         <label for="lbltelefono">Telefono</label>
                        <input type="text" class="form-control" name="Telefono" value="{{$cliente->telefono}}">
                        <span class="fieldleft">{{$errors->first('Telefono')}}</span>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                         <label for="lblemail">Email</label>
                        <input type="email" class="form-control" name="email" value="" >
                    </div>
                </div>
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start">
                                <a class="btn btn-primary align" style="margin:5px"  href="{{route('clientes.index')}}" role="button">Volver</a>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" style="margin:5px">Actualizar</button>
                            <a class="btn btn-secondary" style="margin:5px" href="{{route('clientes.index')}}" role="button">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
@stop
