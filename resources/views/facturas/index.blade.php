@extends('layout')
@section('contenido')

<div class="row" >
    <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3 d-flex justify-content-start" >
            <h3  style="margin:5px">Facturas</h3>
    </div>

    <div class="col-xs-12 col-sm-3 col-lg-3 offset-6 justify-content-start" >
    <a class="btn btn-primary m-1"  href="{{route('facturas.create')}}" role="button"
            id="btnCreatecobro">Nuevo</a>
    </div>

</div>

@if (count($facturas)==0 || is_null($facturas))
<hr>
    <h3>No hay Registros</h3>
    @else
    <div class="row justify-content-center ">
        <table class="table table-striped table-responsive-xl table-responsive-sm">
            <thead>
                <tr>
                    <th style="width:10%">id</th>
                    <th style="width:10%">Fecha</th>
                    <th style="width:20%">Cliente</th>
                    <th style="width:20%">Fabricante</th>
                    <th style="width:20%">Monto</th>
                    <th style="width:20%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                <tr>
                    <td>{{$factura->id}}</td>
                    <td>{{date('d/M/Y',strtotime($factura->facnum))}}</td>
                    <td>{{$factura->cliente->nombre}}</td>
                    <td>{{$factura->fabricante->nombre}}</td>
                    <td>{{$factura->total}}€</td>
                    <td class="form-inline">
                        <a href="{{route('facturas.show',$factura->id )}}" class="btn btn-primary btn-sm m-1 align-content-end">Ver</a>
                        <form action="{{route('facturas.destroy', $factura->id )}}" method="post">
                            {!!method_field('DELETE')!!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger btn-sm m-1 align-content-end">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@if(session()->has('info'))
            <script>
                alert('{{session('info')}}')
            </script>
        @endif
@stop
