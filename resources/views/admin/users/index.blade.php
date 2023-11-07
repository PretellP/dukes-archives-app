@extends('admin.common.layouts.masterpage')

@section('content')

<div class="row content">

    <div class="main-container-page">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>USUARIOS</h4>
                </div>
            </div>
        </div>

        <div class="card-body card z-index-2 principal-container container-dashboard">

            <div class="mb-4">
                <button class="btn btn-primary" id="btn-register-user-modal" data-url=''
                    data-toggle='modal' data-target='#RegisterUserModal'>
                    <i class="fa-solid fa-user-plus"></i> &nbsp; Registrar
                </button>
            </div>

            <table id="users-table" class="table table-hover" data-url="{{route('admin.users.index')}}">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Fecha de nacimiento</th>
                        <th>Tipo de documento</th>
                        <th>Nro. documento</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
            </table>
            
        </div>

    </div>

</div>

@endsection

@section('modals')
@include('admin.users.partials.modals._register')
@include('admin.users.partials.modals._edit')
@endsection

@section('extra-script')
<script type="module" src="{{ asset('assets/admin/js/page/users.js') }}"></script>
@endsection