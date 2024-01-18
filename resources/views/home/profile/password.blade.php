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

                <!-- resources/views/editar-contrasena-form.blade.php -->

                <form action="{{ route('home.profile.editar-contrasena') }}" method="post">
                    @csrf

                    <div class="p-4" style="background-color: white">
                        <div class="col-12">

                            <p class="fs-6 fw-semibold text-dark">CAMBIAR CONTRASEÑA</p>

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <!-- Input para la contraseña actual -->
                                    <label for="contrasena_actual">Contraseña Actual:</label>
                                    <input type="password" name="contrasena_actual" id="contrasena_actual" class="form-control">
                                    <div id="mensaje-contrasena-actual"></div>
                                    @error('contrasena_actual')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <!-- Input para la nueva contraseña -->
                                    <label for="nueva_contrasena">Nueva Contraseña:</label>
                                    <input type="password" name="nueva_contrasena" class="form-control">
                                    @error('nueva_contrasena')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>






                            <!-- Botón para actualizar cambios -->
                            <button type="submit" class="btn btn-primary">Actualizar Cambios</button>

                            @if(session('mensaje'))
                            <div class="mensaje">{{ session('mensaje') }}</div>
                            @endif
                        </div>
                    </div>

                </form>




            </div>
        </div>
    </div>
</div>

<style>
    /* public/css/styles.css */

.error {
    color: red;
}

.mensaje {
    color: green;
}

</style>
@endsection


@section('extra-script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#contrasena_actual').on('input', function () {
            var contrasenaActual = $(this).val();

            // Realiza una petición AJAX para verificar la contraseña actual en tiempo real
            $.ajax({
                url: '{{ route("home.profile.verificar-contrasena") }}',
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    contrasena_actual: contrasenaActual
                },
                success: function (response) {
                    if (response.valid) {
                        $('#mensaje-contrasena-actual').html('<span style="color: green;">' + response.mensaje + '</span>');
                    } else {
                        $('#mensaje-contrasena-actual').html('<span style="color: red;">' + response.mensaje + '</span>');
                    }
                }
            });
        });
    });
</script>

@endsection
