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
                                                        <th class="product-thumbnail">N° de Pedido</th>
                                                        <th class="product-price">Fecha</th>                                         
                                                        <th class="product-subtotal">Hora</th>
                                                        <th class="product-subtotal">Total</th>
                                                        <th class="product-remove">Descargar</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($sales as $item)
                                                        <tr>
                                                            <td class="product-name"><a href="#">{{ $item->id }}</a></td>
                                                            <td class="product-price"><span class="amount">{{ $item->date }}</span></td> 
                                                            <td class="product-subtotal"><span class="amount">{{ $item->hour }}</span></td>
                                                            
                                                            @php
                                                                $totalPrice = 0;
                                                            @endphp
                                                            
                                                            @foreach ($item->details as $detail)
                                                                @php
                                                                    $totalPrice += $detail->pivot->quantity * $detail->sale_price;
                                                                @endphp
                                                            @endforeach
                                                    
                                                            <td class="product-subtotal"><span class="amount">S/ {{ $totalPrice }}</span></td>
                                                            <td>
                                                                <a href="{{route('home.record.pdf', $item) }}" class="btn btn-warning">
                                                                        PDF
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
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