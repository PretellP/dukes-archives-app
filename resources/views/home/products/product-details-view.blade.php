@extends('home.common.masterpage')

@section('content')
<main>
    <!-- product-details-start -->
    <div class="product-details p-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="product__details-nav d-sm-flex align-items-start">
                        <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                            @if(isset($productDetails->files) && count($productDetails->files) > 0)
                                @foreach($productDetails->files as $index => $file)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if($index === 0) active @endif" id="thumb{{ $index + 1 }}-tab" data-bs-toggle="tab" data-bs-target="#thumb{{ $index + 1 }}" type="button" role="tab" aria-controls="thumb{{ $index + 1 }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                            <img src="{{ verifyImage($file) }}" alt="{{ $file->alt_text }}" class="img-gallery">
                                        </button>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="product__details-thumb">
                            <div class="tab-content" id="productThumbContent">
                                @if(isset($productDetails->files) && count($productDetails->files) > 0)
                                    @foreach($productDetails->files as $index => $file)
                                        <div class="tab-pane fade @if($index === 0) show active @endif" id="thumb{{ $index + 1 }}" role="tabpanel" aria-labelledby="thumb{{ $index + 1 }}-tab">
                                            <div class="product__details-nav-thumb w-img">
                                                <img src="{{ verifyImage($file) }}" alt="{{ $file->alt_text }}">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="col-xl-6">
                    <div class="product__details-content">
                        <h6>{{ $productDetails->name }}</h6>
                        <div class="pd-rating mb-10">
                            <ul class="rating">
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                            <span>(01 review)</span>
                            <span><a href="#">Add your review</a></span>
                        </div>
                        <div class="price mb-10">
                            <span>S/ {{ $productDetails->sale_price }}</span>
                        </div>
                        <div class="product-stock mb-20">
                            <h5>Availability: <span> 940 in stock</span></h5>
                        </div>
                        <div class="cart-option mb-15">
                            <div class="product-quantity mr-20">
                                <div class="cart-plus-minus p-relative"><input type="text" value="1"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                            </div>
                            <a href="cart.html" class="cart-btn">Add to Cart</a>
                        </div>
                        <div class="details-meta">
                            <div class="d-meta-left">
                                <div class="dm-item mr-20">
                                    <a href="#"><i class="fas fa-heart"></i>Add to wishlist</a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="product-tag-area mt-15">
                            <div class="product_info">
                                
                                <span class="tagged_as">
                                    <span class="title">Tags:</span>
                                    @foreach ($productDetails->labels as $index => $label)
                                        {{ strtoupper($label->name) }}@if($index < count($productDetails->labels) - 1), @endif
                                    @endforeach                  
                                    .
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details-end -->

    <!-- product-details-des-start -->
    <div class="product-details-des mt-40 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product__details-des-tab">
                        <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Description </button>
                            </li>
                           {{--  <li class="nav-item" role="presentation">
                                <button class="nav-link" id="aditional-tab" data-bs-toggle="tab" data-bs-target="#aditional" type="button" role="tab" aria-controls="aditional" aria-selected="false">Additional information</button>
                              </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Reviews (1) </button>
                            </li> --}}
                          </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="prodductDesTaContent">
                <div class="tab-pane fade active show" id="des" role="tabpanel" aria-labelledby="des-tab">
                    <div class="product__details-des-wrapper">
                        
                        {{ $productDetails->description }}

                    </div>
                </div>
              {{--   <div class="tab-pane fade" id="aditional" role="tabpanel" aria-labelledby="aditional-tab">
                    <div class="product__desc-info">
                        <ul>
                           <li>
                              <h6>Weight</h6>
                              <span>2 lbs</span>
                           </li>
                           <li>
                              <h6>Dimensions</h6>
                              <span>12 × 16 × 19 in</span>
                           </li>
                           <li>
                              <h6>Product</h6>
                              <span>Purchase this product on rag-bone.com</span>
                           </li>
                           <li>
                              <h6>Color</h6>
                              <span>Gray, Black</span>
                           </li>
                           <li>
                              <h6>Size</h6>
                              <span>S, M, L, XL</span>
                           </li>
                           <li>
                              <h6>Model</h6>
                              <span>Model	</span>
                           </li>
                           <li>
                              <h6>Shipping</h6>
                              <span>Standard shipping: $5,95</span>
                           </li>
                           <li>
                              <h6>Care Info</h6>
                              <span>Machine Wash up to 40ºC/86ºF Gentle Cycle</span>
                           </li>
                           <li>
                              <h6>Brand</h6>
                              <span>Kazen</span>
                           </li>
                        </ul>
                     </div>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="product__details-review">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="review-rate">
                                    <h5>5.00</h5>
                                    <div class="review-star">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                    <span class="review-count">01 Review</span>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="review-des-infod">
                                    <h6>1 review for "<span>Wireless Bluetooth Over-Ear Headphones</span>"</h6>
                                    <div class="review-details-des">
                                        <div class="author-image mr-15">
                                            <a href="#"><img src="assets/img/author/author-sm-1.jpg" alt=""></a>
                                        </div>
                                        <div class="review-details-content">
                                            <div class="str-info">
                                                <div class="review-star mr-15">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </div>
                                                <div class="add-review-option">
                                                    <a href="#">Add Review</a>
                                                </div>
                                            </div>
                                            <div class="name-date mb-30">
                                                <h6> admin – <span> May 27, 2021</span></h6>
                                            </div>
                                            <p>A light chair, easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in <br> voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="product__details-comment ">
                                    <div class="comment-title mb-20">
                                       <h3>Add a review</h3>
                                       <p>Your email address will not be published. Required fields are marked *</p>
                                    </div>
                                    <div class="comment-rating mb-20">
                                       <span>Overall ratings</span>
                                       <ul>
                                          <li><a href="#"><i class="fas fa-star"></i></a></li>
                                          <li><a href="#"><i class="fas fa-star"></i></a></li>
                                          <li><a href="#"><i class="fas fa-star"></i></a></li>
                                          <li><a href="#"><i class="fas fa-star"></i></a></li>
                                          <li><a href="#"><i class="fas fa-star"></i></a></li>
                                       </ul>
                                    </div>
                                    <div class="comment-input-box">
                                       <form action="#">
                                          <div class="row">
                                            <div class="col-xxl-6 col-xl-6">
                                                <div class="comment-input">
                                                   <input type="text" placeholder="Your Name">
                                                </div>
                                             </div>
                                             <div class="col-xxl-6 col-xl-6">
                                                <div class="comment-input">
                                                   <input type="email" placeholder="Your Email">
                                                </div>
                                             </div>
                                             <div class="col-xxl-12">
                                                   <textarea placeholder="Your review" class="comment-input comment-textarea"></textarea>
                                             </div>
                                             <div class="col-xxl-12">
                                                <div class="comment-agree d-flex align-items-center mb-25">
                                                   <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                      <label class="form-check-label" for="flexCheckDefault">
                                                       Save my name, email, and website in this browser for the next time I comment.
                                                      </label>
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="col-xxl-12">
                                                <div class="comment-submit">
                                                   <button type="submit" class="cart-btn">Submit</button>
                                                </div>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- product-details-des-end -->


</main>

@endsection