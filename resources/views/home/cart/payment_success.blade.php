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
    <main class="pt-4 pb-4" style="background-color: rgb(216, 215, 215)">


        <div class="container">

            <div class="row">

                @include('home.profile.menu')

                <div class="col-md-9 col-9 p-1">

                    <div class="p-4 " style="background-color: white">

                        <div class="col-12 cont_py_message border-bottom border-top py-4">

                            <div class="d-flex flex-column cont_message_icon pb-4">
                                <div>
                                    Tu compra se realizó con éxito.
                                </div>
                                <i class="fa-regular fa-circle-check text-success"></i>
                            </div>

                            <div class="cont_link_py_success border-top pt-4 w-100">

                                <a href="">
                                    <i class="fa-regular fa-file-lines me-2"></i>
                                    Ver mi historial de pedidos
                                </a>

                                <a href="{{ route('home.shop.index') }}" class="btn_return_shop">
                                    Seguir comprando
                                    <i class="fa-solid fa-cart-shopping ms-2"></i>
                                </a>

                            </div>

                        </div>


                    </div>

                </div>



            </div>



        </div>



    </main>

    <style>
        table {
            table-layout: fixed;
            width: 100%;
        }

        th,
        td {

            width: 20%;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

        }


        .cart .cart-plus-minus {
            float: left;
            /*margin: 0 auto;*/
            position: relative;
        }
    </style>
@endsection
