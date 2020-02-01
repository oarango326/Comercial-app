@extends('layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3">
            <h3 style="margin:5px">Facturas</h3>
        </div>
        <div class="col-lg-6 justify-content-between">
            <label for="lblactivas">Pendientes</label>
            <input type="radio" name="facactiva" checked>
            <label for="lblactivas">Cobradas</label>
            <input type="radio" name="facactiva">
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3 justify-content-start">
            <a class="btn btn-primary m-1" href="{{route('facturas.create')}}" role="button" id="btnCreatecobro">Nueva
                Factura</a>
        </div>
        @if (count($facturas)==0 || is_null($facturas))
        <hr>
        <h3>No hay Registros</h3>
        @else
    </div>
    <div class="row justify-content-center ">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    {{-- <th style="width:5%">id</th> --}}
                    <th style="width:5%">Fecha</th>
                    <th style="width:5%">Vence</th>
                    <th style="width:25%">Cliente</th>
                    <th style="width:10%">Fabricante</th>
                    {{-- <th style="width:10%">Documento</th> --}}
                    <th style="width:10%">Monto</th>
                    <th style="width:10%">Estado</th>
                    <th style="width:20%">Acciones</th>
                </tr>
            </thead>
            <tbody id="facpendientes" >
                @foreach ($facturas as $factura)
                <tr>
                    {{-- <td>{{$factura->id}}</td> --}}
                    <td>{{date('d/M/Y',strtotime($factura->facfecha))}}</td>
                    <td>{{date('d/M/Y',strtotime($factura->facfecha."+ 90 days"))}}</td>
                    <td>{{$factura->cliente->nombre}}</td>
                    <td>{{$factura->fabricante->nombre}}</td>
                    {{-- <td>{{($factura->tipodoc==0)?"FACTURA":"ALBARAN"}}</td> --}}
                    <td>{{$factura->total}}€</td>
                    <td></td>
                    <td class="form-inline">
                        <a href="{{route('facturas.show',$factura->id )}}"
                            class="btn btn-primary btn-sm m-1 align-content-end">Ver</a>
                        <button type="button" class="btn btn-danger btn-sm m-1 btnDelete" data-toggle="modal"
                            data-target="#modalDelete" data-id="{{$factura->id}}" data-nombre="FACTURA #">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tbody id="faccobradas">
                @foreach ($cobradas as $cobrada)
                <tr>
                    {{-- <td>{{$cobrada->id}}</td> --}}
                    <td>{{date('d/M/Y',strtotime($cobrada->facfecha))}}</td>
                    <td>{{date('d/M/Y',strtotime($cobrada->facfecha."+ 90 days"))}}</td>
                    <td>{{$cobrada->cliente->nombre}}</td>
                    <td>{{$cobrada->fabricante->nombre}}</td>
                    {{-- <td>{{($cobrada->tipodoc==0)?"FACTURA":"ALBARAN"}}</td> --}}
                    <td>{{$cobrada->total}}€</td>
                    <td></td>
                    <td class="form-inline">
                        <a href="{{route('facturas.show',$cobrada->id )}}"
                            class="btn btn-primary btn-sm m-1 align-content-end">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @include('facturas.facturaModal')
    <script>
        $(document).ready(function(){
            $('#faccobradas').hide()
        })
        let estado=0;
        $('input[name$="facactiva"').change(function(){
            if(estado==1){
                $('#facpendientes').show()
                $('#faccobradas').hide()
                return estado=0;
            }
            if(estado==0){
                $('#facpendientes').hide()
                $('#faccobradas').show()
                return estado=1;
            }
        })

    </script>
</div>
@stop
