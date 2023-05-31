<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorProfileController extends Controller
{
    public function index()
    {
        return view('vendor.profile');
    }

    public function profile_submit(Request $request)
    {
        $vendor_data = Vendor::where('email',Auth::guard('vendor')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $vendor_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if($vendor_data->photo != NULL) {
                unlink(public_path('uploads/'.$vendor_data->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $vendor_data->photo = $final_name;
        }

        
        $vendor_data->name = $request->name;
        $vendor_data->email = $request->email;
        $vendor_data->phone = $request->phone;
        $vendor_data->country = $request->country;
        $vendor_data->address = $request->address;
        $vendor_data->state = $request->state;
        $vendor_data->city = $request->city;
        $vendor_data->zip = $request->zip;
        $vendor_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully.');
    }
}
