@extends('admin.layout.app')

@section('heading', 'Order Invoice')

@section('content')
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">Order #{{ $order->order_no }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            @php
                                $customer = \App\Models\Customer::where('id',$order->customer_id)->first();
                            @endphp
                            <address>
                                <strong>Invoice To</strong><br>
                                {{ $customer->name }}<br>
                                {{ $customer->address }},<br>
                                {{ $customer->state }}, {{ $customer->city }}, {{ $customer->zip }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">Instrument information are given below in detail:</p>
                    <hr class="invoice-above-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th>SL</th>
                                <th>Instrument Name</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                            @php $total = 0; @endphp
                            @foreach($order_detail as $item)
                            @php
                            $product_data = \App\Models\Product::where('id',$item->product_id)->first();
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product_data->product_title }}</td>
                                <td class="text-right">
                                    @php
                                    $sub = $item->subtotal;
                                    @endphp
                                    ${{ $sub }}
                                </td>
                            </tr>
                            @php
                            $total += $sub;
                            @endphp
                            @endforeach
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">${{ $total }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="about-print-button">
        <div class="text-md-right">
            <a href="javascript:window.print();" class="btn btn-warning btn-icon icon-left text-white print-invoice-button"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</div>
@endsection