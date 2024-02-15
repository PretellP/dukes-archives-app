@extends('admin.common.layouts.masterpage')

@section('content')

<div class="row content">

    <div class="main-container-page">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>VENTAS</h4>
                </div>
            </div>
        </div>

        <div class="card-body card z-index-2 principal-container container-dashboard">

            <form action="{{ route('admin.sales.exportExcel') }}" id="form-users-export" method="GET">

                <div class="mb-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-download"></i> &nbsp; Descargar Excel
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>

            <table id="sales-table" class="table table-hover" data-url="{{route('admin.sales.index')}}">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cant. Productos</th>
                        <th>Monto de venta</th>
                        <th>Ganancia total</th>
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
<script type="module" src="{{ asset('assets/admin/js/page/sales.js') }}"></script>
@endsection
