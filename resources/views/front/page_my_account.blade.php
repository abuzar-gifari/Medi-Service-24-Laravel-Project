@extends('front.layout.app')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Hello {{ Auth::guard('customer')->user()->name }}!</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                            manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            @php
                                                $orders = \App\Models\Order::where('customer_id',Auth::guard('customer')->user()->id)->get();
                                            @endphp
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order No</th>
                                                        <th>Payment Method</th>
                                                        <th>Paid Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_no }}</td>
                                                            <td>{{ $order->payment_method }}</td>
                                                            <td>{{ $order->paid_amount }}</td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" name="enq">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input class="form-control" name="name" type="text" value="{{ Auth::guard('customer')->user()->name }}" readonly/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="phone"  value="{{ Auth::guard('customer')->user()->email }}" readonly/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Phone <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="phone" type="text"  value="{{ Auth::guard('customer')->user()->phone }}" readonly/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Country <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="country" type="text"  value="{{ Auth::guard('customer')->user()->country }}" readonly/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>State <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="phone" type="text"  value="{{ Auth::guard('customer')->user()->state }}" readonly/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>City <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="country" type="text"  value="{{ Auth::guard('customer')->user()->city }}" readonly/>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="email" type="email"  value="{{ Auth::guard('customer')->user()->address }}" readonly/>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection