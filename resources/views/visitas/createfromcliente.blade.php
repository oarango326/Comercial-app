@extends('layout')
@section('contenido')
<div class="form-group">
	<h1>Nueva Visita a Cliente:</h1>
    <form action="{{route('visita.store')}}" method="POST">
    	{{ csrf_field() }}
    	<div>
            <div class="row">
                <div class="col-12">
                    <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                    <label for="lblcliente">Cliente:</label>{{ $cliente->nombre }}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="lblcliente">Direccion:</label>{{ $cliente->direccion }}
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-inline">
                    <label for="lblcliente">Proxima Visita:</label>
                    <input id="proxVisita" name="proxVisita" type="date" class="form-control" value="{{old('proxVisita')}}">
                    <span class="fieldleft">{{$errors->first('proxVisita')}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="lblcliente">Comentario:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <textarea class="form-control"  name="comentario" rows="3"  value="{{old('comentario')}}"></textarea>
                    <span class="fieldleft">{{$errors->first('comentario')}}</span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                        <a class="btn btn-primary align" style="margin:5px"  href="{{route('visita.index')}}" role="button">Volver</a>
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
