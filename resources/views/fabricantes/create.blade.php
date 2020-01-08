@extends('layout')
@section('contenido')
<div>
    <h3>Nuevo Fabricante</h3>
</div>
<div>
    <form action="{{route('fabricantes.store')}}" method="POST" >
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6">
                <label for="lbl">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" size="50" required>
            </div>
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-start">
            <a href="{{route('fabricantes.index')}}" class="btn btn-primary m-5">Cancelar</a>
                {{-- <a class="btn btn-primary"   href="{{route('fabricantes.index')}}" role="button">Cancelar</a> --}}
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-success m-5">Guardar</button>
            </div>
        </div>
    </form>
</div>
@stop
