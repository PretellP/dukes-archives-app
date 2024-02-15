@extends('home.common.masterpage')

@section('extra-head')

<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common/css/fonts.css') }}">
<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/common/modules/bootstrap/css/bootstrap.min.css') }}">

{{-- Date range picker --}}
<link rel="stylesheet" href="{{ asset('assets/common/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common//modules/izitoast/css/iziToast.min.css') }}">

{{-- DropZone --}}

<link rel="stylesheet" href="{{ asset('assets/common/css/components.css') }}">

@endsection

@section('content')

<div class="pt-4 pb-4" style="background-color: rgb(216, 215, 215)">

    <div class="container">

        <div class="row">


            @include('home.profile.menu')


            <div class="col-md-9 col-9 p-1">

                <form action="{{ route('home.profile.validateEdit', ['column' => Auth::user()]) }}" class="userForm" id="editUserForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="p-4" style="background-color: white">

                        <div class="col-12">

                            <p class="fs-6 fw-semibold text-dark">PERFIL</p>

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
                                    <input type="text" name="name" class="form-control name"
                                        value="{{ Auth::user()->name }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputCompanyName">Apellidos *</label>
                                    <input type="text" name="lastname" class="form-control lastname"
                                        placeholder="Ingrese sus apellidos" value="{{ Auth::user()->lastname }}">
                                </div>


                            </div>

                            <div class="form-row">

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

                            <div class="form-row">
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

                            <div class="form-row">

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

                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>

                        </div>


                    </div>


                </form>

            </div>

        </div>

    </div>

</div>

@endsection


@section('extra-script')
<script type="module" src="{{asset('assets/customer/js/page/users.js')}}"></script>
@endsection
