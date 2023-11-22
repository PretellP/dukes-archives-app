<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Los Archivos del Duque | Web </title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- CSS here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/customer/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/backtotop.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/font-awesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/default.css')}}">

    <link rel="stylesheet" href="{{asset('assets/customer/css/stylep.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/customer/css/width.css')}}">
</head>
<body>

    
    <!-- header-start -->
    <header class="header d-blue-bg">
        
        <div class="header-mid">
            <div class="container">
                <div class="heade-mid-inner"><!--d-none d-lg-block-->
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-8">
                            <div class="header__info">
                                <div class="logo">
                                    <a href="index.html" class="logo-image"><img src="assets/img/logo/logo1.svg" alt="logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="header__search">
                                <form action="#">
                                    <div class="header__search-box">
                                        <input class="search-input" type="text" id="searchInput"  placeholder="Escribe para buscar">
                                        <button class="button" type="submit"><i class="far fa-search"></i></button>
                                        <div id="autocompleteContainer" class="bg-light"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8 col-4">
                            <div class="header-action">
                                <div class="block-userlink">
                                    <a class="icon-link" href="my-account.html">
                                    <i class="flaticon-user"></i>
                                    <span class="text d-sm-block d-none">
                                    <span class="sub">Login </span>
                                    Mi cuenta </span>
                                    </a>
                                </div>
                                <div class="block-wishlist action">
                                    <a class="icon-link" href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                    <span class="count">0</span>
                                    <span class="text d-sm-block d-none">
                                    <span class="sub">Favorito</span>
                                    Mi Lista </span>
                                    </a>
                                </div>
                                <div class="block-cart action">
                                    <a class="icon-link" href="cart.html">
                                    <i class="flaticon-shopping-bag"></i>
                                    <span class="count">1</span>
                                    <span class="text d-sm-block d-none">
                                        <span class="sub">Carrito:</span>
                                        $00.00 
                                    </span>
                                    </a>
                                    <div class="cart">
                                        <div class="cart__mini">
                                            <ul>
                                                <li>
                                                  <div class="cart__title">
                                                    <h4>Tu carrito de compras</h4>
                                                    <span>(1 Item)</span>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="cart__item d-flex justify-content-between align-items-center">
                                                    <div class="cart__inner d-flex">
                                                      <div class="cart__thumb">
                                                        <a href="product-details.html">
                                                          <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788416604500_sn4ssnorvcune4rb.jpg" style="object-fit: cover;" alt="">
                                                        </a>
                                                      </div>
                                                      <div class="cart__details">
                                                        <h6><a href="product-details.html"> One Punch-Man 1  </a></h6>
                                                        <div class="cart__price">
                                                          <span>S/ 49.00</span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="cart__del">
                                                        <a href="#"><i class="fal fa-times"></i></a>
                                                    </div>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="cart__sub d-flex justify-content-between align-items-center">
                                                    <h6>Subtotal</h6>
                                                    <span class="cart__sub-total">S/ 49.00</span>
                                                  </div>
                                                </li>
                                                <li>
                                                    <a href="cart.html" class="wc-cart mb-10">Ver Carrito</a>
                                                    <a href="checkout.html" class="wc-checkout">Pagar</a>
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
        <div class="header__bottom">
            <div class="container">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-3">                        
                        <div class="cat__menu-wrapper side-border d-none d-lg-block">
                            <div class="cat-toggle">
                                <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> categorías</button>
                                <div class="cat__menu-2 cat__menu">
                                    <nav id="mobile-menu" style="display: block;">
                                        <ul>
                                            <li>
                                                <a href="product.html">Juveniles</a>
                                            </li>

                                            <li>
                                                <a href="product.html">Infantiles
                                                    <span class="cat-label">¡vamos!</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="product.html">Comics &amp; Mangas
                                                    <span class="cat-label green">¡nuevo!</span>
                                                </a>
                                            </li>
                                            
                                            <li><a href="product.html">Misterio</a></li>
                                            <li><a href="product.html">Ciencia Ficción</a></li>
                                            <li class="d-laptop-none"><a href="product.html">Literatura</a></li>
                                            <li class="d-laptop-none"><a href="product.html">Novelas</a></li>
                                            <li><a href="product.html">Ciencias</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-1 col-1">
                      <div class="header__bottom-left d-flex d-xl-block">
                        <div class="side-menu d-lg-none mr-20">
                          <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
                        </div>
                        

                        <div class="main-menu d-none d-lg-block">
                            <nav class="d-flex justify-content-center align-items-center">
                                <ul>
                                    <li>
                                        <a href="index.html" class="active">Inicio</a>
                                        
                                    </li>

                                    <li><a href="about.html">Nosotros</a></li>
                                    <li class="has-mega"><a href="shop.html">Productos</a></li>
                                    <li><a href="about.html">Contacto</a></li>

                                   

                                </ul>
                            </nav>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-11 col-11 d-lg-none d-block">
                        <div class="header__search">
                            <form action="#">
                                <div class="header__search-box">
                                    <input class="search-input" type="text" id="searchInput"  placeholder="Escribe para buscar">
                                    <button class="button" type="submit"><i class="far fa-search"></i></button>
                                    <div id="autocompleteContainer" class="bg-light"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 d-none d-lg-block">
                        <div class="shopeing-text text-sm-end">
                            <p>¡Delivery gratis para todas tus compras!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
           <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

     <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn" id="offcanvas__close-btn">
                <i class="fal fa-times"></i>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__logo mb-40">
                <a href="index.html">
                <img src="assets/img/logo/logo-white.png" alt="logo">
                </a>
            </div>
            <div class="offcanvas__search mb-25">
                <form action="#">
                    <input type="text" placeholder="¿Que estás buscando?">
                    <button type="submit" ><i class="far fa-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu fix"></div>
            <div class="offcanvas__action">

            </div>
        </div>
        </div>
    </div>
    
    <!-- offcanvas area end -->      
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    @yield('content')


    
    @include('home.common.footer')

    <!-- JS here -->
    <script src="{{asset('assets/customer/js/vendor/jquery.js')}}"></script>    
    <script src="{{asset('assets/customer/js/vendor/waypoints.js')}}"></script>
    <script src="{{asset('assets/customer/js/bootstrap-bundle.js')}}"></script>
    <script src="{{asset('assets/customer/js/meanmenu.js')}}"></script>
    <script src="{{asset('assets/customer/js/swiper-bundle.js')}}"></script>
    <script src="{{asset('assets/customer/js/tweenmax.js')}}"></script>
    <script src="{{asset('assets/customer/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets/customer/js/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/customer/js/parallax.js')}}"></script>
    <script src="{{asset('assets/customer/js/backtotop.js')}}"></script>
    <script src="{{asset('assets/customer/js/nice-select.js')}}"></script>
    <script src="{{asset('assets/customer/js/countdown.min.js')}}"></script>
    <script src="{{asset('assets/customer/js/counterup.js')}}"></script>
    <script src="{{asset('assets/customer/js/wow.js')}}"></script>
    <script src="{{asset('assets/customer/js/isotope-pkgd.js')}}"></script>
    <script src="{{asset('assets/customer/js/imagesloaded-pkgd.js')}}"></script>
    <script src="{{asset('assets/customer/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/customer/js/main.js')}}"></script>
    <script src="{{asset('assets/customer/js/search.js')}}"></script>
</body>
</html>