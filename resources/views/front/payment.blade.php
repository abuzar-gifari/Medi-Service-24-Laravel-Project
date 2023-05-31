@extends('front.layout.app')

@section('content')

<!-- Integrate Paypal -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 checkout-left">

                

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
                    $total_price = $total_price+($product_data->discount_price*$arr_cart_qty[$i]);
                }
                @endphp
    
                {{-- <h4>Make Payment</h4>
                <select name="payment_method" class="form-control select2" id="paymentMethodChange" autocomplete="off">
                    <option value="">Select Payment Method</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Stripe">Stripe</option>
                </select> --}}

                <div class="paypal mt_20">
                    <h4>Pay with PayPal</h4> 
                    <div id="paypal-button"></div>
                </div>

                <div class="stripe mt_20">
                    <h4>Pay with Stripe</h4>
                    @php
                        $cents = $total_price*100;
                        $customer_email = Auth::guard('customer')->user()->email;
                        $stripe_publishable_key = 'pk_test_51JeC9fBYPKDnQGbG8V1kCDGyYcNgycbKwDsiAYIFefesBjs0YzJCCZXwXHNlNdtsMrRiEDvEFrr2val83FsshWuJ00tad6Euu6';
                    @endphp
                    <form action="{{ route('stripe',$total_price) }}" method="post">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ $stripe_publishable_key }}"
                            data-amount="{{ $cents }}"
                            data-name="{{ env('APP_NAME') }}"
                            data-description=""
                            data-image="{{ asset('stripe_icon.png') }}"
                            data-currency="usd"
                            data-email="{{ $customer_email }}"
                        >
                        </script>
                    </form>
                </div>

            </div>







            <div class="col-lg-4 col-md-4 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Billing Details</h4>
                    <div>
                        Name: {{ session()->get('billing_name') }}
                    </div>
                    <div>
                        Email: {{ session()->get('billing_email') }}
                    </div>
                    <div>
                        Phone: {{ session()->get('billing_phone') }}
                    </div>
                    <div>
                        Country: {{ session()->get('billing_country') }}
                    </div>
                    <div>
                        Address: {{ session()->get('billing_address') }}
                    </div>
                    <div>
                        State: {{ session()->get('billing_state') }}
                    </div>
                    <div>
                        City: {{ session()->get('billing_city') }}
                    </div>
                    <div>
                        Zip: {{ session()->get('billing_zip') }}
                    </div>
                </div>
            </div>











            <div class="col-lg-4 col-md-6 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Cart Details</h4>
                    <div class="table-responsive">
                        <table class="table">
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
                                        <td>
                                            {{ $product_data->product_title }}
                                            <br>
                                            Quantity: {{ $arr_cart_qty[$i] }}
                                        </td>
                                        <td class="p_price">
                                            @php
                                                echo '$'.$product_data->discount_price*$arr_cart_qty[$i];
                                            @endphp
                                        </td>
                                    </tr>
                                    @php
                                    $total_price = $total_price+($product_data->discount_price*$arr_cart_qty[$i]);
                                }
                                @endphp
                                <tr>
                                    <td><b>Total:</b></td>
                                    <td class="p_price"><b>${{ $total_price }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>








        </div>
    </div>
</div>


@php
    $client='AVxAVMrGZpPkOfwWKX0uR4e8aXiM8aKNA_Z3C-Q6xyYLeFwxnvn2S2XlLni2ActwHcxS5tEHEq9ax09Z';
    // $final_price = '5';
@endphp

<script>
	paypal.Button.render({
		env: 'sandbox',
		client: {
			sandbox: '{{ $client }}',
			production: '{{ $client }}'
		},
		locale: 'en_US',
		style: {
			size: 'medium',
			color: 'blue',
			shape: 'rect',
		},
		// Set up a payment
		payment: function (data, actions) {
			return actions.payment.create({
				redirect_urls:{
					return_url: '{{ url("payment/paypal/$total_price") }}'
				},
				transactions: [{
					amount: {
						total: '{{ $total_price }}',
						currency: 'USD'
					}
				}]
			});
		},
		// Execute the payment
		onAuthorize: function (data, actions) {
			return actions.redirect();
		}
	}, '#paypal-button');
</script>






@endsection