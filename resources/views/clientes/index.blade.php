@extends('layout')
@section('contenido')
<div class="container">
    @if(session()->has('info'))
    <div id="session" class="alert alert-success" role="alert">
        <span>{{session('info')}}</span>
    </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start">
            <h3 style="margin:5px">Clientes</h3>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 justify-content-start">
            <form method="GET" action="{{ route('clientes.textoBuscar') }}" class="form-inline">
                <input class="form-control" type="text" name="buscar" placeholder="Buscar">
                <button class="btn btn-primary" type="submit" style="margin:5px">Buscar</button>
            </form>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3 justify-content-start">
            <a class="btn btn-primary m-1" href="#" data-toggle="modal" data-target="#modalcreateclient" role="button"
                id="modalCreateClient">Nuevo Cliente</a>
            {{-- <a class="btn btn-primary"  href="{{route('clientes.create')}}" role="button">Nuevo Cliente</a> --}}
        </div>
    </div>
    @if (count($clientes)==0 || is_null($clientes))
    <hr>
    <h3>No hay clientes Registrados</h3>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:35%">Nombre</th>
                <th style="width:15%">CIF / DNI / NIE</th>
                <th style="width:10%">Telefono</th>
                <th style="width:10%">Estado</th>
                <th style="width:20%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <input type="hidden" name="cliente_id" id="product_id">
                <td class="d-xs-none">
                    <a class="btnshowclient" href="#" data-toggle="modal" data-target="#modalshowclient"
                        data-href="{{ url("/cliente/$cliente->id")}}" data-action="0"
                        role="button">{{ $cliente->nombre }}</a>
                </td>
                <td class="d-xs-none">
                    {{ $cliente->cif }}
                </td>
                <td class="d-xs-none">
                    {{ $cliente->telefono }}
                </td>
                <td class="d-xs-none lblinactivo">
                    {{ $cliente->activo ? '':'Inactivo' }}
                </td>
                <td class="form-inline">
                    <a class="btn btn-primary btn-sm m-1" href="{{route('clientes.edit', $cliente->id)}}" role="button">
                        <span class="glyphicon glyphicon-pencil"></span>Modificar
                    </a>
                    <button type="button" class="btn btn-danger btn-sm m-1 btnDeleteCliente" data-toggle="modal"
                        data-target="#modalDeleteClient" data-id="{{$cliente->id}}"
                        data-nombre="{{ $cliente->nombre }}">
                        Eliminar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif
    <div class="justify-content-center">
        {!! $clientes->appends(['buscar'=> request('buscar')])->links() !!}
    </div>
    {{-- @if(session()->has('info'))
    <script>
        alert('{{session('info')}}')
    </script>
    @endif --}}
    @include('clientes.clienteModal')
</div>
<script>
    $(document).ready(function($) {
                $('#modalCreateClient').on('click',function() {
                    $("#formModalCreateClient").trigger('reset');
                });
            });


            setTimeout( "$('#session').hide();", 4000);
</script>
@stop
