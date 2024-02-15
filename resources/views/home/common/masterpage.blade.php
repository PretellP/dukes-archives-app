<!DOCTYPE html>
<html lang="es">
@include('home.common.partials.head')
<body>

    <!-- header-start -->
    <header class="header d-dark-bg">

        <div class="header-mid">
            <div class="container">
                <div class="heade-mid-inner"><!--d-none d-lg-block-->
                    <div class="row align-items-center col-12">
{{--                         <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-8">
                            <div class="header__info">
                                <div class="logo">
                                    <a href="{{route('home.index')}}" class="logo-image">
                                         <img src="" alt="logo">
                                    </a>
                                </div>
                            </div>
                        </div>
 --}}
                        <div class="col-xl-5 col-lg-4  d-lg-block ">
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
                        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8 col-4 ms-auto" >
                            <div class="header-action">
                                @guest
                                    <div class="block-userlink">
                                        <a class="icon-link" href="{{ route('login') }}">
                                            <i class="flaticon-user"></i>
                                            <span class="text d-sm-block d-none">
                                                <span class="sub">Login</span>
                                                Mi cuenta
                                            </span>
                                        </a>
                                    </div>
                                @else
                                    <div class="block-userlink">
                                        <div class="dropdown">
                                            <a class="icon-link dropdown-toggle text-light" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flaticon-user"></i> <!-- Icono de usuario -->
                                                {{ Auth::user()->name }}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('home.profile.index') }}">
                                                    <i class="fas fa-user-circle"></i> <!-- Icono de perfil -->
                                                    Datos del Perfil
                                                </a>
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i> <!-- Icono de cerrar sesión -->
                                                    Cerrar Sesión
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endguest



                                <div class="block-wishlist action">

                                    <a class="icon-link" href="{{ route('home.wishlist.index') }}">
                                        <i class="flaticon-heart"></i>
                                        <span class="count">
                                            @isset($wishlistCount)
                                                {{ $wishlistCount }}
                                            @else
                                                0
                                            @endisset
                                        </span>
                                        <span class="text d-sm-block d-none">
                                            <span class="sub">Favorito</span>
                                            Mi Lista
                                        </span>
                                    </a>

                                </div>

                                <div class="block-cart action">
                                    <a class="icon-link" href="{{route('home.cart.index')}}">
                                    <i class="flaticon-shopping-bag"></i>
                                    <span class="count">1</span>
                                    <span class="text d-sm-block d-none">
                                        <span class="sub">Carrito</span>
                                        de Compras
                                    </span>
                                    </a>
                                    <div class="cart">
                                        <div class="cart__mini">
                                            @php
                                                $shoppingCart = getShoppingCart();
                                            @endphp 

                                            @if ($shoppingCart->isEmpty())
                                                <div class="d-flex justify-content-center pt-40 pb-40">
                                                    <img src="data:image/png;base64,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"
                                                        alt="">
                                                </div>
                                            @else
                                            <ul>
                                                <li>
                                                  <div class="cart__title">
                                                    <h4>Tu carrito de compras</h4>                                               
                                                  </div>
                                                </li>
                                                @foreach ( $shoppingCart as $item )
                                                <li>
                                                    <div class="cart__item d-flex justify-content-between align-items-center">
                                                      <div class="cart__inner d-flex">
                                                        <div class="cart__thumb">
                                                          <a href="#">
                                                            <img src="{{verifyImage($item->files->first())}}" style="object-fit: cover;" alt="">
                                                          </a>
                                                        </div>
                                                        <div class="cart__details">
                                                          <h6><a href="#">{{$item->name}}</a></h6>
                                                          <div class="cart__price">
                                                            <span>S/ {{$item->sale_price}}</span>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="cart__del">
                                                          <a href="#"><i class="fa fa-times"></i></a>
                                                      </div>
                                                    </div>
                                                  </li>
                                                    
                                                @endforeach
                                            @endif                                  
                                                <li>
                                                    <a href="{{route('home.cart.index')}}" class="wc-cart mb-10">Ver Carrito</a>
                                                    
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
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-1 col-1">
                        <div class="header__bottom-left d-flex d-xl-block">
                            <div class="main-menu d-none d-lg-block">
                                <nav class="d-flex justify-content-center align-items-center">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::currentRouteName() == 'home.index' ? 'active' : '' }}" href="{{ route('home.index') }}">Inicio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::currentRouteName() == 'home.about.index' ? 'active' : '' }}" href="{{ route('home.about.index') }}">Nosotros</a>
                                        </li>
                                        <li class="nav-item has-mega">
                                            <a class="nav-link {{ Route::currentRouteName() == 'home.shop.index' ? 'active' : '' }}" href="{{ route('home.shop.index') }}">Productos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::currentRouteName() == 'home.contact.index' ? 'active' : '' }}" href="{{ route('home.contact.index') }}">Contacto</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
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
           <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"  />
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
