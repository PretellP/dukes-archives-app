@extends('admin.common.layouts.masterpage')

@section('content')

<div class="row content">

    <div class="main-container-page">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>CATEGORÍAS</h4>
                </div>
            </div>
        </div>

        <div class="card-body card z-index-2 principal-container container-dashboard">

            <div class="mb-4">
                <button class="btn btn-primary" id="btn-register-label-modal"
                    data-toggle='modal' data-target='#RegisterLabelModal'>
                    <i class="fa-solid fa-square-plus"></i> &nbsp; Registrar
                </button>
            </div>

            <table id="labels-table" class="table table-hover" data-url="">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Creado el</th>
                        <th>Actualizado el</th>
                        <th>Acción</th>
                    </tr>
                </thead>
            </table>
            
        </div>

    </div>

</div>

@endsection

@section('modals')
@include('admin.labels.partials.modals._register')
@include('admin.labels.partials.modals._edit')
@include('admin.labels.partials.modals._view')
@endsection

@section('extra-script')
<script type="module" src="{{ asset('assets/admin/js/page/labels.js') }}"></script>
@endsection