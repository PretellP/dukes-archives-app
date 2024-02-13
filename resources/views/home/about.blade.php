@extends('home.common.masterpage')

@section('content')

<main class="p-1">
    <!-- about-area-start -->
    <div class="about-area pt-80 pb-80" data-background="assets/img/bg/about-bg.png">
        <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-6 col-lg-6">
                   <div class="about-content">
                       <span>SOBRE NUESTRA TIENDA ONLINE</span>
                       <h4>LOS ARCHIVOS DEL DUQUE,</h4>
                       <h5 class="banner-t mb-30">CON MÁS DE 25 AÑOS DE EXPERIENCIA</h5>
                       <p class="about-text">MÁS DE 25 AÑOS LOS ARCHIVOS DEL DUQUE AYUDANDO A LOS AMANTES <br>DE LA LECTURA A ENCONTRAR SU LIBRO DESEADO.</p>
                       <p>La manera perfecta de obtener el libro que siempre has deseado. No esperes más y has tu pedido, obtén tu libro con nosotros y disfrútalo.</p>
                   </div>
               </div>
               <div class="col-xl-6 col-lg-6">
                    <div class="about-image w-img">
                        <img src="{{asset('assets/customer/img/about/about-b.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area-end -->

   

   
</main>

@endsection