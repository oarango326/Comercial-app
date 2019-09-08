@extends('layout')
@section('contenido')
<div class="form-group col-md-12 align-center">
    <h1>Nuevo Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
            {{ csrf_field() }}
            <div>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <label for="lblcliente">Nombre:</label>
                        <input type="text" class="form-control" name="Nombre" value="{{old('Nombre')}}">
                        <span class="fieldleft">{{$errors->first('Nombre')}}</span>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <label for="lblcif">CIF</label>
                        <input type="text" class="form-control" name="Cif" value="{{old('Cif')}}">
                        <span class="fieldleft">{{$errors->first('Cif')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="lbldireccion">Direccion</label>
                        <input type="text" class="form-control" name="Direccion" value="{{old('Direccion')}}">
                        <span class="fieldleft">{{$errors->first('Direccion')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <label for="lbldireccion">Ciudad</label>
                        <input type="text" class="form-control" name="Ciudad" value="{{old('Ciudad')}}">
                        <span class="fieldleft">{{$errors->first('Ciudad')}}</span>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <label for="lbldireccion">Provincia</label>
                        <input type="text" class="form-control" name="Estado"
                         value="{{old('Estado')}}">
                        <span class="fieldleft">{{$errors->first('Estado')}}</span>
                    </div>
                    <div class="col-xs-2 col-sm-4 col-md-4">
                        <label for="lblcp">Codigo Postal</label>
                        <input type="text" class="form-control" maxlength="5" size="5" name="CodigoPostal"
                        value="{{old('CodigoPostal')}}">
                        <span class="fieldleft">{{$errors->first('CodigoPostal')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                         <label for="lbltelefono">Telefono</label>
                        <input type="text" class="form-control" name="Telefono" value="{{old('Telefono')}}">
                        <span class="fieldleft">{{$errors->first('Telefono')}}</span>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                         <label for="lblemail">Email</label>
                        <input type="email" class="form-control" name="Email" value="{{ old('email') }}" >

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                            <a class="btn btn-primary align" style="margin:5px"  href="{{route('clientes.index')}}" role="button">Volver</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="margin:5px">Guardar</button>
                        <button type="reset" class="btn btn-secondary" style="margin:5px">Cancelar</button>
                    </div>

                </div>

            </div>
        </form>
    </div>
@stop
