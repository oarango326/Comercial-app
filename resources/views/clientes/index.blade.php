@extends('layout')
@section('contenido')
    <div class="row" >
        <div class="col-3 d-flex justify-content-start" >
                <h3  style="margin:5px">Clientes</h3>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-6 d-flex justify-content-start" >
            <form method="post" action="{{ route('clientes.textoBuscar') }}" class="form-inline">
                {!! csrf_field() !!}
                <input class="form-control" type="text" style="margin:5px" name="buscar" placeholder="Buscar">
                <button class="btn btn-primary"  type="submit" style="margin:5px">Buscar</button>
            </form>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3 d-flex justify-content-end" >
                <a class="btn btn-primary"  style="margin:5px" href="{{route('clientes.create')}}" role="button">Nuevo Cliente</a>
        </div>
    </div>
    <div>
        @if (count($clientes)==0 || is_null($clientes))
            <h3>No hay clientes Registrados</h3>
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
                                <a href="{{route('clientes.show', $cliente->id)}}">{{ $cliente->nombre }}</a>
                            </td>
                            <td class="d-xs-none">
                                {{ $cliente->cif }}
                            </td>
                            <td class="d-xs-none">
                                {{ $cliente->telefono }}
                            </td>
                            <td >
                                <a class="btn btn-primary btn-sm" href="{{route('clientes.edit', $cliente->id)}}" role="button">Modificar</a>
                                <form action="{{route('clientes.destroy', $cliente->id)}}" style="display:inline" method="POST">
                                    {!!method_field('DELETE')!!}
                                     {!! csrf_field() !!}
                                        <button class="btn btn-danger btn-sm" type="submit" >Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        @endif
        @if(session()->has('info'))
            <script>
                alert('{{session('info')}}')
            </script>
        @endif
    </div>
@stop


