<?php

namespace App\Http\Controllers\DeliveryBoy;

use App\Models\Customer;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeliveryBoy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DeliveryBoyAuthController extends Controller
{
    public function login()
    {
        return view('front.page_delivery_boy_login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ];

        if(Auth::guard('delivery_boy')->attempt($credential)) {
            return redirect()->route('delivery_boy_home');
        } else {            
            return redirect()->route('delivery_boy_login')->with('error', 'Information is not correct!');
        }
    }

    public function signup()
    {
        return view('front.page_delivery_boy_register');
    }

    public function signup_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'retype_password' =>'required|same:password'
        ]);


        $token = hash('sha256', time());
        $password = Hash::make($request->password);
        $verification_link = url('signup-verify/'.$request->email.'/'.$token);

        $obj = new DeliveryBoy();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        // Send email
        $subject = 'Sign Up Verification';
        $message = 'Please click on the link below to confirm sign up process:<br>';
        $message .= '<a href="'.$verification_link.'">';
        $message .= $verification_link;
        $message .= '</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success_message', 'To complete the signup, please check your email and click on the link');

    }

    public function signup_verify($email,$token)
    {
        $delivery_boy_data = DeliveryBoy::where('email',$email)->where('token',$token)->first();

        if($delivery_boy_data) {
            
            $delivery_boy_data->token = '';
            $delivery_boy_data->status = 1;
            $delivery_boy_data->update();

            return redirect()->route('delivery_boy_login')->with('success', 'Your account is verified successfully!');

        } else {
            return redirect()->route('delivery_boy_login');
        }
    }

    public function logout()
    {
        Auth::guard('delivery_boy')->logout();
        return redirect()->route('delivery_boy_login');
    }

    public function forget_password()
    {
        return view('front.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $customer_data = Customer::where('email',$request->email)->first();
        if(!$customer_data) {
            return redirect()->back()->with('error','Email address not found!');
        }

        $token = hash('sha256',time());

        $customer_data->token = $token;
        $customer_data->update();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link to reset the password: <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('customer_login')->with('success','Please check your email and follow the steps there');

    }


    public function reset_password($token,$email)
    {
        $customer_data = Customer::where('token',$token)->where('email',$email)->first();
        if(!$customer_data) {
            return redirect()->route('customer_login');
        }

        return view('front.reset_password', compact('token','email'));

    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $customer_data = Customer::where('token',$request->token)->where('email',$request->email)->first();

        $customer_data->password = Hash::make($request->password);
        $customer_data->token = '';
        $customer_data->update();

        return redirect()->route('customer_login')->with('success', 'Password is reset successfully');

    }
}
