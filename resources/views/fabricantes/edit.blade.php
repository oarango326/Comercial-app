@extends('layout')
@section('contenido')
<div class="container">
    <div>
        <h3>Fabricante # {{$fabricante->id}}</h3>
    </div>
    <div>
        <form action="{{route('fabricantes.update',$fabricante->id)}}" method="POST">
            {!!method_field('PUT')!!}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6">
                    <label for="lbl">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" size="50"
                        value="{{$fabricante->nombre}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <a href="{{route('fabricantes.show',$fabricante->id)}}" class="btn btn-primary m-5">Cancelar</a>
                    {{-- <a class="btn btn-primary"   href="{{route('fabricantes.index')}}" role="button">Cancelar</a>
                    --}}
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success m-5">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
