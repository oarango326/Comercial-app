<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Borrar Cobro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Esta Seguro que desea borrar este registro:</p>
                <label id="deletereglbl"></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{route('cobros.destroy', 'NA')}}" style="display:inline" method="POST">
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
    $(document).ready(function() {
        $(".btnDelete").click(function() {
            var id=$(this).attr('data-id')
            var nombre=$(this).attr('data-nombre')
            $('#modalDelete').find('#deletereglbl').text(nombre)
            $('#modalDelete').find('#id-delete').val(id)
        });
    });
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

</script>
