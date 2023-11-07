@extends('admin.common.layouts.masterpage')

@section('content')
<div class="row content">

    <div class="main-container-page">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>INICIO</h4>
                </div>
            </div>
        </div>

        <div class="card-body card z-index-2 principal-container container-dashboard">


        </div>

    </div>

</div>
@endsection

@section('extra-script')

<script type="module" src="{{ asset('assets/admin/js/page/dashboard.js') }}"></script>

@endsection