@extends('home.common.masterpage')

@section('content')

<main>

    <!-- cart-area-start -->
    <section class="cart-area pb-120 pt-120">
        <div class="container">
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
                                                    <img src="" alt="" style="width: 45px; height: 45px"
                                                        class="rounded-circle imgPm" />
                                                </div>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->sale_price }}</td>
                                            <td>
                                                <input class="quantity-input" type="number" step="1" min="1" value="{{$item->pivot->quantity}}"
                                                data-url="{{route('home.wishlist.updateQuantity', $item)}}"
                                                name="quantity-{{$item->id}}">


                                            </td>

                                            <td class="total-price-container total-price" id='total-price'>
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

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
     <!-- cart-area-end -->

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
                                <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>
                                <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- cta-area-end -->

</main>

@endsection