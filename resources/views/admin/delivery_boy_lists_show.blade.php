@extends('admin.layout.app')

@section('heading', 'View Delivery Boys List')

@section('button')
<div class="ml-auto">

</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Call</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($delivery_boys as $delivery_boy)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$delivery_boy->photo) }}" alt="" class="w_100">
                                    </td>
                                    <td>{{ $delivery_boy->name }}</td>
                                    <td>{{ $delivery_boy->phone }}</td>
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