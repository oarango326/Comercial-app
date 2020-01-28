@extends('layout')
@section('contenido')
<div class="container">
    <div>
        <h3>Nueva Factura</h3>
    </div>
    <div>
        <form action="{{route('facturas.update',$factura->id)}}" method="POST">
            {!!method_field('PUT')!!}
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3  col-xl-3">
                    <label for="lblcliente">Cliente</label>
                    <select name="cliente_id" id="selectcliente" class="form-control " required>
                        <option selected value="{{$cliente[0]->id}}"> {{$cliente[0]->nombre}}</option>
                        @foreach ($clientes as $cli)
                        <option value="{{$cli->id}}"
                            direccion="{{$cli->direccion}} {{$cli->ciudad}} {{$cli->estado}} {{$cli->telefono}}">
                            {{$cli->nombre}}</option>
                        @endforeach
                    </select>
                    {{-- <button class="btn btn-primary" id="btnSeleccion" role="button">Seleccionar</button> --}}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">
                    <label for="lblcliente">Direccion</label>
                    <input type="text" id="direccion" class="form-control"
                        value="{{$cliente[0]->direccion}} {{$cliente[0]->ciudad}} {{$cliente[0]->estado}} {{$cliente[0]->telefono}}"
                        readonly>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 ">
                    <label for="lblfabricante">Fecha Documento</label>
                    <input type="date" name="facfecha" id="facfecha" class="form-control" value="{{$factura->facfecha}}"
                        required>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <label for="lbltipodocumento">fabricante</label>
                    <select name="fabricante_id" id="fabricante_id" class="form-control" required>
                        <option selected value="{{$fabricante[0]->id}}">{{$fabricante[0]->nombre}}</option>
                        @foreach($fabricantes as $fabricante)
                        <option value="{{$fabricante->id}}">{{$fabricante->nombre}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 col-xl-2">
                    <label for="lbltipodocumento">Tipo Documento</label>
                    <select name="tipodoc" id="tipodoc" class="form-control">
                        <option selected value="{{$factura->tipodoc}}">{{($factura->tipodoc==0)?'FACTURA':'ALBARAN'}}
                        </option>
                        <option value="0">FACTURA</option>
                        <option value="1">ALBARAN</option>
                    </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-2 col-xl-2">
                    <label for="lblnumdocumento">#Nota</label>
                    <input type="text" name="facnum" id="facnum" class="form-control" maxlength="10"
                        value="{{$factura->facnum}}" required>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-2 ">
                    <label for="lblmonto">Monto Nota</label>
                    <input style="text-align: right;" type="text" name="total" id="total" class="form-control montos"
                        value="{{$factura->total}}" required>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-2 ">
                    <label for="lblsaldo">Saldo Pendiente</label>
                    <input style="text-align: right;" type="text" name="saldo" id="saldo"
                        class="form-control montos decimales" value="{{$factura->saldo}}" readonly required>
                </div>
                {{-- <div class="col-xs-12 col-md-4 col-lg-2 ">
                <label for="lblsaldo">Monto saldo</label>
                <input type="text" name="saldo" id="saldo" class="form-control montos calculo" readonly>
            </div> --}}
                {{-- <div class="col-xs-12 col-md-4 col-lg-4 ">
                <label for="lbltipocobro">Tipo Cobro</label>
                <select name="tipocobro" id="tipocobro" class="form-control">
                    <option value="efectivo">EFECTIVO</option>
                    <option value="pagare">PAGARE</option>
                </select>
            </div> --}}
            </div>
            {{-- <div class="row">

            <div class="col-xs-12 col-md-4 col-lg-4 ">
                    <label for="lblmontoabono">Monto Abono</label>
                    <input type="text" name="abono" id="abono" class="form-control montos calculo" value="0" >
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 ">
                <label for="lbltotal">Total cobrado</label>
                <input type="text" name="total" id="total"
                class="form-control montos" value="0" readonly>
            </div>
        </div> --}}
            {{-- <div class="row">
            <div class="col-12 d-flex justify-content-start">
                    <button type="button" id="btnDetalleAbono" class="btn btn-secondary m-2" role="button"></button>
            </div>
        </div> --}}
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <a class="btn btn-primary align" style="margin:5px" href="{{route('facturas.index')}}"
                        role="button">Cancelar</a>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success" style="margin:5px">Guardar</button>
                    {{-- <a class="btn btn-secondary" style="margin:5px" href="{{route('clientes.index')}}"
                    role="button">Cancelar</a> --}}
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    //Function JQuery Pinta Direccion de cliente en Encabezado
    $('#selectcliente').change(function(){
        $('#direccion').val($(this).find(':selected').attr('direccion'));
        // console.log($(this).find(':selected').attr('direccion'));
    })
//function Jquery Refesca valor de saldo pendiente

    $('#total').change(function(){
        $('#saldo').val($(this).val());
    })

    //function jquery para imputs que manejen decimales
    $('.montos').on('input', function() {
            this.value = this.value
            .replace(/[^\d.]/g, '')             // numbers and decimals only
            .replace(/(^[\d]{8})[\d]/g, '$1')   // not more than 8 digits at the beginning
            .replace(/(\..*)\,/g, '$1')         // decimal can't exist more than once
            .replace(/(\.[\d]{2})./g, '$1');    // not more than 2 digits after decimal
    });
    //funcion JQuery no 0 al ingresar primer caracter
    $(".nocero").on("input", function() {
        if (/^0/.test(this.value)) {
            this.value = this.value.replace(/^0/, "")
        }
    })
    //Function javascript function onlynumbers
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }
</script>
@stop
