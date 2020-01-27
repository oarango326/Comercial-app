<!--Modal Client Create-->
<div class="modal fade" id="modalcreateclient" tabindex="-1" role="dialog" aria-labelledby="modalclientlabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.store') }}" method="POST" id="formModalCreateClient">
                    {{ csrf_field() }}
                    <div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <label for="lblcliente" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="Nombre" value="{{old('Nombre')}}"
                                    required="true">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <label for="lblcif" class="col-form-label">CIF</label>
                                <input type="text" class="form-control" name="Cif" required="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="lbldireccion" class="col-form-label">Direccion</label>
                                <input type="text" class="form-control" name="Direccion" required="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <label for="lbldireccion" class="col-form-label">Ciudad</label>
                                <input type="text" class="form-control" name="Ciudad" required="true">
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <label for="lblprovincia" class="col-form-label">Provincia</label>
                                <input type="text" class="form-control" name="Estado" required="true">
                            </div>
                            <div class="col-xs-2 col-sm-4 col-md-4">
                                <label for="lblcp" class="col-form-label">Codigo Postal</label>
                                <input type="text" class="form-control" maxlength="5" size="5" name="CodigoPostal"
                                    required="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <label for="lbltelefono" class="col-form-label">Telefono</label>
                                <input type="text" class="form-control" name="Telefono" required="true">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <label for="lblemail" class="col-form-label">Email</label>
                                <input type="email" class="form-control" name="Email">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="margin:5px">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--fin modal Client create -->
<!-- modal Client show -->
<div class="modal fade" id="modalshowclient" tabindex="-1" role="dialog" aria-labelledby="modalclientlabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTxtNombre"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-4">
                            <label for="lblcif" class="col-form-label">CIF</label>
                            <input type="text" class="form-control" name="cif" id="modalTxtCif" disabled>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <label for="lblestado" class="col-form-label">Estado</label>
                            <input type="text" class="form-control" id="modalTxtActivo" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <label for="lbldireccion" class="col-form-label">Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="modalTxtDireccion" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <label for="lbldireccion" class="col-form-label">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" id="modalTxtCiudad" disabled>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <label for="lblprovincia" class="col-form-label">Provincia</label>
                            <input type="text" class="form-control" name="estado" id="modalTxtProvincia" disabled>
                        </div>
                        <div class="col-xs-2 col-sm-4 col-md-4">
                            <label for="lblcp" class="col-form-label">Codigo Postal</label>
                            <input type="text" class="form-control" maxlength="5" size="5" name="codigoPostal"
                                id="modalTxtCodigoPostal" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label for="lbltelefono" class="col-form-label">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="modalTxtTelefono" disabled>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label for="lblemail" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="modalTxtEmail" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--fin Modal Client-->
<!-- Modal Client Delete-->
<div class="modal fade" id="modalDeleteClient" tabindex="-1" role="dialog" aria-labelledby="modalDeleteClient"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteClienteModalLabel">Borrar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Esta Seguro que desea borrar el cliente:</p>
                <label id="deleteClientelbl"></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{route('clientes.destroy', 'NA')}}" style="display:inline" method="POST">
                    {!!method_field('DELETE')!!}
                    {!! csrf_field() !!}
                    <input type="hidden" name="id-delete" id="id-delete">
                    <button class="btn btn-danger" type="submit">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal Client Delete-->

<script>
    $(document).ready(function(){
        $(".btnshowclient").on("click", function(){
            var id=$(this).attr("data-id");
            var url=$(this).attr("data-href");
            $.ajax({
                type: "get",
                url: url,
                data: "data",
                dataType: "json",
                success: function (data) {
                        $("#modalTxtNombre").html(data.nombre);
                        $("#modalTxtCif").val(data.cif);
                        $("#modalTxtDireccion").val(data.direccion);
                        $("#modalTxtCiudad").val(data.ciudad);
                        $("#modalTxtProvincia").val(data.estado);
                        $("#modalTxtCodigoPostal").val(data.cp);
                        $("#modalTxtEmail").val(data.email);
                        $("#modalTxtTelefono").val(data.telefono);
                        if(data.activo=="0"){
                            //console.log("el valor es="+data.activo);
                            $("#modalTxtActivo").val("Inactivo")
                            .addClass("lblinactivo");
                        }
                        if(data.activo=="1"){
                            //console.log("el valor es="+data.activo);
                            $("#modalTxtActivo").val("Activo")
                            .addClass("lblactivo");
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

    $(document).ready(function() {
        $(".btnDeleteCliente").click(function() {
            var id=$(this).attr('data-id')
            var nombre=$(this).attr('data-nombre')
            $('#modalDeleteClient').find('#deleteClientelbl').text(nombre)
            $('#modalDeleteClient').find('#id-delete').val(id)
        });
    });

</script>
