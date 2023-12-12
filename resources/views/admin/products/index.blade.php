@extends('admin.common.layouts.masterpage')

@section('content')

<div class="row content">

    <div class="main-container-page">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>PRODUCTOS</h4>
                </div>
            </div>
        </div>

        <div class="card-body card z-index-2 principal-container container-dashboard">

            <div class="mb-4">
                <button class="btn btn-primary" id="btn-register-product-modal" data-url=''
                    data-toggle='modal' data-target='#RegisterProductModal'>
                    <i class="fa-solid fa-square-plus"></i>  &nbsp; Registrar
                </button>
            </div>

            <table id="products-table" class="table table-hover" data-url="{{route('admin.products.index')}}">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Autor</th>
                        <th>Categorías</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
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

@include('admin.products.partials.modals._register')

@endsection

@section('extra-script')
<script type="module" src="{{ asset('assets/admin/js/page/products.js') }}"></script>
@endsection
