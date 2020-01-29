@extends('layout')
@section('contenido')
<div class="container">
    <div>
        <h3>Nuevo Cobro</h3>
    </div>
    <form action="{{route('cobros.store')}}" method="POST">
        @csrf
        {{-- Inicio Encabezado Cobro --}}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4form">
                <label for="lblcliente">Cliente</label>
                <select name="cliente_id" id="selectcliente" class="form-control "
                    data-href="{{ route('cobros.facturasCliente','')}}" required>
                    <option disabled selected value=""> Seleccione un Cliente... </option>
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}"
                        direccion="{{$cliente->direccion}} {{$cliente->ciudad}} {{$cliente->estado}} {{$cliente->telefono}}">
                        {{$cliente->nombre}}</option>
                    @endforeach
                </select>
                {{-- <button class="btn btn-primary" id="btnSeleccion" role="button">Seleccionar</button> --}}
            </div>
            <div class="col-xs-12  col-sm-12 col-md-8 col-lg-5 col-xl-6">
                <label for="lblcliente">Direccion</label>
                <input type="text" name="direccion" id="direccion" class="form-control" readonly>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                <label for="lblcliente">Fecha Cobro</label>
                <input type="date" name="fechacobro" id="fechacobro" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" id="divtipodocumento">
                <label for="lbltipodocumento">Tipo Documento</label>
                <select name="tipodocumento" id="tipodocumento" class="form-control">
                    <option value="0">FACTURA</option>
                    <option value="1">ALBARAN</option>
                </select>
            </div>
            <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3" id="divnumdocumento">
                <label for="lblnumdocumento">#Nota</label>
                <input type="text" name="numdocumento" id="numdocumento" class="form-control" maxlength="10" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" id="divfechadocumento">
                <label for="lblcliente">Fecha Documento</label>
                <input type="date" name="fechadocumento" id="fechadocumento" class="form-control" required>
            </div>
            <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
                <label for="lbltipocobro">Tipo Cobro</label>
                <select name="tipocobro" id="tipocobro" class="form-control">
                    <option value="efectivo">EFECTIVO</option>
                    <option value="pagare">PAGARE</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-2 col-xl-2 ">
                <label for="lblmonto">Monto Nota</label>
                <input type="text" name="monto" id="monto" class="form-control montos calculo decimales" value="0">
            </div>
            <div class="col-xs-12 col-md-4 col-lg-2 col-xl-2 ">
                <label for="lblmontoabono">Monto Abono</label>
                <input type="text" name="abono" id="abono" class="form-control montos calculo decimales" value="0">
            </div>
            <div class="col-xs-12 col-md-4 col-lg-2 col-xl-2">
                <label for="lbltotal">Total cobrado</label>
                <input type="text" name="total" id="total" class="form-control montos decimales" value="0" readonly>
                <input type="hidden" name="factura_id" id="factura_id">
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

            {{--  --}}
            <table id="tablaDetalleAbono" class="table table-striped  ">
                <thead>

                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>

                        <td>
                            <select id="selectarticulo" class="form-control ">
                                <option disabled selected value=""> Seleccione un Articulo... </option>
                                @foreach ($articulos as $articulo)
                                <option value="{{$articulo->id}}" precio="{{$articulo->precio}}">{{$articulo->ean}} -
                                    {{$articulo->nombre}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" id="selectcantidad" class="form-control montos nocero"></td>
                        <td><input type="text" id="selectprecio" class="form-control" readonly></td>
                        <td><input type="text" id="selecttotal" class="form-control" readonly></td>
                        <td> <button type="button" role="button" id="btnAddlabono"
                                class="btn btn-success">Agregar</button> </td>
                    </tr>
                </tbody>
            </table>

        </div>

        {{-- Fin Detalle de Abono --}}

        <div class="row">
            <div class="col-6 d-flex justify-content-start">
                <a class="btn btn-primary align" style="margin:5px" href="{{route('cobros.index')}}"
                    role="button">Volver</a>
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
{{-- Funciones JavaScript JQuery --}}
<script>
    // inicio ajax
$(document).ready(function(){
        $("#selectcliente").change(function(){
            console.log('Seleccionando');
            let url=$(this).attr("data-href");
            let id=$(this).find('option:selected').val();
            let tipodoc=$("#tipodocumento");
            let numdoc=$('#numdocumento');
            let fecdoc=$('#fechadocumento');
            let monto=$('#monto');
            let abono=$('#abono');
            let factura_id=$('#factura_id');
            let selector=document.createElement('select');
            let opciones=document.createElement('option');

            $.ajax({
                type: "get",
                url: url+'/'+id,
                data: "data",
                dataType: "json",
                success: function (data) {

                    if(data!=''){
                        console.log(data)
                        tipodoc.attr('readonly','true');
                        numdoc.attr('disabled','disabled');
                        fecdoc.attr('readonly','true');
                        monto.attr('readonly','true')

                        $("#divnumdocumento").children('#numdocumento').hide();
                        $("#divnumdocumento").append(selector);
                        $("#divnumdocumento select").addClass('form-control').attr({name:'numdocumento',id:'numdocumento'} ).addClass('facturas');
                        $.each(data, function (i, e) {
                            $("#divnumdocumento select")
                            .append('<option factura='+e.id+' facmonto='+e.total+' facsaldo='+e.saldo+'  facfecha='+e.facfecha+' tipodoc='+e.tipodoc+' value='+e.facnum+'>'+e.facnum+'</option>');
                        });
                        fecdoc.val($('.facturas').find('option:selected').eq(0).attr('facfecha'));
                        tipodoc.val($('.facturas').find('option:selected').eq(0).attr('tipodoc'));
                        monto.val($('.facturas').find('option:selected').eq(0).attr('facsaldo'));
                        factura_id.val($('.facturas').find('option:selected').eq(0).attr('factura'))
                        calculatotal()
                        $('.facturas').change(function(){
                            fecdoc.val($(this).find('option:selected').attr('facfecha'));
                            tipodoc.val($(this).find('option:selected').attr('tipodoc'));
                            monto.val($(this).find('option:selected').attr('facsaldo'));
                            factura_id.val($(this).find('option:selected').attr('factura'))
                            //console.log($(this).find('option:selected').val());
                            calculatotal()
                        })

                    }else{
                        tipodoc.removeAttr('readonly');
                        tipodoc.val('1')
                        numdoc.removeAttr('disabled');
                        fecdoc.removeAttr('readonly');
                        fecdoc.val('')
                        monto.removeAttr('readonly')
                        monto.val('0')
                        abono.val('0')
                        factura_id.val('')
                        $("#divnumdocumento").children('#numdocumento').show();
                        $("#divnumdocumento select").remove();
                        calculatotal()
                    }
                },
               error :function(jqXHR, exception)
                {
                    if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                        console.log(msg);
                    }
                }
           });
        });
    });
// fin Ajax



    //habilita/deshabilita Detalle Abono
    $(function(){
        $('#divDetalleAbono').hide();
        $('#btnDetalleAbono').text('Agregar Detalle Abono');
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
            .replace(/(^[\d]{8})[\d]/g, '$1')   // not more than 2 digits at the beginning
            .replace(/(\..*)\,/g, '$1')         // decimal can't exist more than once
            .replace(/(\.[\d]{2})./g, '$1');    // not more than 4 digits after decimal
    });


    // Function JQuery Calcula Total del Cobro
    $('.calculo').on('change',function(){
        calculatotal();
    })


        $(".decimales").focusout(function(){
            if($(this).val()==''){
                $(this).val('0');
            }
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

</script>
<style>
    .input-symbol-euro {
        position: relative;
    }

    .input-symbol-euro input {
        padding-left: 18px;
    }

    .input-symbol-euro:before {
        position: absolute;
        top: 0;
        content: "€";
        left: 5px;
    }

    .decimales {
        text-align: right;
    }
</style>

{{-- Fun Funciones JavaScript Jquery --}}
@stop
