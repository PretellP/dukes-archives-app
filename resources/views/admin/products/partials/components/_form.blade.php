<div class="modal-body">

    <div class="d-flex form-row modal-multiple-columns">

        <div class="col-6">

            <div class="form-row">

                <div class="form-group col-12">
                    <label>Nombre *</label>
                    <input type="text" name="name" class="form-control name" placeholder="Ingrese el nombre de la categoría">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-12">
                    <label>Descripción * (Max: 600 caracteres)</label>
                    <textarea name="description" cols="30" rows="3" class="form-control"
                        placeholder="Ingrese una descripción"></textarea>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-12">
                    <label>Autor *</label>
                    <input type="text" name="author" class="form-control author" placeholder="Ingrese el autor">
                </div>

            </div>

            <div class="form-group">
                <label>Categoría(s) *</label>
                <div class="input-group">
                    <select name="categories[]" class="form-control select2 cotegories_select" multiple>
                        <option></option>
                        @foreach ($labels as $label)
                        <option value="{{ $label->id }}"> {{ $label->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label>Precio de compra (S/.) *</label>
                    <div class="input-group">
                        <input type="text" name="purchase_price" class="form-control purchase_price"
                            placeholder="Ingrese precio de compra">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label>Precio de venta (S/.) *</label>
                    <div class="input-group">
                        <input type="text" name="sale_price" class="form-control sale_price"
                            placeholder="Ingrese precio de venta">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-money-bill-trend-up"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-6">

            <div class="form-row">

                <div class="form-group col-12">
                    <label>Stock (opcional)</label>
                    <div class="input-group">
                        <input type="text" name="stock" class="form-control stock" placeholder="Ingrese el stock">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-12">

                    <label> Imagen * </label>
                    <input type="file" class="product-image-input">

                </div>

            </div>

        </div>

    </div>


    <div class="form-group">
        <label class="custom-switch mt-2">
            <input type="checkbox" name="status" checked class="custom-switch-input product-status-checkbox">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description txt-status-product">Activo</span>
        </label>
    </div>



</div>
