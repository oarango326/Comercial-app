@extends('layout')
@section('contenido')



<div class="container">
    <h1> Configuraciones</h1>
    <hr>
    <h4>Carga Masiva de Registros</h4>
    <form method="POST" enctype="multipart/form-data" action="{{ route('config.tablesImport') }}">
        {!! csrf_field() !!}
        @if(session()->has('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif
        @if(session()->has('infowarning'))
        <div class="alert alert-warning" role="alert">
            {{session('infowarning')}}
        </div>
        @endif
        <div class="row offset-3 col-6 offset-3 form-inline " align="center">
            <label for="lbltabla" class="label label-default">Tabla</label>
            <select name="tabla" id="tabla" class="form-control">
                <option value="articulos">Articulos</option>
                <option value="clientes">Clientes</option>
            </select>
        </div>
        <div class="row offset-3 col-6 offset-3 form-inline " align="center">
            <label class="label label-default">Seleccione archivo CSV :</label>
            <input class="mr-4" type="file" name="file" required="true" />

            <br>
            <input type="submit" name="submit" value="Importar" class="btn btn-primary" />
            <span class="fieldleft">{{$errors->first('file')}}</span>
        </div>
    </form>
</div>

@stop
