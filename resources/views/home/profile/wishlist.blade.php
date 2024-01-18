@extends('home.common.masterpage')
@section('extra-head')
<link rel="stylesheet" href="{{ asset('assets/common/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common/css/fonts.css') }}">
<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/common/modules/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
	

	
@endsection

@section('content')
<div class="pt-4 pb-4" style="background-color: rgb(216, 215, 215)">
    <div class="container">
        <div class="row">
            

            @include('home.profile.menu')


            <div class="col-md-9 col-9 p-1">
                
                <div class="p-4" style="background-color: white">
                    <div class="col-12 d-flex justify-content-between border-bottom pb-4">

                        <p class="fs-6 fw-semibold text-dark">LISTA DE DESEOS</p>

                        <button class="btn btn-primary">
                            Añadir todo al carrito
                        </button>
            
                    </div>
                    
                    <!-- cart-area-start -->
                    <section class="cart-area pt-4 pb-4">
                            <div class="row">
                                <div class="col-12">
                                    <form action="#">
                                        <div class="table-content table-responsive">
                                            <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="product-thumbnail">Images</th>
                                                        <th class="cart-product-name">Product</th>
                                                        <th class="product-price">Unit Price</th>
                                                        <th class="product-quantity">Quantity</th>
                                                        <th class="product-subtotal">Total</th>
                                                        <th class="product-remove">Remove</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($desired as $item)
                                                            <tr>
                                                                
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <img src="{{ verifyImage($item->files->first()) }}" alt="" style="width: 45px; height: 45px"
                                                                            class="rounded-circle imgPm" />
                                                                    </div>
                                                                </td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->sale_price }}</td>
                                                                <td>
                                                                    <input class="quantity-input_{{$item->pivot->product_id}}" 
                                                                        type="number" 
                                                                        value="{{ $item->pivot->quantity }}"                               
                                                                        data-product-id="{{ $item->pivot->product_id }}">
                                                                </td>
                                                                <td class="subtotal" data-product-id="{{ $item->pivot->product_id }}">
                                                                    @php
                                                                    $totalPrice = $item->sale_price * $item->pivot->quantity
                                                                    @endphp
                                                                    {{$totalPrice}}
                                                                    <input id='' type="hidden" value='{{$totalPrice}}'>
                                                                </td>
                                            
                                                                <!--BOTONES CRUD-->
                                                                <td>
                                                                    <a href="{{route('home.wishlist.eliminarProducto', $item)}}"
                                                                        class='text-decoration-none text-light'>
                                                                        <button type="button" class="btn btn-danger btn-sm">
                                                                            <i class="bi bi-trash3 "></i>
                                                                        </button>
                                                                    </a>
                                                                </td>
                                            
                                                                
                                            
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <tr>
                                                                <td id="total" colspan="2"> Total </td>
                                                                <td id="total-value">
                                                                   
                                                                    @php
                                                                        $totalPrice = $item->sale_price * $item->pivot->quantity
                                                                    @endphp
                                                                    {{$totalPrice}}
                                                                    <input id='' type="hidden" value='{{$totalPrice}}'>

                                                                </td>
                                                            </tr>
                                                            
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </section>
                    <!-- cart-area-end -->
                    
                </div>
            
        </div>
        </div>
    </div>
</div>
      


@endsection

@section('extra-script')
<script src="{{asset('assets/customer/js/desiredProducts.js')}}"></script>
@endsection
