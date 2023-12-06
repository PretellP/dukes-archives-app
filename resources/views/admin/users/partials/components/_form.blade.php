<div class="modal-body">

    <div class="d-flex form-row modal-multiple-columns">

        <div class="col-6">

            <input type="hidden" name="id">

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputCompanyName">Nombre *</label>
                    <input type="text" name="name" class="form-control name" placeholder="Ingrese los nombres">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputCompanyName">Apellidos *</label>
                    <input type="text" name="lastname" class="form-control lastname"
                        placeholder="Ingrese sus apellidos">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputPhone">Género *</label>
                    <div class="input-group">
                        <select name="gender" class="form-control select2 genderSelect">
                            <option></option>
                            @foreach($genders as $key => $gender)
                            <option value="{{ $key }}"> {{ $gender }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputName">Fecha de nacimiento *</label>
                    <div class="input-group">
                        <input type="text" name="birthdate" class="form-control datepicker">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail">Email *</label>
                    <div class="input-group">
                        <input name="email" type="email" class="form-control"
                            placeholder="Ingrese el correo del usuario">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-5">
                    <label>Tipo de documento *</label>
                    <div class="input-group">
                        <select name="document_type" class="form-control select2 document_type_select">
                            <option></option>
                            @foreach ($document_types as $key => $type)
                            <option value="{{ $key }}"> {{ $type }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-7">
                    <label>Nro. de documento *</label>
                    <div class="input-group">
                        <input type="text" name="document_number" class="form-control document_number"
                            placeholder="Ingrese número de documento">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-6">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telephone">Teléfono (opcional)</label>
                    <input type="text" name="phone" class="form-control"
                        placeholder="Ingrese teléfono" onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPhone">Rol *</label>
                    <div class="input-group">
                        <select name="role_id" class="form-control select2 roleSelect">
                            <option></option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputPassword">Nombre de usuario *</label>
                    <div class="input-group">
                        <input name="nickname" type="text" class="form-control"
                            placeholder="Ingrese el nombre de usuario">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputPassword" class="password_text">
                        Contraseña *
                    </label>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control"
                            placeholder="Ingrese la contraseña del usuario">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="form-group">
        <label class="custom-switch mt-2">
            <input type="checkbox" name="status" checked class="custom-switch-input user-status-checkbox">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description txt-status-user">Activo</span>
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
