@extends('layout')
@section('contenido')
	<div class="container">
		<h3>Nueva Visita</h3>	
	</div>
	
	<div class="container d-flex justify-content-start" >
        <form method="post" action="{{ route('visita.clienteBuscar') }}" class="form-inline">
            {!! csrf_field() !!}
            <input class="form-control" type="text" name="buscar" placeholder="Buscar">
            <button class="btn btn-primary"  type="submit" >Buscar Cliente</button>
        </form>
    </div>
    <div class="container">
    @if (!isset($clientes))
            <h3>Seleccione un cliente</h3>
    @elseif (count($clientes)==0 || is_null($clientes))
        <h3>No hay clientes que coincidan con la busqueda</h3>
    @else
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:45%">Nombre</th>
                            <th style="width:15%">CIF / DNI / NIE</th>
                            <th style="width:10%">Telefono</th>
                            <th style="width:20%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>
                                {{ $cliente->nombre }}
                            </td>
                            <td>
                                {{ $cliente->cif }}
                            </td>
                            <td>
                                {{ $cliente->telefono }}
                            </td>
                            <td >
                                <a class="btn btn-primary btn-sm" href="{{route('visita.creavisita', $cliente->id)}}" role="button">Crear Visita</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        @endif
    </div>
@stop