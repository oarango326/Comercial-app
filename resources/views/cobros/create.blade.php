@extends('layout')
@section('contenido')
<div>
    <h3>Nuevo Cobro</h3>
</div>
    <form action="{{route('cobros.store')}}" method="POST" >
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-4 form">
                <label for="lblcliente">Cliente</label>
                <select name="cliente_id" id="selectcliente" class="form-control "  required>
                    <option disabled selected value=""> Seleccione un Cliente... </option>
                    @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}" direccion="{{$cliente->direccion}} {{$cliente->ciudad}} {{$cliente->estado}} {{$cliente->telefono}}">{{$cliente->nombre}}</option>
                    @endforeach
                </select>
                {{-- <button class="btn btn-primary" id="btnSeleccion" role="button">Seleccionar</button> --}}
            </div>
            <div class="col-xs-12  col-sm-12 col-md-8 col-lg-6">
                <label for="lblcliente">Direccion</label>
                <input type="text" name="direccion" id="direccion" class="form-control" disabled>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                    <label for="lblcliente">Fecha Cobro</label>
                    <input type="date" name="fechacobro" id="fechacobro" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-2 col-lg-2">
                <label for="lbltipodocumento">Tipo Documento</label>
                <select name="tipodocumento" id="tipodocumento" class="form-control">
                    <option value="fac">FACTURA</option>
                    <option value="alb">ALBARAN</option>
                </select>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 form">
                <label for="lblnumdocumento">#Nota</label>
                <input type="text" name="numdocumento" id="numdocumento" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <label for="lblcliente">Fecha Documento</label>
                <input type="date" name="fechadocumento" id="fechadocumento" class="form-control" required>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 ">
                <label for="lbltipocobro">Tipo Cobro</label>
                <select name="tipocobro" id="tipocobro" class="form-control">
                    <option value="efectivo">EFECTIVO</option>
                    <option value="pagare">PAGARE</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-4 ">
                    <label for="lblmonto">Monto Nota</label>
                    <input type="text" name="monto" id="monto" class="form-control montos calculo" value="0">
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 ">
                    <label for="lblmontoabono">Monto Abono</label>
                    <input type="text" name="abono" id="abono" class="form-control montos calculo" value="0" >
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 ">
                    <label for="lbltotal">Total cobrado</label>
                    <input type="text" name="total" id="total" class="form-control" value="0,00"disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-start">
                    <a class="btn btn-primary align" style="margin:5px"  href="#" role="button">Volver</a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-success" style="margin:5px">Guardar</button>
                {{-- <a class="btn btn-secondary" style="margin:5px" href="{{route('clientes.index')}}" role="button">Cancelar</a> --}}
            </div>
        </div>


    </form>
</div>
<script>
    $('#selectcliente').change(function(){
       $('#direccion').val($(this).find(':selected').attr('direccion'));
        // console.log($(this).find(':selected').attr('direccion'));
    })
//function jquery para imputs que manejen decimales
    $('.montos').on('input', function() {
            this.value = this.value
            .replace(/[^\d.]/g, '')             // numbers and decimals only
            .replace(/(^[\d]{8})[\d]/g, '$1')   // not more than 2 digits at the beginning
            .replace(/(\..*)\,/g, '$1')         // decimal can't exist more than once
            .replace(/(\.[\d]{2})./g, '$1');    // not more than 4 digits after decimal
    });

    $('.calculo').on('change',function(){
        let monto=0;
        let abono=0;
        let total=0
        monto=$('#monto').val();
        abono=$('#abono').val();
        $('#total').val((monto-abono).toFixed(2));
        console.log(monto);
        console.log(abono);
        console.log((monto-abono).toFixed(2));
    })

//javascript function onlynumbers
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }



</script>

@stop

