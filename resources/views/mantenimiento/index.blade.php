@extends('layout')
@section('contenido')

<h1> Configuraciones</h1>
<div>
    <hr>
    <h4>Carga Masiva de Clientes</h4>
    <form method="POST" enctype="multipart/form-data" action="{{ route('config.Clientesimport') }}">
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


        <div class="offset-3 col-6 offset-3" align="center">
            <label>Seleccione archivo CSV :</label>
            <input class="form-control" type="file" name="file" required="true" />
            <br />
            <input type="submit" name="submit" value="Importar" class="btn btn-primary"  />
        </div>
    </form>
</div>
@stop
