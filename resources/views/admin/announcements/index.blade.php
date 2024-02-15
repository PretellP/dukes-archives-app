@extends('admin.common.layouts.masterpage')

@section('content')
    <div class="row content">

        <div class="main-container-page">
            <div class="card page-title-container">
                <div class="card-header">
                    <div class="total-width-container">
                        <h4>ANUNCIOS</h4>
                    </div>
                </div>
            </div>

            <div class="card-body card z-index-2 principal-container container-dashboard">

                <div class="principal-splitted-container mt-1 mb-2">


                    <div class="principal-inner-container total-width">

                        <div class="inner-title-container">
                            <div class="btn-dropdown-container show">
                                <h5 class="title-header-show">
                                    <i class="fa-solid fa-images not-rotate"></i> &nbsp;
                                    Carrusel principal
                                </h5>

                                <div class="btn-row-container">
                                    <div>
                                        <span class="text-dropdown-cont">
                                            Ocultar
                                        </span>
                                        <i class="fa-solid fa-chevron-down ms-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="banners-list-container" class="related-dropdown-container">
                            @include('admin.announcements.partials.components._banners_list')
                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>
@endsection

@section('modals')
    @include('admin.announcements.partials.modals._banner_edit')
    @include('admin.announcements.partials.modals._banner_store')
@endsection

@section('extra-script')
    <script type="module" src="{{ asset('assets/admin/js/page/announcements.js') }}"></script>
@endsection
