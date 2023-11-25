<div class="modal-body">

    <div class="d-flex form-row">

        <div class="col-12">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputPassword">Nombre de usuario </label>
                    <div class="input-group">
                        <input name="nickname" type="text" class="form-control"
                            readonly="readonly">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputCompanyName">Nombre </label>
                    <input type="text" name="name" class="form-control name" readonly="readonly">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputCompanyName">Apellidos </label>
                    <input type="text" name="lastname" class="form-control lastname"
                        readonly="readonly">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputPhone">Género*</label>
                    <div class="input-group">
                        <select name="gender" class="form-control select2 genderSelect" readonly="readonly">
                            <option></option>
                            @foreach($genders as $key => $gender)
                            <option value="{{ $key }}"> {{ $gender }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputName">Fecha de nacimiento </label>
                    <div class="input-group">
                        <input type="text" name="birthdate" class="form-control datepicker not-user-allowed" readonly="readonly">
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
                    <label for="inputEmail">Email </label>
                    <div class="input-group">
                        <input name="email" type="email" class="form-control"
                            readonly="readonly">
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
                    <label>Tipo de documento </label>
                    <div class="input-group">
                        <select name="document_type" class="form-control select2 document_type_select" readonly="readonly">
                            <option></option>
                            @foreach ($document_types as $key => $type)
                            <option value="{{ $key }}"> {{ $type }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-7">
                    <label>Nro. de documento </label>
                    <div class="input-group">
                        <input type="text" name="document_number" class="form-control document_number"
                            readonly="readonly">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telephone">Teléfono </label>
                    <input type="text" name="phone" class="form-control"
                        placeholder="-" readonly="readonly">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPhone">Rol </label>
                    <div class="input-group">
                        <select name="role_id" class="form-control select2 roleSelect" readonly="readonly">
                            <option></option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="form-group">
        <label>Estado: </label>
        <span class="status-btn ms-3">
        </span>
    </div>

</div>
