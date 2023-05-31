@extends('front.layout.app')
@section('content')
<div class="page-header breadcrumb-wrap">
   <div class="container">
      <div class="breadcrumb">
         <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
         <span></span> Shop
         <span></span> Cart
      </div>
   </div>
</div>
<div class="container mb-80 mt-50">
   <div class="row">
      <div class="col-lg-8 mb-40">
         <h1 class="heading-2 mb-10">Your Cart</h1>
         <div class="d-flex justify-content-between">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="table-responsive shopping-summery">
            @if(session()->has('product_id'))
            <table class="table table-wishlist">
               <thead>
                  <tr class="main-heading">
                     <th scope="col" >&nbsp;&nbsp;Product</th>
                     <th scope="col">Unit Price</th>
                     <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity</th>
                     <th scope="col">Subtotal</th>
                     <th scope="col" class="end">Remove</th>
                  </tr>
               </thead>
               <tbody>
                  @php
                  $arr_cart_product_id = array();
                  $i=0;
                  foreach(session()->get('product_id') as $value) {
                  $arr_cart_product_id[$i] = $value;
                  $i++;
                  }
                  $arr_cart_product_title = array();
                  $i=0;
                  foreach(session()->get('product_title') as $value) {
                  $arr_cart_product_title[$i] = $value;
                  $i++;
                  }
                  $arr_cart_discount_price = array();
                  $i=0;
                  foreach(session()->get('discount_price') as $value) {
                  $arr_cart_discount_price[$i] = $value;
                  $i++;
                  }
                  $arr_cart_qty = array();
                  $i=0;
                  foreach(session()->get('qty') as $value) {
                  $arr_cart_qty[$i] = $value;
                  $i++;
                  }


                  $total_price = 0;
                  for($i=0;$i<count($arr_cart_product_id);$i++)
                  {
                  $product_data = DB::table('products')->where('id',$arr_cart_product_id[$i])->first();
                  @endphp
                  <tr class="pt-30">
                     <td class="product-des product-name">
                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">&nbsp;&nbsp;{{ $product_data->product_title }}</a></h6>
                     </td>
                     <td class="price" data-title="Price">
                        <h4 class="text-body">${{ $product_data->discount_price }} </h4>
                     </td>
                     <td class="text-center detail-info" data-title="Stock">
                        <div class="detail-extralink ">
                           
                              <p>{{ $arr_cart_qty[$i] }}</p>
                    
                        </div>
                     </td>
                     <td class="price" data-title="Price">
                        <h4 class="text-brand">${{ $product_data->discount_price * $arr_cart_qty[$i]}}</h4>
                     </td>
                     <td>
                        <a href="{{ route('your_cart_delete',$arr_cart_product_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Are you sure?');"><i class="fa fa-times"></i>Remove</a>
                     </td>
                  </tr>
                  @php            
                  } 
                  @endphp
               </tbody>
            </table>
            @else
            <div class="text-danger mb_30">
               Cart is empty!
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
@endsection