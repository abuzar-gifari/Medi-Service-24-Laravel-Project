@extends('admin.layout.app')

@section('heading', 'Customer Orders')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr style="text-align: center">
                                    <th>SL</th>
                                    <th>Order No</th>
                                    <th>Payment Method</th>
                                    <th>Paid Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $row)
                                <tr style="text-align: center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->order_no }}</td>
                                    <td>{{ $row->payment_method }}</td>
                                    <td>{{ $row->paid_amount }}</td>
                                    <td class="">
                                        <a href="{{ route('admin_invoice',$row->id) }}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{ route('admin_order_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection