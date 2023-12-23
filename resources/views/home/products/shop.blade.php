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
                                                            <a href="{{ route('home.product-details.index') }}">
                                                                <img src="{{ verifyImage($product->files->first()) }}"
                                                                    alt="product">
                                                            </a>
                                                        </div>
                                                        <div class="product-action">
                                                            <a href="#" class="icon-box icon-box-1"
                                                                data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                <i class="fa fa-eye"></i>
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="#" class="icon-box icon-box-1">
                                                                <i class="fa fa-heart"></i>
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product__content-3">

                                                            <h6 class="product-category pt-2">
                                                                <a href="#">{{ restrictMaxLengthText($product->labels->first()->description, 45) }}</a>
                                                            </h6>


                                                        <h6><a href="{{ route('home.product-details.index') }}">{{ $product->description }}</a></h6>
                                                        <div class="rating mb-5">
                                                            <ul>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            </ul>
                                                            <span>(01 review)</span>
                                                        </div>
                                                        <div class="price mb-10">
                                                            <span>S/{{ $product->sale_price }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__add-cart-s text-center">
                                                        <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                            Add to Cart
                                                        </button>
                                                        <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100"
                                                            data-bs-toggle="modal" data-bs-target="#productModalId">
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

        <!-- shop modal start -->
        <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered product__modal" role="document">
                <div class="modal-content">
                    <div class="product__modal-wrapper p-relative">
                        <div class="product__modal-close p-absolute">
                            <button data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="product__modal-inner">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product__modal-box">
                                        <div class="tab-content" id="modalTabContent">
                                            <div class="tab-pane fade show active" id="nav1" role="tabpanel"
                                                aria-labelledby="nav1-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="{{ asset('assets/customer/img/quick-view/quick-view-1.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav2" role="tabpanel"
                                                aria-labelledby="nav2-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="{{ asset('assets/customer/img/quick-view/quick-view-2.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav3" role="tabpanel"
                                                aria-labelledby="nav3-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="{{ asset('assets/customer/img/quick-view/quick-view-3.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav4" role="tabpanel"
                                                aria-labelledby="nav4-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="{{ asset('assets/customer/img/quick-view/quick-view-4.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav1" type="button" role="tab"
                                                    aria-controls="nav1" aria-selected="true">
                                                    <img src="{{ asset('assets/customer/img/quick-view/quick-nav-1.jpg') }}"
                                                        alt="">
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="nav2-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav2" type="button" role="tab"
                                                    aria-controls="nav2" aria-selected="false">
                                                    <img src="{{ asset('assets/customer/img/quick-view/quick-nav-2.jpg') }}"
                                                        alt="">
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="nav3-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav3" type="button" role="tab"
                                                    aria-controls="nav3" aria-selected="false">
                                                    <img src="{{ asset('assets/customer/img/quick-view/quick-nav-3.jpg') }}"
                                                        alt="">
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="nav4-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav4" type="button" role="tab"
                                                    aria-controls="nav4" aria-selected="false">
                                                    <img src="{{ asset('assets/customer/img/quick-view/quick-nav-4.jpg') }}"
                                                        alt="">
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product__modal-content">
                                        <h4><a href="{{ route('home.product-details.index') }}">Samsung C49J89: £875,
                                                Debenhams Plus</a></h4>
                                        <div class="product__review d-sm-flex">
                                            <div class="rating rating__shop mb-10 mr-30">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__add-review mb-15">
                                                <span>01 review</span>
                                            </div>
                                        </div>
                                        <div class="product__price">
                                            <span>$109.00 – $307.00</span>
                                        </div>
                                        <div class="product__modal-des mt-20 mb-15">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-circle"></i> Bass and Stereo
                                                        Sound.</a></li>
                                                <li><a href="#"><i class="fa fa-circle"></i> Display with 3088 x
                                                        1440 pixels resolution.</a></li>
                                                <li><a href="#"><i class="fa fa-circle"></i> Memory, Storage &
                                                        SIM: 12GB RAM, 256GB.</a></li>
                                                <li><a href="#"><i class="fa fa-circle"></i> Androi v10.0
                                                        Operating system.</a></li>
                                            </ul>
                                        </div>
                                        <div class="product__stock mb-20">
                                            <span class="mr-10">Availability :</span>
                                            <span>1795 in stock</span>
                                        </div>
                                        <div class="product__modal-form">
                                            <form action="#">
                                                <div class="pro-quan-area d-lg-flex align-items-center">
                                                    <div class="product-quantity mr-20 mb-25">
                                                        <div class="cart-plus-minus p-relative"><input type="text"
                                                                value="1" /></div>
                                                    </div>
                                                    <div class="pro-cart-btn mb-25">
                                                        <button class="cart-btn" type="submit">Add to cart</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="product__stock mb-30">
                                            <ul>
                                                <li><a href="#">
                                                        <span class="sku mr-10">SKU:</span>
                                                        <span>Samsung C49J89: £875, Debenhams Plus</span></a>
                                                </li>
                                                <li><a href="#">
                                                        <span class="cat mr-10">Categories:</span>
                                                        <span>iPhone, Tablets</span></a>
                                                </li>
                                                <li><a href="#">
                                                        <span class="tag mr-10">Tags:</span>
                                                        <span>Smartphone, Tablets</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop modal end -->

    </main>
@endsection
