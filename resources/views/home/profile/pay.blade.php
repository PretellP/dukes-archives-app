@extends('home.common.masterpage')
@section('extra-head')
<link rel="stylesheet" href="{{ asset('assets/common/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common/css/fonts.css') }}">
<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/common/modules/bootstrap/css/bootstrap.min.css') }}">

	

	
@endsection

@section('content')
<div class="pt-4 pb-4" style="background-color: rgb(216, 215, 215)">
    <div class="container">
        <div class="row">
            

            @include('home.profile.menu')


            <div class="col-md-9 col-9 p-1">
                <form action="">
                    <div class="p-4" style="background-color: white">
                        <div class="col-12">

                            <p class="fs-6 fw-semibold text-dark">CONFIGURAR MI MÉTODO DE PAGO</p>
                
                        </div>
                        
                        
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</div>
      
@endsection


@section('extra-script')
<script type="module" src="{{ asset('assets/admin/js/page/users.js') }}"></script>
@endsection