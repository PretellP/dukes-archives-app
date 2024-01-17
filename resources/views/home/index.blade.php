@extends('home.common.masterpage')

@section('content')

    <main>
        <!-- slider-area-start -->
        <div class="slider-area principal-slider">
            <div class="swiper-container slider__active">
                <div class="slider-wrapper swiper-wrapper">
                    <div class="single-slider swiper-slide slider-height">
                        <img class="imagencita" src="{{asset('assets/customer/img/slider/01-slide.png')}}" alt="">
                    </div>
                    <!-- /single-slider -->
                    <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="{{asset('assets/customer/img/slider/01-slide-2.png')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="slider-content">
                                        <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="0.1s">
                                            <a href="" class="st-btn b-radius">Nuevas historias</a>
                                        </div>
                                        <h2 data-animation="fadeInLeft" data-delay="0.1s" class="pt-15 slider-title pb-5">Embárcate en la magia<br> Hechizos y aventuras te esperan </h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="0.1s">Desde Hogwarts hasta el último horrocrux: Encuentra tus libros de Harry Potter favoritos</p>
                                        <div class="slider-bottom-btn mt-75">
                                            <a data-animation="fadeInUp" data-delay="0.1s" href="{{route ('home.shop.index')}}" class="st-btn-b b-radius">Descubrelas ahora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /single-slider -->
                    <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="{{asset('assets/customer/img/slider/01-slide-3.png')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="slider-content">
                                        <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="0.1s">
                                            <a href="" class="st-btn b-radius">Nuevas historias</a>
                                        </div>
                                        <h2 data-animation="fadeInLeft" data-delay="0.1s" class="pt-15 slider-title pb-5">Lecturas que te mantendrán en vilo<br> SUSPENSO </h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="0.1s">Explora nuestro catálogo de libros de misterio</p>
                                        <div class="slider-bottom-btn mt-75">
                                            <a data-animation="fadeInUp" data-delay="0.1s" href="{{route ('home.shop.index')}}" class="st-btn-b b-radius">Descubrelas ahora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /single-slider -->
                    <div class="main-slider-paginations"></div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next bs-button bs-button-prev"></div>
            <div class="swiper-button-prev bs-button bs-button-next"></div>
        </div>
        <!-- slider-area-end -->

        <!-- features__area-start -->

        <section class="features__area pt-20">
            <div class="container">
                <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-2 gx-0">
                    <div class="col">
                        <div class="features__item d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="features__content">
                                <h6>DELIVERY GRATIS</h6>
                                <p class="d-sm-block d-none">Para todas sus compras</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="features__item d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="fa fa-money-check"></i>
                            </div>
                            <div class="features__content">
                                <h6>PAGOS SEGUROS</h6>
                                <p class="d-sm-block d-none">Pagos 100% seguros</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="features__item d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="fa-solid fa-comments"></i>
                            </div>
                            <div class="features__content">
                                <h6>OPERANDO 24/7</h6>
                                <p class="d-sm-block d-none">Realiza tus compras</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="features__item features__item-last d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <div class="features__content">
                                <h6>SERVICIO AMISTOSO</h6>
                                <p class="d-sm-block d-none">Garantía de confianza</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features__area-end YA CASI-->

        <!-- banner__area-start-->
        <section class="banner__area pt-20 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="banner__item p-relative w-img mb-30">
                            <div class="banner__img">
                                <a href=""><img src="{{asset('assets/customer/img/banner/banner-1.png')}}" alt=""></a>
                            </div>
                            <div class="banner__content">
                                <h6><a href="#">Nuevas <br> Agendas 2023</a></h6>
                                <div class="bottom-btn">
                                    <a href="{{route ('home.shop.index')}}" class="st-btn-border-2 b-radius">Vamos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="banner__item p-relative mb-30 w-img">
                            <div class="banner__img">
                                <a href="#"><img src="{{asset('assets/customer/img/banner/banner-2.png')}}" alt=""></a>
                            </div>
                            <div class="banner__content">
                                <h6><a href="#">Historias <br> para el día</a></h6>
                                <div class="bottom-btn">
                                    <a href="{{route ('home.shop.index')}}" class="st-btn-border-2 b-radius">Vamos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="banner__item p-relative mb-30 w-img">
                            <div class="banner__img">
                                <a href="#"><img src="{{asset('assets/customer/img/banner/banner-3.png')}}" alt=""></a>
                            </div>
                            <div class="banner__content">
                                <h6><a href="#">Misterios <br> por resolver </a></h6>
                                <div class="bottom-btn">
                                    <a href="{{route ('home.shop.index')}}" class="st-btn-border-2 b-radius">Vamos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner__area-end -->

        <!-- recomand-product-area-start SLIDER 1-->
        <section class="recomand-product-area">
            <div class="contenedor">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-10">
                            <div class="section__title">
                                <h5 class="st-titile">LIBROS DE CIENCIA FICCIÓN</h5>
                            </div>
                            <div class="button-wrap">
                                <a href="{{route ('home.shop.index')}}">VER TODO <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="product-bs-slider">
                        <div class="product-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                         <!-- If we need navigation buttons -->
                         <div class="bs-button bs-button-prev"><i class="fa fa-chevron-left"></i></div>
                         <div class="bs-button bs-button-next"><i class="fa fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- recomand-product-area-end SLIDER 1-->

        <!-- product__area-start SLIDER 2-->
        <section class="topsell__area-2">
            <div class="contenedor">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-10">
                            <div class="section__title">
                                <h5 class="st-titile">MANGAS</h5>
                            </div>
                            <div class="product__nav-tab">
                                <ul class="nav nav-tabs" id="flast-sell-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link active" id="computer-tab" data-bs-toggle="tab" data-bs-target="#computer" type="button" role="tab" aria-controls="computer" aria-selected="false">acción</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="samsung-tab" data-bs-toggle="tab" data-bs-target="#samsung" type="button" role="tab" aria-selected="false">comedia</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="htc-tab" data-bs-toggle="tab" data-bs-target="#htc" type="button" role="tab" aria-selected="false">shonen</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="nokia-tab" data-bs-toggle="tab" data-bs-target="#nokia" type="button" role="tab" aria-selected="false">shojo</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="cell-tab" data-bs-toggle="tab" data-bs-target="#cell" type="button" role="tab" aria-selected="true">misterio</button>
                                    </li>
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tab-content" id="flast-sell-tabContent">
                            <div class="tab-pane fade active show" id="computer" role="tabpanel" aria-labelledby="computer-tab">
                                <div class="product-bs-slider-2">
                                    <div class="product-slider-2 swiper-container">
                                        <div class="swiper-wrapper">

                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img h-img ">
                                                        <a href="#">
                                                            <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                                    <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                                    <div class="price">
                                                        <span>$105</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Añadir al carrito
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img h-img ">
                                                        <a href="#">
                                                            <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                                    <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                                    <div class="price">
                                                        <span>$105</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Añadir al carrito
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img h-img ">
                                                        <a href="#">
                                                            <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                                    <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                                    <div class="price">
                                                        <span>$105</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Añadir al carrito
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img h-img ">
                                                        <a href="#">
                                                            <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                                    <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                                    <div class="price">
                                                        <span>$105</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Añadir al carrito
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img h-img ">
                                                        <a href="#">
                                                            <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                                    <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                                    <div class="price">
                                                        <span>$105</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Añadir al carrito
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="bs-button bs2-button-prev"><i class="fa fa-chevron-left"></i></div>
                                    <div class="bs-button bs2-button-next"><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="samsung" role="tabpanel" aria-labelledby="samsung-tab">
                                <div class="product-bs-slider-2">
                                    <div class="product-slider-2 swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-1.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
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
                                                    <div class="price">
                                                        <span>$105-$110</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-4.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Wireless Bluetooth Over-Ear Headphones</a></h6>
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
                                                    <div class="price">
                                                        <span>$100-$180</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-5.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Solo3 Wireless On-Ear Headphones</a></h6>
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
                                                    <div class="price">
                                                        <span><del>$270</del> $200</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-6.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Vifa Bluetooth Portable Wireless Speaker</a></h6>
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
                                                    <div class="price">
                                                        <span>$150-$270</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-2.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Men Size Yellow Basketball Jerseys</a></h6>
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
                                                    <div class="price">
                                                        <span>$105-$150</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-3.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Xbox Wireless Game Controller Pink</a></h6>
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
                                                    <div class="price">
                                                        <span>$200-$280</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- If we need navigation buttons -->
                                    </div>
                                    <div class="bs-button bs2-button-prev"><i class="fa fa-chevron-left"></i></div>
                                    <div class="bs-button bs2-button-next"><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="htc" role="tabpanel" aria-labelledby="htc-tab">
                                <div class="product-bs-slider-2">
                                    <div class="product-slider-2 swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-4.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Wireless Bluetooth Over-Ear Headphones</a></h6>
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
                                                    <div class="price">
                                                        <span>$100-$180</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-5.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Solo3 Wireless On-Ear Headphones</a></h6>
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
                                                    <div class="price">
                                                        <span><del>$270</del> $200</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-6.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Vifa Bluetooth Portable Wireless Speaker</a></h6>
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
                                                    <div class="price">
                                                        <span>$150-$270</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-1.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
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
                                                    <div class="price">
                                                        <span>$105-$110</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-2.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Men Size Yellow Basketball Jerseys</a></h6>
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
                                                    <div class="price">
                                                        <span>$105-$150</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-3.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Xbox Wireless Game Controller Pink</a></h6>
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
                                                    <div class="price">
                                                        <span>$200-$280</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="bs-button bs2-button-prev"><i class="fa fa-chevron-left"></i></div>
                                    <div class="bs-button bs2-button-next"><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nokia" role="tabpanel" aria-labelledby="nokia-tab">
                                <div class="product-bs-slider-2">
                                    <div class="product-slider-2 swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-1.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
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
                                                    <div class="price">
                                                        <span>$105-$110</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-2.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Men Size Yellow Basketball Jerseys</a></h6>
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
                                                    <div class="price">
                                                        <span>$105-$150</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-3.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Xbox Wireless Game Controller Pink</a></h6>
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
                                                    <div class="price">
                                                        <span>$200-$280</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-4.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Wireless Bluetooth Over-Ear Headphones</a></h6>
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
                                                    <div class="price">
                                                        <span>$100-$180</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-5.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Solo3 Wireless On-Ear Headphones</a></h6>
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
                                                    <div class="price">
                                                        <span><del>$270</del> $200</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-6.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Vifa Bluetooth Portable Wireless Speaker</a></h6>
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
                                                    <div class="price">
                                                        <span>$150-$270</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="bs-button bs2-button-prev"><i class="fa fa-chevron-left"></i></div>
                                    <div class="bs-button bs2-button-next"><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cell" role="tabpanel" aria-labelledby="cell-tab">
                                <div class="product-bs-slider-2">
                                    <div class="product-slider-2 swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-1.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-15%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
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
                                                    <div class="price">
                                                        <span>$105-$110</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-2.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Men Size Yellow Basketball Jerseys</a></h6>
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
                                                    <div class="price">
                                                        <span>$105-$150</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-3.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-9%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Xbox Wireless Game Controller Pink</a></h6>
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
                                                    <div class="price">
                                                        <span>$200-$280</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-4.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Wireless Bluetooth Over-Ear Headphones</a></h6>
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
                                                    <div class="price">
                                                        <span>$100-$180</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-5.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                    <span class="discount">-10%</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Solo3 Wireless On-Ear Headphones</a></h6>
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
                                                    <div class="price">
                                                        <span><del>$270</del> $200</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/customer/img/product/tp-6.jpg') }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <i class="fa fa-eye"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-heart"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fa fa-layer-group"></i>
                                                            <i class="fa fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a href="#">Vifa Bluetooth Portable Wireless Speaker</a></h6>
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
                                                    <div class="price">
                                                        <span>$150-$270</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="bs-button bs2-button-prev"><i class="fa fa-chevron-left"></i></div>
                                    <div class="bs-button bs2-button-next"><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product__area-end SLIDER 2-->

        <!-- banner__area-start -->
        <section>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://iberoperu.vtexassets.com/assets/vtex.file-manager-graphql/images/baec1d2f-84cd-4e8e-ae20-8f6c9d01e092___c8b0b3e0eb2757cb92b2d7bd8df9ea85.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
            </div>
        </section>
        <!-- banner__area-end -->

        <!-- product__area-start SLIDER SLIDER 3-->
        <section class="recomand-product-area mt-55">
            <div class="contenedor">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-10">
                            <div class="section__title">
                                <h5 class="st-titile">LIBROS DE CIENCIA FICCIÓN</h5>
                            </div>
                            <div class="button-wrap">
                                <a href="{{route ('home.shop.index')}}">VER TODO <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="product-bs-slider">
                        <div class="product-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img h-img ">
                                            <a href="#">
                                                <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788417490324_lmskevq12j7c8eiw.jpg" alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fa fa-eye"></i>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6 class="product-category pt-2"><a href="#">Manga</a></h6>
                                        <h6 class="text-truncate"><a href="#">Boku No Hero Academy</a></h6>
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
                                        <div class="price">
                                            <span>$105</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Añadir al carrito
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                         <!-- If we need navigation buttons -->
                         <div class="bs-button bs-button-prev"><i class="fa fa-chevron-left"></i></div>
                         <div class="bs-button bs-button-next"><i class="fa fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product__area-end SLIDER 3 -->

        <!-- banner__area-start -->
        <section>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://iberoperu.vtexassets.com/assets/vtex.file-manager-graphql/images/8b72aebe-0f94-448e-89f4-576b43539de4___c7246ce2efa2a0352714eedb29c43793.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
            </div>
        </section>
        <!-- banner__area-end-->


        <!-- banner-category-area-start -->
        <div class="slider-area light-bg-s pt-60">
            <div class="container 0">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-sm-6 col-6">
                                        <div class="banner__item p-relative w-img mb-30">
                                            <div class="banner__img banner__img-2 b-radius-2">
                                                <a href="#"><img src="{{asset('assets/customer/img/banner/banner1.png')}}" alt=""></a>
                                            </div>
                                            <div class="banner__content">
                                                <h6><a href="#">Descifra secretos</h6>
                                                <div class="banner-df-btn mb-15">
                                                    <a href="#" class="st-btn b-radius">Misterio</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-sm-6 col-6">
                                        <div class="banner__item p-relative w-img mb-30">
                                            <div class="banner__img banner__img-2 b-radius-2">
                                                <a href="#"><img src="{{asset('assets/customer/img/banner/banner2.png')}}" alt=""></a>
                                            </div>
                                            <div class="banner__content">
                                                <h6><a href="#">Juventud en cada página</h6>
                                                    <div class="banner-df-btn mb-15">
                                                        <a href="#" class="st-btn b-radius">Juveniles</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img banner__img-3  b-radius-2">
                                        <a href="#"><img src="{{asset('assets/customer/img/banner/banner3.png')}}" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-3">
                                        <div class="banner-df-btn mb-15">
                                            <a href="#" class="st-btn b-radius">Mangas</a>
                                        </div>
                                        <p>Nuevos</p>
                                        <h6 class="df-title"><a href="#">Aventuras dibujadas</a></h6>
                                        <div class="bottom-btn">
                                            <a href="{{route ('home.shop.index')}}" class="st-btn-border-2 b-radius">Leer Ahora</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-sm-6 col-6">
                                        <div class="banner__item p-relative w-img mb-30">
                                            <div class="banner__img banner__img-2 b-radius-2">
                                                <a href="#"><img src="{{asset('assets/customer/img/banner/banner4.png')}}" alt=""></a>
                                            </div>
                                            <div class="banner__content">
                                                <h6><a href="#">Un universo diferente</a></h6>
                                                <div class="banner-df-btn mb-15">
                                                    <a href="#" class="st-btn b-radius">Ciencia Ficción</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-sm-6 col-6">
                                        <div class="banner__item p-relative w-img mb-30">
                                            <div class="banner__img banner__img-2 b-radius-2">
                                                <a href="#"><img src="{{asset('assets/customer/img/banner/banner5.png')}}" alt=""></a>
                                            </div>
                                            <div class="banner__content">
                                                <h6><a href="#">Cuentos <br> coloridos</a></h6>
                                                <div class="banner-df-btn mb-15">
                                                    <a href="#" class="st-btn b-radius">Infantiles</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img banner__img-3  b-radius-2">
                                        <a href="#"><img src="{{asset('assets/customer/img/banner/banner6.png')}}" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-3">
                                        <div class="banner-df-btn mb-15">
                                            <a href="#" class="st-btn b-radius">Terror</a>
                                        </div>
                                        <p>Suspenso mortal</p>
                                        <h6 class="df-title"><a href="#">Miedo entre viñetas</a></h6>
                                        <div class="bottom-btn">
                                            <a href="{{route ('home.shop.index')}}" class="st-btn-border-2 b-radius">Leer Ahora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-category-area-end -->

        <!-- moveing-text-area-start -->
        <section class="moveing-text-area">
            <div class="container">
                <div class="ovic-running">
                    <div class="wrap">
                        <div class="inner">
                            <p class="item">Explora mundos infinitos entre nuestras páginas</p>
                            <p class="item">Donde cada libro es una puerta a la imaginación</p>
                            <p class="item">Sumérgete en historias que trascienden el tiempo</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- moveing-text-area-end -->

        <!-- banner__area-start -->
        <section class="banner__area pt-60 pb-25">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://iberoperu.vtexassets.com/assets/vtex.file-manager-graphql/images/baec1d2f-84cd-4e8e-ae20-8f6c9d01e092___c8b0b3e0eb2757cb92b2d7bd8df9ea85.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
            </div>
        </section>
        <!-- banner__area-end -->





        <!-- brand-area-start-->
        <section class="brand-area brand-area-d mt-5 mb-5">
            <div class="container">
                <div class="brand-slider swiper-container pt-50 pb-45">
                    <div class="swiper-wrapper">
                        <div class="brand-item w-img swiper-slide d-flex justify-content-center">
                            <a href="#"><img src="data:image/jpeg;base64,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" alt="brand" style="width: 140px; height: 40px; object-fit: cover;"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide d-flex justify-content-center">
                            <a href="#"><img src="{{ asset('assets/customer/img/brand/1.jpg') }}" alt="brand" style="width: 140px; height: 40px; object-fit: cover;"></a>

                            <a href="#"><img src="data:image/png;base64,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" alt="brand" style="width: 140px; height: 40px; object-fit: cover;"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide d-flex justify-content-center">
                            <a href="#"><img src="data:image/jpeg;base64,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" alt="brand" style="width: 140px; height: 40px; object-fit: cover;"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide d-flex justify-content-center">
                            <a href="#"><img src="data:image/png;base64,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" alt="brand" style="width: 140px; height: 40px; object-fit: cover;"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide d-flex justify-content-center">
                            <a href="#"><img src="https://seeklogo.com/images/E/editorial-alfaguara-logo-C062CC4DB6-seeklogo.com.png" alt="brand" style="width: 140px; height: 40px; object-fit: cover;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- brand-area-end -->



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
                                        <div class="tab-pane fade show active" id="nav1" role="tabpanel" aria-labelledby="nav1-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{asset('assets/customer/img/quick-view/quick-view-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{asset('assets/customer/img/quick-view/quick-view-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{asset('assets/customer/img/quick-view/quick-view-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{asset('assets/customer/img/quick-view/quick-view-4.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        </div>
                                    <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1" aria-selected="true">
                                                <img src="{{ asset('assets/customer/img/quick-view/quick-nav-1.jpg') }}" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2" aria-selected="false">
                                            <img src="{{ asset('assets/customer/img/quick-view/quick-nav-2.jpg') }}" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3" aria-selected="false">
                                            <img src="{{ asset('assets/customer/img/quick-view/quick-nav-3.jpg') }}" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4" aria-selected="false">
                                            <img src="{{ asset('assets/customer/img/quick-view/quick-nav-4.jpg') }}" alt="">
                                            </button>
                                        </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-content">
                                    <h4><a href="#">Samsung C49J89: £875, Debenhams Plus</a></h4>
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
                                            <li><a href="#"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Memory, Storage & SIM: 12GB RAM, 256GB.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
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
                                                <div class="cart-plus-minus p-relative"><input type="text" value="1" /></div>
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
