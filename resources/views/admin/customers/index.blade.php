@extends('admin.common.layouts.masterpage')

@section('content')

<div class="row content">

    <div class="main-container-page">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>CLIENTES</h4>
                </div>
            </div>
        </div>

        <div class="card-body card z-index-2 principal-container container-dashboard">


            <table id="customers-table" class="table table-hover" data-url="">
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
                    </tr>
                </thead>
            </table>

        </div>

    </div>

</div>

@endsection

@section('modals')
@include('admin.users.partials.modals._view')
@endsection

@section('extra-script')
<script type="module" src="{{ asset('assets/admin/js/page/customers.js') }}"></script>
@endsection
