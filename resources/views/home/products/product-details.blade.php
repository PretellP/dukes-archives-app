<!-- shop modal start -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered product__modal" role="document">
        <div class="modal-content">
            <div class="product__modal-wrapper p-relative">
                <div class="product__modal-close p-absolute">
                    <button data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
                <div class="product__modal-inner" id="show-product-details">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product__modal-box">
                                <div class="tab-content" id="modalTabContent">
                                    <!-- Itera sobre las imágenes y crea el contenido de cada pestaña -->
                                    @if(isset($productDetails) && $productDetails->files)
                                        @foreach($productDetails->files as $index => $image)
                                            <div class="tab-pane fade @if($index === 0) show active @endif" id="nav{{ $index + 1 }}" role="tabpanel" aria-labelledby="nav{{ $index + 1 }}-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="{{ asset($image->file_url) }}" alt="">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                
                                <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                    <!-- Itera sobre las imágenes y crea los botones de navegación -->
                                    @if(isset($productDetails) && $productDetails->files)
                                        @foreach($productDetails->files as $index => $image)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link @if($index === 0) active @endif" id="nav{{ $index + 1 }}-tab" data-bs-toggle="tab" data-bs-target="#nav{{ $index + 1 }}" type="button" role="tab" aria-controls="nav{{ $index + 1 }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                    <img src="{{ asset($image->nav_url) }}" alt="">
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product__modal-content">
                                <h4><a class="name"></a></h4>
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
                                <div class="sale_price"></div>
                                <div class="product__modal-des mt-20 mb-15 description"></div>
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
                                        <li>
                                            <a href="#">
                                                <span class="sku mr-10">SKU:</span>
                                                <span>Samsung C49J89: £875, Debenhams Plus</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="cat mr-10">Etiquetas:</span>
                                                <span class="labels"></span>
                                            </a>
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
