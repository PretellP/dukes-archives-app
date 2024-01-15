@extends('home.common.masterpage')
@section('content')
    <div class="container mx-auto d-flex justify-content-center p-5 m-5">

        <div class="col-5 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Información del Perfil</h4> 
                    <div class="d-flex form-row">

                        <div class="col-12">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword">Nombre de usuario </label>
                                    <div class="input-group">
                                        <input name="nickname" type="text" class="form-control" readonly="readonly"
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
                                    <input type="text" name="name" class="form-control name" readonly="readonly"
                                        value="{{ Auth::user()->name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCompanyName">Apellidos </label>
                                    <input type="text" name="lastname" class="form-control lastname" readonly="readonly"
                                        value="{{ Auth::user()->lastname }}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="inputPhone">Género</label>
                                    <input type="text" name="phone" class="form-control" placeholder="-"
                                        readonly="readonly" value="{{ Auth::user()->gender_name }}">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputName">Fecha de nacimiento </label>
                                    <div class="input-group">
                                        <input type="text" name="birthdate"
                                            class="form-control datepicker not-user-allowed" readonly="readonly"
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
                                        <input name="email" type="email" class="form-control" readonly="readonly"
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
                                        readonly="readonly" value="{{ Auth::user()->document_type_name }}">
                                </div>


                                <div class="form-group col-md-7">
                                    <label>Nro. de documento </label>
                                    <div class="input-group">
                                        <input type="text" name="document_number" class="form-control document_number"
                                            value="{{ Auth::user()->document_number }}" readonly="readonly">
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
                                    <label for="telephone">Teléfono </label>
                                    <input type="text" name="phone" class="form-control" placeholder="-"
                                        readonly="readonly" value="{{ Auth::user()->phone }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPhone">Rol </label>
                                    <input type="text" name="phone" class="form-control" placeholder="-"
                                        readonly="readonly" value="{{ Auth::user()->role->name }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
                
                @include('home.profile.edit')
    
                    <button type="button" class="btn btn-warning  btn-lg w-50" data-toggle="modal"
                        data-target="#editProfile">
                        <span class="fas fa-pen"></span>
                    </button>

            </div>


            




        </div>
        
    </div>


@section('extra-script')
    <!-- Popper.js, necesario para Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
@endsection
