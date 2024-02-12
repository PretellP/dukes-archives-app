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
                
                    <div class="p-4" style="background-color: white">
                        <div class="col-12  border-bottom pb-4">

                            <p class="fs-6 fw-semibold text-dark">MIS COMPRAS</p>
                
                        </div>
                        

                         <!-- orders -->
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
                                                    <tr>
                                                        <td class="product-thumbnail"><a href="#"><img src="assets/img/cart/shop-p-10.jpg" alt=""></a></td>
                                                        <td class="product-name"><a href="#">Jacket light</a></td>
                                                        <td class="product-price"><span class="amount">$130.00</span></td>
                                                        <td class="product-quantity">
                                                                <div class="cart-plus-minus"><input type="text" value="1"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                                        </td>
                                                        <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                                        <td class="btn btn"><a href="#"><i class="fa fa-times"></i></a></td>
                                                    </tr>
                                                    
                                                    </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!-- orders-->
                        
                    </div>

                    
                
            </div>
        </div>
    </div>
</div>
      
@endsection


@section('extra-script')
<script type="module" src="{{ asset('assets/admin/js/page/users.js') }}"></script>
@endsection