<!--EDITAR USUARIO-->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="EditarUsuario" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITAR PERFIL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="alertEdit" action="{{ route('home.profile.update', Auth::user()) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">


                    <div class="d-flex form-row">

                        <div class="col-12">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword">Nombre de usuario </label>
                                    <div class="input-group">
                                        <input name="nickname" type="text" class="form-control"
                                            value="{{ Auth::user()->nickname }}">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="inputCompanyName">Nombre </label>
                                    <input type="text" name="name" class="form-control" 
                                        value="{{ Auth::user()->name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCompanyName">Apellidos </label>
                                    <input type="text" name="lastname" class="form-control lastname"
                                        value="{{ Auth::user()->lastname }}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="inputPhone">Género</label>
                                    <div class="input-group">
                                        <select name="gender" class="form-control select2 genderSelect">

                                            @foreach ($genders as $key => $gender)
                                                <option value="{{ $key }}"
                                                    @if (Auth::user()->gender == $key) selected @endif>
                                                    {{ $gender }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputName">Fecha de nacimiento </label>
                                    <div class="input-group">
                                        <input type="text" name="birthdate"
                                            class="form-control datepicker not-user-allowed"
                                            value="{{ Auth::user()->birthdate }}">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-solid fa-calendar-days"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail">Email </label>
                                    <div class="input-group">
                                        <input name="email" type="email" class="form-control"
                                            value="{{ Auth::user()->email }}">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-5">
                                    <label>Tipo de documento </label>
                                    <input type="text" name="phone" class="form-control" placeholder="-"
                                        readonly="readonly" value="{{ Auth::user()->document_type_name }}" >
                                </div>

                                <div class="form-group col-md-7">
                                    <label>Nro. de documento </label>
                                    <div class="input-group">
                                        <input type="text" name="document_number"
                                            class="form-control document_number"
                                            value="{{ Auth::user()->document_number }}" readonly="readonly" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-solid fa-id-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Teléfono </label>
                                    <input type="text" name="phone" class="form-control" placeholder="-"
                                         value="{{ Auth::user()->phone }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="role">Rol </label>
                                    <input type="text" name="role" class="form-control" placeholder="-"
                                        readonly="readonly" value="{{ Auth::user()->role->name }}" >
                                </div>
                            </div>

                        </div>

                    </div>



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" data-toggle="modal" class="btn btn-warning" value="Update">Guardar
                        Cambios</button>
                </div>
                </div>
        
            </form>
    </div>
</div>
</div>
