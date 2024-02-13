<!-- footer-start -->
<footer>
        <div class="fotter-area d-dark-bg text-white">
            <div class="footer__top pt-60 pb-10">
                <div class="container custom-conatiner">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-8">
                            <div class="footer__widget">
                                <div class="footer__widget-title mb-20">
                                   {{--  <h4 class="text-white">Los Archivos del Duque</h4> --}}
                                </div>
                                <div class="footer__widget-content">
                                    <p class="footer-text mb-25 text-white">No dejes pasar la oportunidad de obtener el libro que siempre has deseado.</p>
                                    <div class="apps-store mb-20">
                                        <a href="#"><img src="" alt=""></a>
                                        <a href="#"><img src="" alt=""></a>
                                    </div>
                                    <div class="social-icon social-icon-2">
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
                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer__widget footer-col-2">
                                <div class="footer__widget-title">
                                    {{-- <h4>My Account</h4> --}}
                                </div>
                                <div class="footer__widget-content">
                                    <div class="footer__link footer__link-2">
                                        <ul>
                                            <li><a href="{{route('home.contact.index')}}">Comunícate con Soporte</a></li>
                                            <li><a href="{{route('home.cart.index')}}">Checkout</a></li>
                                            <li><a href="{{route('home.cart.index')}}">Carrito de Compras</a></li>
                                            <li><a href="{{route('home.wishlist.index')}}">Lista de Deseos</a></li>                                     
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer__widget footer-col-2">
                                <div class="footer__widget-title">
                                    {{-- <h4>Customer Care</h4> --}}
                                </div>
                                <div class="footer__widget-content">
                                    <div class="footer__link footer__link-2">
                                       <img src="{{asset('assets/login/img/logo.png')}}" class="img-thumbnail" alt="IMG">
                                       <h4 class="text-white">LOS ARCHIVOS DEL DUQUE</h4>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer__widget footer-col-2">
                                <div class="footer__widget-title">
                                   {{--  <h4>Customer Service</h4> --}}
                                </div>
                                <div class="footer__widget-content">
                                    <div class="footer__link footer__link-2">
                                        <ul>
                                            
                                            <li><a href="{{route('home.contact.index')}}">Contáctenos</a></li>
                                            <li><a href="{{route('home.shop.index')}}">Ver los Productos</a></li>
                                            <li><a href="{{route('home.index')}}">Suscribirse</a></li>
                                            <li><a href="{{route('home.index')}}">Políticas &amp; Reglas</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6">
                            <div class="footer__widget">
                                <div class="footer__widget-title mb-20">
                                    {{-- <h4>Sign Up To Newsletter</h4> --}}
                                </div>
                                <div class="footer__widget-content">
                                    <p class="footer-text mb-25 text-white">Únete a las más de 60.000 personas y obtén un cupón de descuento en la primera compra.</p>
                                    <div class="footer__newsletter-form">
                                        <form action="#">
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="Ingrese su correo">
                                                <div class="input-group-append">
                                                  <button class="btn btn-warning" type="button">Button</button>
                                                </div>
                                              </div>
                                        </form>
                                        </div>
                                    <p class="provide-text mt-20 text-white">Gracias por proporcionarnos tu correo electrónico, estamos agradecidos<br> <a href="#">Políticas de Privacidad</a> y <a href="#">Términos de Servicio</a> .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom-2">
                <div class="container custom-conatiner">
                    <div class="footer__bottom-content footer__bottom-content-2 pt-50 pb-50">
                        <div class="row">
                            <div class="col-xl-12">
                             
                                <div class="copy-right-area copy-right-area-2 text-center">
                                    <p class="text-white">Copyright © <span>Los Archivos del Duque</span> Todos los derechos reservados. Impulsado por <a href="#"><span class="main-color">Grupo2</span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->

    @yield('modals')