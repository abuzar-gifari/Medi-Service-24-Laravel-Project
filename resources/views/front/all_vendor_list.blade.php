@extends('front.layout.app')
@section('content')
<div class="container">
   <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
      <h3 class="mt-3">All Our Vendor List </h3>
      <a class="show-all" href="shop-grid-right.html">
      All Vendors
      <i class="fi-rs-angle-right"></i>
      </a>
   </div>
   @php
      $vendor_lists = \App\Models\Vendor::get();
   @endphp
   <div class="row vendor-grid">
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
                     <span class="hot">Vendor</span>
                  </div>
               </div>
               <div class="vendor-content-wrap">
                  <div class="d-flex justify-content-between align-items-end mb-30">
                     <div>
                        <div class="product-category">
                           <span class="text-muted">Since 2012</span>
                        </div>
                        <h4 class="mb-5"><a href="vendor-details-1.html">{{ $vendor->name }}</a></h4>
                        <div class="product-rate-cover">
                           <span class="font-small total-product">Since 2019</span>
                        </div>
                     </div>
                  </div>
                  <div class="vendor-info mb-30">
                     <ul class="contact-infor text-muted">
                        <li><img src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>(+91) - {{ $vendor->phone }}</span></li>
                     </ul>
                  </div>
                  <a href="vendor-details-1.html" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
               </div>
            </div>
         </div>

      @endforeach
      
      <!--end vendor card-->
   </div>
</div>
@endsection