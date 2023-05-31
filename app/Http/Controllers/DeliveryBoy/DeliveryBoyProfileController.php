<?php

namespace App\Http\Controllers\DeliveryBoy;

use App\Models\DeliveryBoy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeliveryBoyProfileController extends Controller
{
    public function index()
    {
        return view('delivery_boy.profile');
    }

    public function delivery_boy_profile_submit(Request $request)
    {
        $delivery_boy_data = DeliveryBoy::where('email',Auth::guard('delivery_boy')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $delivery_boy_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if($delivery_boy_data->photo != NULL) {
                unlink(public_path('uploads/'.$delivery_boy_data->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $delivery_boy_data->photo = $final_name;
        }

        
        $delivery_boy_data->name = $request->name;
        $delivery_boy_data->email = $request->email;
        $delivery_boy_data->phone = $request->phone;
        $delivery_boy_data->country = $request->country;
        $delivery_boy_data->address = $request->address;
        $delivery_boy_data->state = $request->state;
        $delivery_boy_data->city = $request->city;
        $delivery_boy_data->zip = $request->zip;
        $delivery_boy_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully.');
    }
}
