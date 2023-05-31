@extends('front.layout.app')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('uploads/'.$products->photo) }}" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">

                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <h2 class="title-detail">{{ $products->product_title }}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <span class="font-small ml-5 text-muted"> (No reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">${{ $products->discount_price }}</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">{{ $products->discount_rate }}% Off</span>
                                            <span class="old-price font-md ml-15">${{ $products->selling_price }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">{!! $products->short_description !!}</p>
                                </div>
                                <div class="detail-extralink mb-50">
                                    <form style="" action="{{ route('your_cart_submit') }}" method="post">
                                        @csrf
                                        <!-- hidden field -->
                                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                                        <input type="hidden" name="product_title" value="{{ $products->product_title }}">
                                        <input type="hidden" name="discount_price" value="{{ $products->discount_price }}">
                                        <!--// hidden field -->
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="text" name="qty" class="qty-val" value="1" min="1">
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                    </form>
                                </div>
<div class="font-xs">
<ul class="mr-50 float-start">
    <li class="mb-5">Type: <span class="text-brand">{{ $products->type }}</span></li>
    <li class="mb-5">MFG:<span class="text-brand"> {{ $products->mfg }}</span></li>
    <li>LIFE: <span class="text-brand">{{ $products->lifetime }}</span></li>
</ul>
<ul class="float-start">
    <li class="mb-5">SKU: <a href="#">{{ $products->sku_no }}</a></li>
    <li>Stock:<span class="in-stock text-brand ml-5">{{ $products->stock }} Items In Stock</span></li>
</ul>
</div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Long Description</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        {!! $products->long_description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection