@extends('home.common.masterpage')

@section('content')
    <main class="p-4">
        <!-- shop-area-start -->
        <div class="shop-area mb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Product categories</h5>
                            <div class="widget-category-list mt-20">

                                    @foreach ($labels as $label)

                                    <div class="single-widget-category">
                                        <input type="checkbox" id="cat-item-{{ $loop->iteration }}" name="cat-item" data-filter=".{{ str_replace(' ', '-', mb_strtolower($label->name ?? '', 'UTF-8')) }}">
                                        <label for="cat-item-{{ $loop->iteration }}"> {{ ucwords(mb_strtolower($label->name ?? '', 'UTF-8')) }} </label>
                                    </div>

                                    @endforeach

                                    <div class="single-widget-category">
                                        <input type="checkbox" id="cat-item-all" name="cat-item" data-filter="*">
                                        <label for="cat-item-all"> Todo </label>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="tab-content" id="productGridTabContent">
                            <div class="tab-pane fade  show active" id="FourCol" role="tabpanel"
                                aria-labelledby="FourCol-tab">
                                <div class="tp-wrapper">
                                    <div class="row g-0 products_container">

                                        @foreach ($products as $product)

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 p-4 product-item {{ implode(' ', ($product->labels->map(function ($label) { return str_replace(' ', '-', mb_strtolower($label->name ?? '', 'UTF-8')); })->toArray())) }}">

                                                <div class="product__item product__item-d">

                                                    <div class="product__thumb fix">
                                                        <div class="product-image w-img">
                                                            <a>
                                                                <img src="{{ verifyImage($product->files->first()) }}"
                                                                    alt="product" class="img-shop">
                                                            </a>
                                                        </div>
                                                        <div class="product-action">

                                                                <a href="{{ route('home.product-details.index', $product) }}" class="icon-box icon-box-1">
                                                                    <i class="fa fa-eye"></i>
                                                                    <i class="fa fa-eye"></i>
                                                                </a>


                                                            <a href="{{route('home.wishlist.agregarProducto', $product)}}" class="icon-box icon-box-1">
                                                                <i class="fa fa-heart"></i>
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product__content-3">

                                                            <h6 class="product-category pt-2">
                                                                <a>{{ restrictMaxLengthText($product->labels->first()->description, 45) }}</a>
                                                            </h6>


                                                        <h6><a href="#">{{ $product->name }}</a></h6>
                                                       
                                                        <div class="price mb-10">
                                                            <span>S/{{ $product->sale_price }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__add-cart-s text-center">
                                                        <a href="{{ route('home.cart.agregarProducto', ["p" => $product]) }}">
                                                            <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                                Añadir al carrito
                                                            </button>
                                                        </a>
                                                        <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100 openProductDetailModal"
                                                            data-url="{{ url('/shop/product/'.$product->id) }}"
                                                            data-send="{{ route('home.shop.show', $product )}}">
                                                            Quick View
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-center pt-30 pb-30">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-area-end -->



    </main>
@section('extra-script')
<!-- MODAL SHOP -->
<script src="{{asset('assets/customer/js/ajax-modal-shop.js')}}" ></script>

@endsection
@section('modals')
@include('home.products.product-details')
@endsection
@endsection
