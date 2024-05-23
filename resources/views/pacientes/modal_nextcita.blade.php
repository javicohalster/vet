<!-- notice modal -->
<div class="modal fade" id="modal_siguiente_cita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>SIGUIENTE CITA </h6>
            </div>
            <div class="modal-body-add">
                @include('pacientes.list_pacientes_prox')
            </div>
            <div class="modal-footer text-center">
                <!--<a href="#" id="add_paciente" class="btn btn-info pull-right">Agregar</a>-->
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->