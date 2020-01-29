@extends('layout')
@section('contenido')
<div class="container">
    @if(session()->has('info'))
    <div id="session" class="alert alert-success" role="alert">
        <span>{{session('info')}}</span>
    </div>
    @endif
    <div>
        <h3>Cobro:# {{$cobro->id}}</h3>
    </div>
    {{-- Inicio Encabezado Cobro --}}
    <div class="row">
        <div class="col-xs-12 col-md-4 col-lg-4 form">
            <label for="lblcliente">Cliente</label>
            <input type="text" name="cliente" id="cliente" class="form-control" value="{{$cliente[0]->nombre}}"
                readonly>
            {{-- <button class="btn btn-primary" id="btnSeleccion" role="button">Seleccionar</button> --}}
        </div>
        <div class="col-xs-12  col-sm-12 col-md-8 col-lg-6">
            <label for="lblcliente">Direccion</label>
            <input type="text" name="direccion" id="direccion" class="form-control"
                value="{{$cliente[0]->direccion}} {{$cliente[0]->ciudad}} {{$cliente[0]->estado}} {{$cliente[0]->telefono}}"
                readonly>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
            <label for="lblcliente">Fecha Cobro</label>
            <input type="date" name="fechacobro" id="fechacobro" class="form-control" value="{{$cobro->fechacobro}}"
                readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-2 col-lg-2">
            <label for="lbltipodocumento">Tipo Documento</label>
            <input type="text" name="tipodocumento" id="tipodocumento" class="form-control"
                value="{{($cobro->tipodocumento=='fac')?'FACTURA':'ALBARAN'}}" readonly>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4 form">
            <label for="lblnumdocumento">#Nota</label>
            <input type="text" name="numdocumento" id="numdocumento" class="form-control" maxlength="10"
                value="{{$cobro->numdocumento}}" readonly>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="lblcliente">Fecha Documento</label>
            <input type="date" name="fechadocumento" id="fechadocumento" class="form-control"
                value="{{$cobro->fechadocumento}}" readonly>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4 ">
            <label for="lbltipocobro">Tipo Cobro</label>
            <input type="text" name="tipocobro" id="tipocobro" class="form-control"
                value="{{($cobro->tipocobro=='efectivo')?'EFECTIVO':'PAGARE'}}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4 col-lg-4 ">
            <label for="lblmonto">Monto Nota</label>
            <input type="text" name="monto" id="monto" class="form-control montos calculo" value="{{$cobro->monto}}"
                readonly>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4 ">
            <label for="lblmontoabono">Monto Abono</label>
            <input type="text" name="abono" id="abono" class="form-control montos calculo" value="{{$cobro->abono}}"
                readonly>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4 ">
            <label for="lbltotal">Total cobrado</label>
            <input type="text" name="total" id="total" class="form-control montos calculo" value="{{$cobro->total}}"
                readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <button type="button" id="btnDetalleAbono" class="btn btn-secondary m-2" role="button"></button>
        </div>
    </div>
    {{-- Fin Encabezado Cobro --}}
    {{-- Detalle de Abono  --}}
    <div class="row" id="divDetalleAbono" style="margin-top:5px">
        @if(count($detallecobro)>0)
        <table id="tablaDetalleAbono" class="table table-striped  ">
            <thead>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($detallecobro as $detalle)
                <tr>
                    <td>{{$detalle->ean}} - {{$detalle->nombre}}</td>
                    <td>{{$detalle->cantidad}} </td>
                    <td>{{$detalle->precio}} </td>
                    <td>{{$detalle->total_linea}} </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        @else
        <div class="align-content-center">
            <h4 class="align-content-center">No posee detalles este cobro</h4>
        </div>

        @endif
    </div>
    {{-- Fin Detalle de Abono --}}
    <div class="row">
        <div class="col-6 d-flex justify-content-start">
            <a class="btn btn-primary align" style="margin:5px" href="{{route('cobros.index')}}"
                role="button">Volver</a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            {{-- <button type="submit"  class="btn btn-success" style="margin:5px">Guardar</button> --}}
            {{-- <a class="btn btn-secondary" style="margin:5px" href="{{route('clientes.index')}}"
            role="button">Cancelar</a> --}}
        </div>
    </div>
</div>
</div>
{{-- Funciones JavaScript JQuery --}}
<script>
    //habilita/deshabilita Detalle Abono
    $(function(){
        $('#divDetalleAbono').hide();
        $('#btnDetalleAbono').text('Detalle Abono');
    })


    function calculatotal(){
        monto=$('#monto').val();
        abono=$('#abono').val();
        $('#total').val((monto-abono).toFixed(2));
    }



//Function JQuery activa o desactiva monto del abono
    $('#btnDetalleAbono').click(function(){
        if($(this).hasClass('active')){
           // $('#abono').removeAttr('readonly');
            $('#divDetalleAbono').hide();
            $(this).text('Agregar Abono');
            $(this).removeClass('btn-danger active');
            $(this).addClass('btn-secondary');
        }else{
           // $('#abono').attr('readonly','false');
            $('#divDetalleAbono').show();
            $(this).text('Ocultar Detalle Abono');
            $(this).removeClass('btn-secondary ');
            $(this).addClass('btn-danger active');
        }
    })

    //Function JQuery Pinta Direccion de cliente en Encabezado
    $('#selectcliente').change(function(){
       $('#direccion').val($(this).find(':selected').attr('direccion'));
        // console.log($(this).find(':selected').attr('direccion'));
    })


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

    setTimeout( "$('#session').hide();", 4000);
</script>
{{-- Fun Funciones JavaScript Jquery --}}
{{-- @if(session()->has('info'))
<script>
    alert('{{session('info')}}')
</script>
@endif --}}

@stop
