@extends('front.layout.app')
@section('content')
<link rel="stylesheet" href="{{ asset('dist-front/css/iziToast.min.css') }}">
<section class="home-slider position-relative mb-30">
   <div class="container">
      <div class="home-slide-cover mt-30">
         <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
            @foreach ($sliders as $slider)
            <div class="single-hero-slider single-animation-wrap" style="opacity:0.2;background-image: url({{ asset('uploads/'.$slider->photo) }})">
               <div class="slider-content">
                  <h1 class="display-2 mb-40" style="font-size:50px;">
                     {{ $slider->name }} <br />
                  </h1>
                  <p class="mb-65">{{ $slider->title }}</p>
                  <form class="form-subcriber d-flex" method="post" action="{{ route('subscriber_send_email') }}">
                     @csrf
                     <input type="email" name="email" placeholder="Your emaill address" />
                     <button class="btn" type="submit">Subscribe</button>
                  </form>
               </div>
            </div>
            @endforeach
         </div>
         <div class="slider-arrow hero-slider-1-arrow"></div>
      </div>
   </div>
</section>
<!--End hero slider-->
<section class="popular-categories section-padding">
   <div class="container wow animate__animated animate__fadeIn">
      <div class="section-title">
         <div class="title">
            <h3>Featured Categories</h3>
         </div>
         <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
      </div>
      <div class="carausel-10-columns-cover position-relative">
         <div class="carausel-10-columns" id="carausel-10-columns">
            @foreach ($categories as $category)
            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
               <figure class="img-hover-scale overflow-hidden">
                  <a href="shop-grid-right.html"><img src="{{ asset('uploads/'.$category->photo) }}" alt="" /></a>
               </figure>
               <h6><a href="shop-grid-right.html">{{ $category->name }}</a></h6>
               <span>26 items</span>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</section>
<!--End category slider-->
<section class="banners mb-25">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-6">
            <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
               <img src="{{ asset('uploads/med1.jpg') }}" alt="" />
               <div class="banner-text">
                  <h4>
                     Medicines can <br />treat diseases and<br />
                     improve your health
                  </h4>
                  <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
               <img src="{{ asset('uploads/med2.jpg') }}" alt="" />
               <div class="banner-text">
                  <h4>
                     Medicines can <br />treat diseases and<br />
                     improve your health
                  </h4>
                  <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 d-md-none d-lg-flex">
            <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
               <img src="{{ asset('uploads/med3.jpg') }}" alt="" />
               <div class="banner-text">
                  <h4>
                     Medicines can <br />treat diseases and<br />
                     improve your health
                  </h4>
                  <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--End banners-->
<section class="section-padding pb-5">
   <div class="container">
      <div class="section-title wow animate__animated animate__fadeIn">
         <h3 class=""> Featured Medicine </h3>
      </div>
      <div class="row">
         <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
            <div class="banner-img style-2">
               <div class="banner-text">
                  <h2 class="mb-100">Bring nature into your home</h2>
                  <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
            <div class="tab-content" id="myTabContent-1">
               <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                  <div class="carausel-4-columns-cover arrow-center position-relative">
                     <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                     <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                        @foreach($featuredMedicines as $featuredMedicine)
                        <form action="{{ route('your_cart_submit') }}" method="post">
                           @csrf
                           <!-- hidden field -->
                           <input type="hidden" name="product_id" value="{{ $featuredMedicine->id }}">
                           <input type="hidden" name="product_title" value="{{ $featuredMedicine->product_title }}">
                           <input type="hidden" name="discount_price" value="{{ $featuredMedicine->discount_price }}">
                           <!--// hidden field -->
                           <div class="product-cart-wrap">
                              <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                    <img class="default-img" src="{{ asset('uploads/'.$featuredMedicine->photo) }}" alt="" />
                                    <img class="hover-img" src="{{ asset('uploads/'.$featuredMedicine->photo) }}" alt="" />
                                    </a>
                                 </div>
                                 <div class="product-badges product-badges-position product-badges-mrg">
                                 </div>
                              </div>
                              <div class="product-content-wrap">
                                 <div class="product-category">
                                    <a href="shop-grid-right.html"></a>
                                 </div>
                                 <h2><a href="{{ route('product_details',$featuredMedicine->id) }}">{{ $featuredMedicine->product_title }}</a></h2>
                                 <p>{{ $featuredMedicine->short_description }}</p>
                                 <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 80%"></div>
                                 </div>
                                 <div class="product-price mt-10">
                                    <span>${{ $featuredMedicine->discount_price }} </span>
                                    <span class="old-price">${{ $featuredMedicine->selling_price }}</span>
                                 </div>
                                 <div class="sold mt-15 mb-15">
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="font-xs text-heading"> Sold: @php
                                       $purchases = \App\Models\OrderDetail::select('qty')->where('product_id',$featuredMedicine->id)->sum('qty');
                                       $stock_now = $featuredMedicine->stock - $purchases;
                                   @endphp
                                   {{ $purchases }}/{{ $featuredMedicine->stock }}</span>
                                 </div> 
                                 <input type="number" name="qty" value="1" min="1" style="height:30px;">
                                 <button type="submit" class="btn btn-xs mt-4"><a href="shop-cart.html" class="" style="color:white;">Add To Cart</a></button>
                              </div>
                           </div>
                        </form>
                        <!--End product Wrap-->
                        @endforeach
                     </div>
                  </div>
               </div>
               <!--End tab-pane-->
            </div>
            <!--End tab-content-->
         </div>
         <!--End Col-lg-9-->
      </div>
   </div>
</section>
<!--End Best Sales-->
<!-- TV Category -->
<section class="product-tabs section-padding position-relative">
   <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
         <h3>Capsule Category </h3>
      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4">
               @foreach($capsules as $capsule)
               <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                  <form action="{{ route('your_cart_submit') }}" method="post">
                     @csrf
                     <!-- hidden field -->
                     <input type="hidden" name="product_id" value="{{ $capsule->id }}">
                     <input type="hidden" name="product_title" value="{{ $capsule->product_title }}">
                     <input type="hidden" name="discount_price" value="{{ $capsule->discount_price }}">
                     <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                           <div class="product-img product-img-zoom">
                              <a href="shop-product-right.html">
                              <img class="default-img" src="{{ asset('uploads/'.$capsule->photo) }}" alt="" />
                              <img class="hover-img" src="{{ asset('uploads/'.$capsule->photo) }}" alt="" />
                              </a>
                           </div>
                           <div class="product-badges product-badges-position product-badges-mrg">
                           </div>
                        </div>
                        <div class="product-content-wrap">
                           <div class="product-category">
                              <a href="shop-grid-right.html"></a>
                           </div>
                           <h2><a href="{{ route('product_details',$capsule->id) }}">{{ $capsule->product_title }} </a></h2>
                           <p style="font-size:13px;">{{ $capsule->short_description }} </p>
                           <div>
                              <span class="font-small text-muted">By <a href="vendor-details-1.html">Admin</a></span>
                           </div>
                           <div class="product-card-bottom">
                              <div class="product-price" style="display:block;">
                                 <span>${{ $capsule->discount_price }} </span>
                                 <span class="old-price">${{ $capsule->selling_price }} </span>
                              </div>
                              <div class="add-cart">
                                 <input type="number" name="qty" value="1" min="1" style="height:30px;margin-bottom:20px;margin-left:10px;">
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-xs ml-5"><a href="" class="" style="color:white; ">Add To Cart</a></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               @endforeach
               <!--end product card-->
            </div>
            <!--End product-grid-4-->
         </div>
      </div>
      <!--End tab-content-->
   </div>
</section>
<!--End TV Category -->
<!-- Tshirt Category -->
<section class="product-tabs section-padding position-relative">
   <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
         <h3>Steroid Category </h3>
      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4">
               @foreach($steroids as $steroid)
               <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                  <form action="{{ route('your_cart_submit') }}" method="post">
                     @csrf
                     <!-- hidden field -->
                     <input type="hidden" name="product_id" value="{{ $steroid->id }}">
                     <input type="hidden" name="product_title" value="{{ $steroid->product_title }}">
                     <input type="hidden" name="discount_price" value="{{ $steroid->discount_price }}">
                     <!--// hidden field -->
                     <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                           <div class="product-img product-img-zoom">
                              <a href="shop-product-right.html">
                              <img class="default-img" src="{{ asset('uploads/'.$steroid->photo) }}" alt="" />
                              <img class="hover-img" src="{{ asset('uploads/'.$steroid->photo) }}" alt="" />
                              </a>
                           </div>
                           <div class="product-badges product-badges-position product-badges-mrg">
                           </div>
                        </div>
                        <div class="product-content-wrap">
                           <div class="product-category">
                              <a href="shop-grid-right.html"></a>
                           </div>
                           <h2><a href="{{ route('product_details',$steroid->id) }}">{{ $steroid->product_title }} </a></h2>
                           <p style="font-size:13px;">{{ $steroid->short_description }} </p>
                           <div>
                              <span class="font-small text-muted">By <a href="vendor-details-1.html">
                              {{ $steroid->rVendor->name }} 
                              </a></span>
                           </div>
                           <div class="product-card-bottom">
                              <div class="product-price">
                                 <span>${{ $steroid->discount_price }} </span>
                                 <span class="old-price">${{ $steroid->selling_price }} </span>
                              </div>
                              <div class="add-cart">
                                 <input type="number" value="1" name="qty" min="1" style="height:30px;margin-bottom:20px;margin-left:10px;">
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-xs ml-5"><a href="" class="" style="color:white; ">Add To Cart</a></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               @endforeach
               <!--end product card-->
            </div>
            <!--End product-grid-4-->
            <!--End product-grid-4-->
         </div>
      </div>
      <!--End tab-content-->
   </div>
</section>
<!--End Tshirt Category -->
<!-- Computer Category -->
<section class="product-tabs section-padding position-relative">
   <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
         <h3>Inheler Category </h3>
      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4">
               @foreach($inhelars as $inhelar)
               <div class="col-lg-1-5 col-md-4 col-12 col-sm-6" style="" >
                  <form style="" action="{{ route('your_cart_submit') }}" method="post">
                     @csrf
                     <!-- hidden field -->
                     <input type="hidden" name="product_id" value="{{ $inhelar->id }}">
                     <input type="hidden" name="product_title" value="{{ $inhelar->product_title }}">
                     <input type="hidden" name="discount_price" value="{{ $inhelar->discount_price }}">
                     <!--// hidden field -->
                     <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                           <div class="product-img product-img-zoom">
                              <a href="shop-product-right.html">
                              <img class="default-img" src="{{ asset('uploads/'.$inhelar->photo) }}" alt="" />
                              <img class="hover-img" src="{{ asset('uploads/'.$inhelar->photo) }}" alt="" />
                              </a>
                           </div>
                           <div class="product-badges product-badges-position product-badges-mrg">
                           </div>
                        </div>
                        <div class="product-content-wrap">
                           <div class="product-category">
                              <a href="shop-grid-right.html"></a>
                           </div>
                           <h2><a href="{{ route('product_details',$inhelar->id) }}">{{ $inhelar->product_title }} </a></h2>
                           <p style="font-size:13px;">{{ $inhelar->short_description }} </p>
                           <div>
                              <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $inhelar->rVendor->name }} </a></span>
                           </div>
                           <div class="product-card-bottom">
                              <div class="product-price">
                                 <span>${{ $inhelar->discount_price }} </span>
                                 <span class="old-price">${{ $inhelar->selling_price }} </span>
                              </div>
                              <div class="add-cart">
                                 <input type="number" value="1" name="qty" min="1" style="height:30px;margin-bottom:20px;margin-left:10px;">
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-xs ml-5"><a href="" class="" style="color:white; ">Add To Cart</a></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               @endforeach
               <!--end product card-->
            </div>
            <!--End product-grid-4-->
            <!--End product-grid-4-->
         </div>
      </div>
      <!--End tab-content-->
   </div>
</section>
<!--End Computer Category -->
<!--Vendor List -->
<div class="container">
   <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
      <h3 class="">All Our Vendor List </h3>
      <a class="show-all" href="shop-grid-right.html">
      All Vendors
      <i class="fi-rs-angle-right"></i>
      </a>
   </div>
   <div class="row vendor-grid">
      @php
      $vendor_lists = \App\Models\Vendor::all();
      @endphp
      @foreach ($vendor_lists as $vendor)
      <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
         <div class="vendor-wrap mb-40">
            <div class="vendor-img-action-wrap">
               <div class="vendor-img">
                  <a href="vendor-details-1.html">
                  <img class="default-img" src="{{ asset('uploads/'.$vendor->photo) }}" alt="" />
                  </a>
               </div>
               <div class="product-badges product-badges-position product-badges-mrg">
               </div>
            </div>
            <div class="vendor-content-wrap">
               <div class="d-flex justify-content-between align-items-end mb-30">
                  <div>
                     <div class="product-category">
                        <span class="text-muted">Since 2019</span>
                     </div>
                     <h4 class="mb-5"><a href="vendor-details-1.html">{{ $vendor->name }}</a></h4>
                     <div class="product-rate-cover">
                        <span class="font-small total-product"></span>
                     </div>
                  </div>
               </div>
               <div class="vendor-info mb-30">
                  <ul class="contact-infor text-muted">
                     <li><img src="" alt="" /><strong>Call Us:</strong><span>(+91) - {{ $vendor->phone }}</span></li>
                  </ul>
               </div>
               <a href="vendor-details-1.html" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
<script src="{{ asset('dist-front/js/iziToast.min.js') }}"></script>
<!-- Send Email by Ajax Request -->
<script>
   (function($){
       $("form_subscribe_ajax").on('submit',function(e){
           e.preventDefault();
           $("#loader").show();
           var form = this;
           $.ajax({
               url:$(form).attr('action'),
               method:$(form).attr('method'),
               data: new FormData(form),
               processData:false,
               dataType:'json',
               contentType:false,
               beforeSend:function(){
                   $(form).find('span.error-text').text('');
               },
               success:function(data)
               {
                   $('#loader').hide();
                   if (data.code == 0) {
                       $.each(data.error_message,function(prefix,val){
                           $(form).find('span.'+prefix+'_error').text(val[0]);
                       });
                   }
                   else if (data.code == 1) {
                       $(form)[0].reset();
                       iziToast.success({
                           title:'',
                           position:'topRight',
                           message:data.success_message,
                       });
                   }
               }
           })
       })
   })(jQuery);
</script>
<div id="loader"></div>
<!--// Send Email by Ajax Request -->
@endsection