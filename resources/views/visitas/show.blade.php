@extends('layout')
@section('contenido')
<div class="form-group container">
	<h1>Visita a Cliente:</h1>
    <form action="#" >
        	<div>
            <div class="row">
                <div class="col-8 ">
                    <input type="hidden" name="cliente_id" value="{{ $visita->cliente->id }}">
                    <label for="lblcliente">Cliente:</label>{{ $visita->cliente->nombre }}
                </div>
                <div class="col-4 ">
                    <label for="lblestado">Estado:</label>
                    @if($visita->estado==0)
                        <label for="lblestado0">Pendiente</label>
                    @elseif($visita->estado==1)
                        <label for="lblestado1">Ejecutada</label>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <label for="lblcliente">Direccion:</label>{{ $visita->cliente->direccion }}
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-inline">
                    <label for="lblcliente">Proxima Visita:</label>
                    <input id="proxVisita" name="proxVisita" type="date" class="form-control" value="{{ $visita->proxVisita }}" disabled="true" >
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="lblcliente">Comentario:</label>
                </div>
                <div class="col-12">
                    <textarea class="form-control"  name="comentario" rows="3" id="comentario" disabled="true">{{ $visita->comentario }}</textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4 d-flex justify-content-start">
                        <a class="btn btn-primary align" style="margin:5px"  href="{{route('visita.index')}}" role="button">Volver</a>
                </div>
                <div class="offset-4 col-4 d-flex justify-content-end">
                        <a class="btn btn-primary align" style="margin:5px"  href="{{route('visita.edit',$visita->id)}}" role="button">Modificar</a>
                </div>
            </div>
    	</div>
    </form>
</div>
    @if(session()->has('info'))
        <script>
            alert('{{session('info')}}')
        </script>
    @endif
@stop
