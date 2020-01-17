@extends('layout')
@section('contenido')
<div>
    <h3>Nueva Factura</h3>
</div>
<div>
    <form action="{{route('facturas.store')}}" method="POST" >
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 form">
                <label for="lblcliente">Cliente</label>
                <select name="cliente_id" id="selectcliente" class="form-control "  required>
                    <option disabled selected value=""> Seleccione un Cliente... </option>
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}" direccion="{{$cliente->direccion}} {{$cliente->ciudad}} {{$cliente->estado}} {{$cliente->telefono}}">{{$cliente->nombre}}</option>
                    @endforeach
                </select>
                {{-- <button class="btn btn-primary" id="btnSeleccion" role="button">Seleccionar</button> --}}
            </div>
            <div class="col-xs-12  col-sm-12 col-md-8 col-lg-6 col-xl-6">
                <label for="lblcliente">Direccion</label>
                <input type="text"  id="direccion" class="form-control" readonly>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                <label for="lblfabricante">Fecha Documento</label>
                <input type="date" name="facfecha" id="facfecha" class="form-control" required>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4">
                <label for="lbltipodocumento">fabricante</label>
                <select name="fabricante_id" id="fabricante_id" class="form-control" required>
                    <option disabled selected value=""> Seleccione un fabricante... </option>
                    @foreach($fabricantes as $fabricante)
                        <option value="{{$fabricante->id}}">{{$fabricante->nombre}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 col-xl-2">
                <label for="lbltipodocumento">Tipo Documento</label>
                <select name="tipodoc" id="tipodoc" class="form-control">
                    <option value="0">FACTURA</option>
                    <option value="1">ALBARAN</option>
                </select>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-2 col-xl-2">
                <label for="lblnumdocumento">#Nota</label>
                <input type="text" name="facnum" id="facnum" class="form-control" maxlength="10" required>
            </div>

            <div class="col-xs-12 col-md-4 col-lg-2 ">
                <label for="lblmonto">Monto Nota</label>
                <input  style="text-align: right;" type="text"  name="total" id="total" class="form-control montos" value="0" required>
             </div>
             <div class="col-xs-12 col-md-4 col-lg-2 ">
                <label for="lblsaldo">Saldo Pendiente</label>
                <input  style="text-align: right;" type="text"  name="saldo" id="saldo" class="form-control montos" value="0" readonly required>
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
            <a class="btn btn-primary" style="margin:5px"  href="{{route('facturas.index')}}" role="button">Cancelar</a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button type="submit"  class="btn btn-success" style="margin:5px">Guardar</button>
                {{-- <a class="btn btn-secondary" style="margin:5px" href="{{route('clientes.index')}}" role="button">Cancelar</a> --}}
            </div>
        </div>
    </form>
</div>
<script>


    //habilita/deshabilita Detalle Abono
    $(function(){
        $('#divDetalleAbono').hide();
        $('#btnDetalleAbono').text('Agregar Detalle Abono');
    })

    $('#total').keyup(function(){
        $('#saldo').val($(this).val());
    })



    $('#selectarticulo').change(function(){
        let total=0;
        let precio=$(this).find(':selected').attr('precio');
        let cantidad=$('#selectcantidad').val();
        $('#selectprecio').val(precio);
        total=precio*cantidad;
        $('#selecttotal').val(total.toFixed(2));
    })

    //function Jquery calcula total linea por cantidad
    $('#selectcantidad').change(function(){
    //    console.log('escribien cantidad');
        let total=0;
        let precio=$('#selectprecio').val();
        total=precio*$(this).val();
        $('#selecttotal').val(total.toFixed(2));
    })

    //Function Jquery limpia imputs abono
    function limpiaLinea(){
        $('#selectarticulo').val('');
        $('#selectcantidad').val('');
        $('#selecttotal').val(0);
        $('#selectprecio').val(0);
    }

    function sumalineas(){
        let indice=0;
        let lineas=$('.sumatoria')
        let totallineas=0;
        while(indice<lineas.length){
            totallineas+=parseFloat(lineas.eq(indice).val());
            indice++
        }
        $('#abono').val(totallineas.toFixed(2))
    }

    function calculatotal(){
        monto=$('#monto').val();
        abono=$('#abono').val();
        $('#total').val((monto-abono).toFixed(2));
    }

    let indicelinea=0;
    $('#btnAddlabono').click(function(){
        let totalabono;
        let articulo_id=$('#selectarticulo').val();
        let larticulo=$('#selectarticulo').find(':selected').text();
        let lcantidad=$('#selectcantidad').val();
        let lprecio=$('#selectarticulo').find(':selected').attr('precio')
        let ltotal=$('#selecttotal').val();

        if(articulo_id=='' || articulo_id==null || lcantidad==null || lcantidad==''){

            return false;
            console.log('ingresar valores')
        }else{
            $('#tablaDetalleAbono')
                .append("<tr id='nfila"+indicelinea+"'>"
                    +"<input type='hidden' name='articulo_id[]' class='form-control' value='"+articulo_id+"'></td>"
                    +"<td>"+"<input type='text' style='background:none' name='descripcion[]'  class='form-control border-0' value='"+larticulo+"' readonly></td>"
                    +"<td>"+"<input type='number' style='background:none' name='cantidad[]' class='form-control border-0' value='"+lcantidad+"' readonly></td>"
                    +"<td>"+"<input type='text' style='background:none' name='precio[]' class='form-control border-0' value='"+lprecio+"' readonly></td>"
                    +"<td>"+"<input type='text'  style='background:none' name='total_linea[]' class='form-control border-0 sumatoria' value='"+ltotal+"' readonly></td>"
                    +"<td><button type='button'  role='button' id='btnremovelabono' class='btn btn-danger borrarlinea'>Eliminar</button></td>"
                    +"<tr>"
            );
            indicelinea++;
            sumalineas();
            calculatotal();
        }
        limpiaLinea();
    })
    //Function JQuery calcula monto de abono renglones

        $('#tablaDetalleAbono').on('click', '.borrarlinea', function(){
        $(this).closest('tr').remove();
        sumalineas();
        calculatotal();
    });





    //Function JQuery activa o desactiva monto del abono
    $('#btnDetalleAbono').click(function(){
        if($(this).hasClass('active')){
            $('#abono').removeAttr('readonly');
            $('#divDetalleAbono').hide();
            $(this).text('Agregar Abono');
            $(this).removeClass('btn-danger active');
            $(this).addClass('btn-secondary');
        }else{
            $('#abono').attr('readonly','false');
            $('#divDetalleAbono').show();
            $(this).text('Descartar Detalle Abono');
            $(this).removeClass('btn-secondary ');
            $(this).addClass('btn-danger active');
        }
    })

    //Function JQuery Pinta Direccion de cliente en Encabezado
    $('#selectcliente').change(function(){
        $('#direccion').val($(this).find(':selected').attr('direccion'));
        // console.log($(this).find(':selected').attr('direccion'));
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
