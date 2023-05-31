@extends('front.layout.app')
@section('content')
<main class="main">
   <div class="page-header breadcrumb-wrap">
      <div class="container">
         <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
            <span></span> Checkout
         </div>
      </div>
   </div>
   <div class="container mb-80 mt-50">
      <div class="row">
         <div class="col-lg-8 mb-40">
            <h3 class="heading-2 mb-10">Checkout</h3>
            <div class="d-flex justify-content-between">
               @php
               $arr_cart_product_id = array();
               $i=0;
               foreach(session()->get('product_id') as $value) {
               $arr_cart_product_id[$i] = $value;
               $i++;
               }
               @endphp
               <h6 class="text-body">There are <span style="color:red;">{{ count($arr_cart_product_id)  }}</span>  products in your cart</h6>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-7">
            <div class="row">
               <h4 class="mb-30">Billing Details</h4>
               <form action="{{ route('payment') }}" method="post">
                  @csrf
                  @php
                  if(session()->has('billing_name')) {
                  $billing_name = session()->get('billing_name');
                  } else {
                  $billing_name = Auth::guard('customer')->user()->name;
                  }
                  if(session()->has('billing_email')) {
                  $billing_email = session()->get('billing_email');
                  } else {
                  $billing_email = Auth::guard('customer')->user()->email;
                  }
                  if(session()->has('billing_phone')) {
                  $billing_phone = session()->get('billing_phone');
                  } else {
                  $billing_phone = Auth::guard('customer')->user()->phone;
                  }
                  if(session()->has('billing_country')) {
                  $billing_country = session()->get('billing_country');
                  } else {
                  $billing_country = Auth::guard('customer')->user()->country;
                  }
                  if(session()->has('billing_address')) {
                  $billing_address = session()->get('billing_address');
                  } else {
                  $billing_address = Auth::guard('customer')->user()->address;
                  }
                  if(session()->has('billing_state')) {
                  $billing_state = session()->get('billing_state');
                  } else {
                  $billing_state = Auth::guard('customer')->user()->state;
                  }
                  if(session()->has('billing_city')) {
                  $billing_city = session()->get('billing_city');
                  } else {
                  $billing_city = Auth::guard('customer')->user()->city;
                  }
                  if(session()->has('billing_zip')) {
                  $billing_zip = session()->get('billing_zip');
                  } else {
                  $billing_zip = Auth::guard('customer')->user()->zip;
                  }
                  @endphp
                  <div class="row">
                     <div class="form-group col-lg-6">
                        <input type="text" name="billing_name" value="{{ Auth::guard('customer')->user()->name }}" placeholder="User Name">
                     </div>
                     <div class="form-group col-lg-6">
                        <input type="email" name="billing_email" value="{{ Auth::guard('customer')->user()->email }}" placeholder="Email">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-lg-6">
                        <input type="text" required="" name="billing_phone" value="{{ Auth::guard('customer')->user()->phone }}" placeholder="Phone Number">
                     </div>
                     <div class="form-group col-lg-6">
                        <input type="text" name="billing_country" value="{{ Auth::guard('customer')->user()->country }}" placeholder="Country">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-lg-6">
                        <input type="text" name="billing_address" value="{{ Auth::guard('customer')->user()->address }}" placeholder="User Address">
                     </div>
                     <div class="form-group col-lg-6">
                        <input type="text" name="billing_state" value="{{ Auth::guard('customer')->user()->state }}" placeholder="State">
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-lg-6">
                        <input type="text" name="billing_city" value="{{ Auth::guard('customer')->user()->city }}" placeholder="City">
                     </div>
                     <div class="form-group col-lg-6">
                        <input type="text"  name="billing_zip" value="{{ Auth::guard('customer')->user()->zip }}" placeholder="Zip">
                     </div>
                  </div>
                  <button type="submit" class="btn btn-block btn-large">Go to Paymemt</button>
               </form>
            </div>
         </div>
         <div class="col-lg-5">
            <div class="border p-40 cart-totals ml-30 mb-50">
               <div class="d-flex align-items-end justify-content-between mb-30">
                  <h4>Your Order</h4>
                  <h6 class="text-muted">Subtotal</h6>
               </div>
               <div class="divider-2 mb-30"></div>
               <div class="table-responsive order_table checkout">
                  <table class="table no-border">
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
                        <tr>
                           <td class="image product-thumbnail"><img src="{{ asset('uploads/'.$product_data->photo) }}" alt="#"></td>
                           <td>
                              <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{ $product_data->product_title }}</a></h6>
                              </span>
                           </td>
                           <td>
                              <h6 class="text-muted pl-20 pr-20">x {{ $arr_cart_qty[$i] }}</h6>
                           </td>
                           <td>
                              <h4 class="text-brand">${{ $product_data->discount_price * $arr_cart_qty[$i]}}</h4>
                           </td>
                        </tr>
                        @php 
                        $total_price = $total_price + $product_data->discount_price * $arr_cart_qty[$i];
                        } 
                        @endphp 
                     </tbody>
                  </table>
                  <table class="table no-border">
                     <tbody>
                        <tr>
                           <td class="cart_total_label">
                              <h6 class="text-muted">Grand Total</h6>
                           </td>
                           <td class="cart_total_amount">
                              <h4 class="text-brand text-end">${{ $total_price }}</h4>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection