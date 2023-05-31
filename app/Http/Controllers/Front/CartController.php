<?php

namespace App\Http\Controllers\Front;

use Stripe;
use Stripe\Charge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use App\Models\OrderDetail;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\DB;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail; 
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;

class CartController extends Controller
{
    public function cart_view(){
        return view('front.page_cart');
    }
    
    public function wishlist_view(){
        return view('front.page_wishlist');
    }

    public function your_cart_submit(Request $request){
        $request->validate([
            'product_id' => 'required',
            'product_title' => 'required',
            'discount_price' => 'required',
            'qty' => 'required',

        ]);
        
        // Put The Requested Data Into Session
        session()->push('product_id',$request->product_id);
        session()->push('product_title',$request->product_title);
        session()->push('discount_price',$request->discount_price);
        session()->push('qty',$request->qty);

        
        return redirect()->back()->with('success', 'Product is added to the cart successfully.');
    }

    

    // Add To Cart Item Delete
    public function your_cart_delete($id)
    {
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

        session()->forget('product_id');
        session()->forget('product_title');
        session()->forget('discount_price');
        session()->forget('qty');

        for($i=0;$i<count($arr_cart_product_id);$i++)
        {
            if($arr_cart_product_id[$i] == $id) 
            {
                continue;
            }
            else
            {
                session()->push('product_id',$arr_cart_product_id[$i]);
                session()->push('product_title',$arr_cart_product_title[$i]);
                session()->push('discount_price',$arr_cart_discount_price[$i]);
                session()->push('qty',$arr_cart_qty[$i]);
            }
        }

        return redirect()->back()->with('success', 'Cart item is deleted.');

    }


    
    // Checkout
    public function your_checkout()
    {
        if(!Auth::guard('customer')->check()) {
            return redirect()->back()->with('error', 'You must have to login in order to checkout');
        }


        return view('front.page_checkout');
    }





    // Payment Page Show
    public function payment(Request $request)
    {
        if(!Auth::guard('customer')->check()) {
            return redirect()->back()->with('error', 'You must have to login in order to checkout');
        }


        $request->validate([
            'billing_name' => 'required',
            'billing_email' => 'required|email',
            'billing_phone' => 'required',
            'billing_country' => 'required',
            'billing_address' => 'required',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_zip' => 'required'
        ]);

        session()->put('billing_name',$request->billing_name);
        session()->put('billing_email',$request->billing_email);
        session()->put('billing_phone',$request->billing_phone);
        session()->put('billing_country',$request->billing_country);
        session()->put('billing_address',$request->billing_address);
        session()->put('billing_state',$request->billing_state);
        session()->put('billing_city',$request->billing_city);
        session()->put('billing_zip',$request->billing_zip);

        return view('front.payment');
    }






    // Payment using Paypal
    public function paypal($final_price)
    {
        $client = 'AVxAVMrGZpPkOfwWKX0uR4e8aXiM8aKNA_Z3C-Q6xyYLeFwxnvn2S2XlLni2ActwHcxS5tEHEq9ax09Z';
        $secret = 'ENFrPoyFqY32KGoRzOYRJRc9pVjlP6p6xvQNBnQY24MZ8US_G97pYf3RR3mZCOuD4A3t6_AaYDn1AZ8C';

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $client, // ClientID
                $secret // ClientSecret
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($final_price);

        $amount->setCurrency('USD');
        $amount->setTotal($final_price);
        $amount->setDetails($details);
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $apiContext);

        if($result->state == 'approved')
        {
            $paid_amount = $result->transactions[0]->amount->total;
            
            $order_no = time();

            $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
            $ai_id = $statement[0]->Auto_increment;

            $obj = new Order();
            $obj->customer_id = Auth::guard('customer')->user()->id;
            $obj->order_no = $order_no;
            $obj->transaction_id = $result->id;
            $obj->payment_method = 'PayPal';
            $obj->paid_amount = $paid_amount;
            $obj->status = 'Completed';
            $obj->save();
            
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



            for($i=0;$i<count($arr_cart_product_id);$i++)
            {
                $p_info = Product::where('id',$arr_cart_product_id[$i])->first();
                $sub = $p_info->discount_price*$arr_cart_qty[$i];

                $obj = new OrderDetail();
                $obj->order_id = $ai_id;
                $obj->product_id = $arr_cart_product_id[$i];
                $obj->qty = $arr_cart_qty[$i];
                $obj->order_no = $order_no;
                $obj->subtotal = $sub;
                $obj->save();

            }

            session()->forget('product_id');
            session()->forget('product_title');
            session()->forget('discount_price');
            session()->forget('qty');
            session()->forget('billing_name');
            session()->forget('billing_email');
            session()->forget('billing_phone');
            session()->forget('billing_country');
            session()->forget('billing_address');
            session()->forget('billing_state');
            session()->forget('billing_city');
            session()->forget('billing_zip');

            return redirect()->route('home')->with('success', 'Payment is successful');
        }
        else
        {
            return redirect()->route('home')->with('error', 'Payment is failed');
        }


    }
    

    public function invoice($id)
    {
        $order = Order::where('id',$id)->first();
        $order_detail = OrderDetail::where('order_id',$id)->get();
        $customer_data = Customer::where('id',$order->customer_id)->first();
        return view('customer.invoice', compact('order','order_detail','customer_data'));
    }

}
