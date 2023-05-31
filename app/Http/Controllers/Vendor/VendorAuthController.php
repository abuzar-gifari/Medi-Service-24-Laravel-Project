<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Websitemail;

class VendorAuthController extends Controller
{
    public function login()
    {
        return view('front.page_vendor_login');
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

        if(Auth::guard('vendor')->attempt($credential)) {
            return redirect()->route('vendor_home');
        } else {            
            return redirect()->route('vendor_login')->with('error', 'Information is not correct!');
        }
    }

    public function signup()
    {
        return view('front.page_vendor_register');
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

        $obj = new Vendor();
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

        return redirect()->route('vendor_login')->with('success', 'To complete the signup, please check your email and click on the link');

    }

    public function signup_verify($email,$token)
    {
        $vendor_data = Vendor::where('email',$email)->where('token',$token)->first();

        if($vendor_data) {
            
            $vendor_data->token = '';
            $vendor_data->status = 1;
            $vendor_data->update();

            return redirect()->route('vendor_login')->with('success', 'Your account is verified successfully!');

        } else {
            return redirect()->route('vendor_login');
        }
    }

    public function logout()
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor_login');
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

        $vendor_data = Vendor::where('email',$request->email)->first();
        if(!$vendor_data) {
            return redirect()->back()->with('error','Email address not found!');
        }

        $token = hash('sha256',time());

        $vendor_data->token = $token;
        $vendor_data->update();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link to reset the password: <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('vendor_login')->with('success','Please check your email and follow the steps there');

    }


    public function reset_password($token,$email)
    {
        $vendor_data = Vendor::where('token',$token)->where('email',$email)->first();
        if(!$vendor_data) {
            return redirect()->route('vendor_login');
        }

        return view('front.reset_password', compact('token','email'));

    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $vendor_data = Vendor::where('token',$request->token)->where('email',$request->email)->first();

        $vendor_data->password = Hash::make($request->password);
        $vendor_data->token = '';
        $vendor_data->update();

        return redirect()->route('vendor_login')->with('success', 'Password is reset successfully');

    }
}  
