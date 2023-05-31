@extends('delivery_boy.layout.app')

@section('heading', 'Edit Profile')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('delivery_boy_profile_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                @php
                                if(Auth::guard('delivery_boy')->user()->photo != '') {
                                    $delivery_boy_photo = Auth::guard('delivery_boy')->user()->photo;
                                } else {
                                    $delivery_boy_photo = 'default.png';
                                }
                                @endphp
                                <img src="{{ asset('uploads/'.$delivery_boy_photo) }}" alt="" class="profile-photo w_100_p">
                                <input type="file" class="form-control mt_10" name="photo">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::guard('delivery_boy')->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Email *</label>
                                            <input type="text" class="form-control" name="email" value="{{ Auth::guard('delivery_boy')->user()->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ Auth::guard('delivery_boy')->user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country" value="{{ Auth::guard('delivery_boy')->user()->country }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ Auth::guard('delivery_boy')->user()->address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" value="{{ Auth::guard('delivery_boy')->user()->state }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ Auth::guard('delivery_boy')->user()->city }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Zip</label>
                                            <input type="text" class="form-control" name="zip" value="{{ Auth::guard('delivery_boy')->user()->zip }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Retype Password</label>
                                            <input type="password" class="form-control" name="retype_password">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection