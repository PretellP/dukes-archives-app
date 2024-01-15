<!DOCTYPE html>
<html lang="es">
@include('home.common.partials.head')
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
                                    <a href="{{route('home.index')}}" class="logo-image">
                                        {{-- <img src="" alt="logo"> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="header__search">
                                <form action="#">
                                    <div class="header__search-box">
                                        <input class="search-input" type="text" id="searchInput" placeholder="Escribe para buscar">
                                        <button class="button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <div id="autocompleteContainer" class="bg-light"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8 col-4">
                            <div class="header-action">
                                @guest
                                    <div class="block-userlink">
                                        <a class="icon-link" href="{{ route('login') }}">
                                        <i class="flaticon-user"></i>
                                        <span class="text d-sm-block d-none">
                                        <span class="sub">Login </span>
                                        Mi cuenta </span>
                                        </a>
                                    </div>
                                @else

                                     <div class="block-userlink">
                                        <a class="icon-link">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <span class="text">{{ Auth::user()->name }}</span>
                                            </a>
                                        </a>
                                        
        
                                        <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('cerrar sesión') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>

                                            <a class="dropdown-item" href="{{ route('home.profile.index') }}">
                                                {{ __('Mi perfil') }}
                                            </a>
                                        </div>

                                        
                                    </div>
                                @endguest

                                <div class="block-wishlist action">
                                    <a class="icon-link" href="{{route('home.wishlist.index')}}">
                                    <i class="flaticon-heart"></i>
                                    <span class="count">0</span>
                                    <span class="text d-sm-block d-none">
                                    <span class="sub">Favorito</span>
                                    Mi Lista </span>
                                    </a>
                                </div>
                                <div class="block-cart action">
                                    <a class="icon-link" href="{{route('home.cart.index')}}">
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
                                                        <a href="{{route ('home.product-details.index')}}">
                                                          <img src="https://www.crisol.com.pe/media/catalog/product/cache/cf84e6047db2ba7f2d5c381080c69ffe/9/7/9788416604500_sn4ssnorvcune4rb.jpg" style="object-fit: cover;" alt="">
                                                        </a>
                                                      </div>
                                                      <div class="cart__details">
                                                        <h6><a href="{{route ('home.product-details.index')}}"> One Punch-Man 1  </a></h6>
                                                        <div class="cart__price">
                                                          <span>S/ 49.00</span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="cart__del">
                                                        <a href="#"><i class="fa fa-times"></i></a>
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
                                                    <a href="{{route('home.cart.index')}}" class="wc-cart mb-10">Ver Carrito</a>
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
                                <button type="button" class="cat-toggle-btn cat-toggle-btn-1">
                                    <i class="fa-solid fa-bars-staggered"></i> categorías</button>
                                <div class="cat__menu-2 cat__menu">
                                    <nav id="mobile-menu" style="display: block;">
                                        <ul>
                                            <li>
                                                <a href="{{route ('home.shop.index')}}">Juveniles</a>
                                            </li>

                                            <li>
                                                <a href="{{route ('home.shop.index')}}">Infantiles
                                                    <span class="cat-label">¡vamos!</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route ('home.shop.index')}}">Comics &amp; Mangas
                                                    <span class="cat-label green">¡nuevo!</span>
                                                </a>
                                            </li>
                                            
                                            <li><a href="{{route ('home.shop.index')}}">Misterio</a></li>
                                            <li><a href="{{route ('home.shop.index')}}">Ciencia Ficción</a></li>
                                            <li class="d-laptop-none"><a href="{{route ('home.shop.index')}}">Literatura</a></li>
                                            <li class="d-laptop-none"><a href="{{route ('home.shop.index')}}">Novelas</a></li>
                                            <li><a href="{{route ('home.shop.index')}}">Ciencias</a></li>
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
                                        <a href="{{route('home.index')}}" class="active">Inicio</a>
                                        
                                    </li>

                                    <li><a href="{{route('home.about.index')}}">Nosotros</a></li>
                                    <li class="has-mega"><a href="{{route ('home.shop.index')}}">Productos</a></li>
                                    <li><a href="{{route('home.contact.index')}}">Contacto</a></li>

                                   

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
                                    <button class="button" type="submit"><i class="fa fa-search"></i></button>
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
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__logo mb-40">
                <a href="{{route('home.index')}}">
                <img src="" alt="logo">
                </a>
            </div>
            <div class="offcanvas__search mb-25">
                <form action="#">
                    <input type="text" placeholder="¿Que estás buscando?">
                    <button type="submit" ><i class="fa fa-search"></i></button>
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
    
    @include('home.common.partials.footer')
    
   
    <!-- JS here -->
    @include('home.common.partials.scripts')

 
</body>
</html>