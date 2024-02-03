@extends('home.common.masterpage')

@section('extra-head')

    
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/common/css/fonts.css') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/common/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<main style="background-color: rgb(241, 241, 241)">
    <!-- page-banner-area-start -->
    
        <!-- <div class="container pt-60">
            <div class="row">
                <div class="col-9 p-3" style="background: white">
                    <h3 style="font-weight: bold">Carrito de compras</h4>
                    
                </div>
            </div>
        </div>-->
    
    <!-- page-banner-area-end -->

    <!-- cart-area-start -->
    <!--<section class="cart-area pt-60 pb-120">
        <div class="container">
           <div class="row">
              <div class="col-12">
                    <form action="#">
                       <div class="table-content table-responsive">
                          <table class="table" style="border: none">
                                <thead>
                                   <tr>
                                      <th class="product-thumbnail">Producto</th>
                                      <th class="cart-product-name"></th>
                                      <th class="product-quantity">Quantity</th>
                                      <th class="product-subtotal">Total</th>
                                      <th class="product-remove">Remove</th>
                                   </tr>
                                </thead>
                                <tbody>
                                   <tr>

                                      <td class="product-thumbnail ">
                                        <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788416604500_sn4ssnorvcune4rb.jpg" style="object-fit: cover;" alt="">                                      </td>
                                      <td class="product-name" colspan='1'>
                                        <div class="row justify-content-start">
                                            <div class="col-12  d-flex flex-start" >
                                              This text is quite long, and will be truncated once displayed.This text is quite long, and will be truncated once displayed.
                                            </div>
                                            <div class="col-12 d-flex flex-start">$130.00</div>
                                        </div> 
                                      </td>
                                      
                                      <td class="product-quantity">
                                            <div class="cart-plus-minus"><input type="text" value="1"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                      </td>
                                      <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                      <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                   </tr>
                                   
                                </tbody>
                          </table>
                       </div>
                       
                       <div class="row justify-content-end">
                          <div class="col-md-5">
                                <div class="cart-page-total">
                                   <h2>Cart totals</h2>
                                   <ul class="mb-20">
                                      <li>Subtotal <span>$250.00</span></li>
                                      <li>Total <span>$250.00</span></li>
                                   </ul>
                                   <a class="tp-btn-h1" href="checkout.html">Proceed to checkout</a>
                                </div>
                          </div>
                       </div>
                    </form>
              </div>
           </div>
        </div>
    </section>-->
    
    <div class="container border pt-50 pb-50">
        <div class="row cart">
            <div class="col-9" >
                <div class="row me-1 d-flex flex-column gap-1">
                    <div class="col-12 border-bottom" style="background: white">
                        <div>
                            <h3 class="pt-4 pb-3" style="font-weight: bold">Carrito de compras</h3>
                            <a href="{{ route('home.cart.cancelando')}}" class="h6 text-primary">Vaciar carrito de compras</a> 
                        </div>
                        <p class="p-0 m-0" style="float: right">Subtotal</p>
                    </div>


                    @php
					$a=0;
					@endphp
                    <div class="col-12" style="background: white">
                        @if ($shoppingCart->isEmpty())
                        <div class="d-flex justify-content-center pt-40 pb-40">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAwFBMVEX///8AAAD09PSGhobc3NwwMDClpaX/kwD/jgD/kQD7+/v/lADi4uLW1tbw8PDe3t6srKyampooKChubm5/f39YWFg2NjbKyso+Pj4fHx/p6elgYGD/iwC2trb/+/e9vb13d3cVFRX/4MP/8uWRkZFMTExDQ0P/5s4LCwuMjIz/7Nv/sF//pDr/wIPGxsb/mhH/tW3/zZ7/nir/1a//xI3/qEr/uHloaGj/y5r/27r/1Kr/ni7/wYb/tGX/gQD/pkZuwLUFAAAIY0lEQVR4nO2daXuiOhSAcYW473Vfa21dprYqVacz/f//ahAVcMkGIeA85/1y7XjqPW8hIYnkoCgAAAAAAAAAAAAAAACATSpqkgo6D3/IF8ovrxGTRrXSiwadj2Dyz5Frasn/SDJbvfEzqTSDzkwMOYzfgbegkxNBEe934FfQ+XklOiYLPvxhzAxogpFINegkvRCn+xmUHvf6mGESjETqQSfqltytS6NV/hq//jcnau3qSBWz53eeYoPL92JB5umayoXD+Ony3U7p4u2n+58RarIXBr3bgIsL5eABexvnOVq/m3/W2SArsvPzTMGR/RcmJuc8UzNS0xOAI/kxNijqMOxLS00MPUcTI4Q5hwQPNplyDEezpDhHd1OUlZsQHKdfnxyZsLsjGYkJw9HPUGa5jtP5ofqaLyvtMi3UNizIyEwQqYaVNnWwYq/g4C4qYcQx5qbG2t1pQkJmoniysm5RY1MDKzgnITVB2B3NMz345RG7mqSVdIceXLaC4/5nJgrb8M6c4prKYxsSBzRHio9tyJA0V3BYAEP3wWEBDN0HhwUwdB8cFsDQfXBYAEP3wWHBTjovOFgSqXycSObNSrpHCeUKlnbrRuz2C0BJfElZBYjW6Jn4h4zDSL25wlckrFY90bPwFf/vv4kFbOj/9+FgCIZgGCbDBB77i5kSIYonOBBDQpC9qs+wUM8UHIgh4Xt34XOLKBgKBAxNwJA7GAxFAoYmYMgdDIYiAUMTMOQOBkORgKHJ/28ofAYcOkPr7kuWO5tZgkNnqHTYDyFTcPgMld5hv8UL4+2U9OAQGipKPs5xuygtOJSGQgFDkYChP4ChSMDQH8BQJGDoD2AoEjD0BzAUCRj6AxiKBAz9AQxFAob+AIYiAUN/AEORgKE/gKFIwNAfwFAkYOig2a8+M5S0zPSr1GJ04TQ0a+zSb8aIs4SF0/C415RaKOpYQpJyFO8bpnK5nPi6p8yGpwqtr5QUTmElctQ9Q6s20UslyVDKiBlmw/PNXJQ7Ms55kjf43jO0K2hFhBZ4ZTY8F7iibGvtn8LItflsQ7swXyqez2Qy+WznuSy0sjuzYYzN8PyHIJ9njlqad4+WyNbIbHi+IY+yv/x8MpN32jsMk5wJc8Ns2DxG0baX549hlMuFZRijNOtovea112G/WrTMKGrRvSpL2MmwTx9leO912A3N4gvU8qVKtMSQlGlYZzk68RfjvPFUeYFj1JYqvLHUBzDCqEVOD3UOWLvLZ2rPTCaQkXeO2tk6OQwiPNSzDWZuMa7xVDU5tA/3isEYcpIae1B8CEOzh2YoLHqXBzFU6q4vGo9iGE26vWSEyHC6Xc6W26noj/VomEqJGiR3Z5qGENK0WVfQJ57wYBhPfo1Lg0Gi2u8w9/0t3OS/+xupWrvdRip6F6vo1jB3+fS8OkORaIM3bPmNjaG27SqjtaaiH65MaLgzTL1FrmkwODaxCzhDLa0NzVc749WOIxUqrgyzgxtBgyr1E/rYx3/MEVqeXi4QmrOnQseN4XktptzJGg2w+ZQ8V0SjjDWb2PnuqJ1uTx2vR5hPSLkoxejC8PgrjYKjF22ePoY89yhiW+HKaH3WD++qtsfEvbGUvb+C3/C4Xni9kts0jyP5MU/41VYdoZn1w9I+Y6/B/43w8BuaNezuTNjMc5dk+Au/yDNDaG39sEZog4nLuRieujhLW5HS3bqdBcoEoI9/jtIcaR/WD3tN/cQFVhlWGa5w09PgjkSU/BEN/B/g09n0dpqKveh3yKfJPeSNS7OEJUajc7GvgUNNVXGGOZ7FgSPyDJP4lciuqp6u9wdIhsYsivc5UjKPIXbxt8t8DI3GzPv4yHDMnpjbodEQKV9r3RAOw7nTkNSXHloz51Q4HIYX18Mt/nporiVzlpgOh6HuHMbo+DGNchgYcS4Ph8PQGJe+Wz8YjfIDH1qpcxaQDofh1DGf6DrmGSIIh6Fxybca4ho5jqcAQmK40tJoYr6aojTpJOVHnmGTOKD8RKq6Mv67UlWEv1a4QZphhjy1G6WRqmmfyJgKp3EzfHdIM4xTJq+j+WG5FCHtt1hBqceQ8p39UJ+/z/UhOYgfaYapgYQK8/eQ19Pwz3vuwr3aJs+wIuTBpH2WRzBeIM+wI+SB64SlEAwSr4f8CxC35Pkf+iFxTFN3sZx7TTFS4/0ViYbP3NPzWxL8fyWJhhlvd/4cyLp4xJLMkXeNfzn3ir6L00Cm4S+vj+rOMT2u9wqps6eLq8V0oa+634vvkbKYrZSt8WK0UPZ7Zb/5GC2/Fx9dfTZUhn90x7JbzM0FJ7j54RCt/k601Wap/0za05/l8mfaVv4sd9pkMxmq+nTzZ9fu/l3oE+s38F8hkwjScI5G6hxN5ntlvtp8TNShpiz175liHLX3vWLMiNFwMnMsFX9hv0ImEZzhDk273fY0/bH42bWn89nsZ/R39Xs91HbtiZLeK5vZ3nh3Ndet3xi4aIVBGk63itJddydrZavvlP1621V2+tqY5evGXH87Md4zTlDjX+x2mHcjGJZ1Gh8BQ/H0al5HNnzIN6xIfnynfMNcQ8Q0ip0A2mHulXcInvGyHSGInib6ynfbdoe2yYhIMLsRapFInznaaLg1D+sftqH43Zt4DntmSmy1pTMJlnsCCdiGlZg8jnv4GPYAm7d5elv8sA0DgNaBpApGi0147HgDNaTsXSseHjToeRk5UEPDkdAYDxuDK96fiRyw4XGfSK6QvXM0O4OKiAciP9OT8BVzj95h82aiVY4Vk8VYWfR4JxOwoenTSzj+hfeuLioV7P9cBq1TFtGnQrHfGr+MW8KP4Xl/bzAk5AykOi8B+TW8f4/BSjQYZI4TAQAAAAAAAAAAAAAAAuEfmgOHw23OGgEAAAAASUVORK5CYII=" alt="">
                        </div>
                        @else
                            @foreach ($shoppingCart as $item)
                            <div class="row border-bottom">
                                <div class="col-2">
                                    <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788416604500_sn4ssnorvcune4rb.jpg" style="object-fit: cover;height:200px" alt="">    
                                </div>
                                <div class="col-8 pt-20 d-flex flex-column align-items-start gap-3">
                                    <div class="name" >
                                        {{ $item->name }}                                
                                    </div>
                                    <div class="price">S/.{{ $item->sale_price}}</div>
                                    <div class="cart-plus-minus">
                                        <input id='quantity-input_{{ $item->pivot->product_id }}'
                                                                        data-productid="{{ $item->pivot->product_id }}"
                                                                        data-url="{{ route('home.cart.updateQuantity', ["product" => $item]) }}"
                                                                        class="quantity-input" type="number"
                                                                        value="{{ $item->pivot->quantity }}">
                                    </div>
                                    
                                
                                </div>
                                <div class="col-2 pt-20 d-flex flex-column align-items-end align-content-around">
                                    <div class="total-price subtotal" 
                                    data-productid="{{ $item->id }}">
                                        @php
                                        $totalPrice = $item->sale_price * $item->pivot->quantity;
                                        @endphp
                                        S/.{{ $totalPrice }}
                                        <input id='total-input_{{ $item->pivot->product_id }}' type="hidden"
                                            value='{{ $totalPrice }}'>
                                    </div>
                                    <div class="mt-100">
                                        <a href="{{ route('home.cart.eliminarProducto', $item)}}"
                                        class='text-decoration-none text-light'>
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-productid="{{ $item->pivot->product_id }}">
                                            <i class="bi bi-trash3 "></i>
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @php
                                $a=$a+$totalPrice
                            @endphp
                            @endforeach
                        @endif
                        
                        
                       
                    </div>
                </div>
            </div>
            <div class="col-3" >
                <div class="row pt-4 pb-4 p-2" style="background: white">
                    <h3> Resumen </h3>
                    <div class="d-flex justify-content-between">
                        <h5>Subtotal: </h5>
                        <p>S/{{$a}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>algo random: </h6>
                        <p>S/dinero</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5>Total: </h5>
                        <h3>S/{{$a}}</h3>
                    </div>
                    <a href="{{ route('home.cart.goCheckout')}}" class="text-decoration-none">
                        <button type="button" class="btn btn-primary w-100">
                            Proceder al pago
                        </button>
                    </a>
                </div>
            </div>
        </div>
        
    </div>


    <!-- cta-area-start -->
    <section class="cta-area d-ldark-bg pt-55 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item cta-item-d mb-30">
                        <h5 class="cta-title">Follow Us</h5>
                        <p>We make consolidating, marketing and tracking your social media website easy.</p>
                        <div class="cta-social">
                            <div class="social-icon">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item mb-30">
                        <h5 class="cta-title">Sign Up To Newsletter</h5>
                        <p>Join 60.000+ subscribers and get a new discount coupon  on every Saturday.</p>
                        <div class="subscribe__form">
                            <form action="#">
                                <input type="email" placeholder="Enter your email here...">
                                <button>subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item mb-30">
                        <h5 class="cta-title">Download App</h5>
                        <p>DukaMarket App is now available on App Store & Google Play. Get it now.</p>
                        <div class="cta-apps">
                            <div class="apps-store">
                                <a href="#"><img src="" alt=""></a>
                                <a href="#"><img src="" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- cta-area-end -->

</main>

<style>
    table{
    table-layout: fixed;
    width: 100%;
    }

    th, td {
        
        width: 20%;
        
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        
    }


  
 

  .cart .cart-plus-minus{
    float: left;
    /*margin: 0 auto;*/
    position: relative;
  }
  
</style>
@endsection

@section('extra-script')




@endsection