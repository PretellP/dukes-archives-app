<div class="modal-body">

    <div class="form-row">

        <div class="form-group col-12">
            <label for="inputCompanyName">Nombre *</label>
            <input type="text" name="name" class="form-control name" placeholder="Ingrese el nombre de la categoría">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-12">
            <label for="inputCompanyName">Descripción * (Max: 600 caracteres)</label>
            <textarea name="description" cols="30" rows="3" class="form-control"
                placeholder="Ingrese una descripción"></textarea>
        </div>

    </div>


    <div class="form-group">
        <label class="custom-switch mt-2">
            <input type="checkbox" name="status" checked class="custom-switch-input label-status-checkbox">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description txt-status-label">Activo</span>
        </label>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary btn-save">
        Guardar
        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
    </button>
</div>
