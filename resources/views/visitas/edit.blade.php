@extends('layout')
@section('contenido')
<div class="form-group">
	<h1>Visita a Cliente:</h1>
    <form action="{{ route('visita.update',$visita->id) }}" method="post" >
    	{!!method_field('PUT')!!}
        {!! csrf_field() !!}
        <div >
            <div class="row">
                <div class="col-8">
                    <input type="hidden" name="cliente_id" value="{{ $visita->cliente->id }}">
                    <label for="lblcliente">Cliente:</label>{{ $visita->cliente->nombre }}
                </div>
                <div class="col-4  checkbox form-inline" >
                    <label for="lblestado">Ejecutada:</label>
                     <input type="checkbox" name="estado" value="{{ $visita->estado}}" {{ $visita->estado ? 'checked':'' }}>
                </div>
                </div>
                <div class="row">    
                    <div class="col-12">
                        <label for="lblcliente">Direccion:</label>{{ $visita->cliente->direccion }}
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-6 form-inline">
                        <label for="lblcliente">Proxima Visita:</label>
                        <input id="proxVisita" name="proxVisita" type="date" class="form-control" value="{{ $visita->proxVisita }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="lblcliente">Comentario:</label>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control"  name="comentario" rows="3" id="comentario" >{{ $visita->comentario }}</textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4 d-flex justify-content-start">
                            <a class="btn btn-primary align" style="margin:5px"  href="{{route('visita.index')}}" role="button">Volver</a>
                    </div>
                    <div class="offset-4 col-4 d-flex justify-content-end">
                            <button class="btn btn-primary align" style="margin:5px" type="submit">Actualizar</button>
                    </div>
                </div>   
    	   </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    var checkbox = document.querySelector("input[name=estado]");
    checkbox.addEventListener( 'change', function() {
        if(this.checked) {
            checkbox.value=1;
        } else {
            checkbox.value=0;
        }
    });
</script>
@stop