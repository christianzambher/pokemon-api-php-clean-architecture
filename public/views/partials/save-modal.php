<div class="modal fade" id="modalGuardarDatos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar datos</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="txtNumPokemon">
                    <label for="txtNombrePoke">Nombre</label>
                    <input type="text" class="form-control" id="txtNombrePoke">

                    <label for="txtExpBase">Experiencia base</label>
                    <input type="number" class="form-control" id="txtExpBase">

                    <label for="txtHabilidad1">Habilidad</label>
                    <input type="text" class="form-control" id="txtHabilidad1">

                    <label for="txtHabilidad2">Habilidad</label>
                    <input type="text" class="form-control" id="txtHabilidad2">

                    <input type="hidden" id="txtspriteDesc1">
                    <input type="hidden" id="txtspriteUrl1">
                    <input type="hidden" id="txtspriteDesc2">
                    <input type="hidden" id="txtspriteUrl2">
                    <input type="hidden" id="txtspriteDesc3">
                    <input type="hidden" id="txtspriteUrl3">
                    <input type="hidden" id="txtspriteDesc4">
                    <input type="hidden" id="txtspriteUrl4">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelarGuardado">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarDatos">Guardar</button>
            </div>
        </div>
    </div>
</div>