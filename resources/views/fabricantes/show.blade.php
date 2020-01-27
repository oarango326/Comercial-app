@extends('layout')
@section('contenido')
<div class="container">
    <div>
        <h3>Fabricante # {{$fabricante->id}}</h3>
    </div>
    <div>
        @if(session()->has('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6">
                <label for="lbl">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" size="50"
                    value="{{$fabricante->nombre}}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-start">
                <a href="{{route('fabricantes.index')}}" class="btn btn-secondary m-5">Volver</a>
                {{-- <a class="btn btn-primary"   href="{{route('fabricantes.index')}}" role="button">Cancelar</a> --}}
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="{{route('fabricantes.edit',$fabricante->id)}}" class="btn btn-primary m-5">Modificar</a>
            </div>
        </div>
    </div>
</div>
@stop
