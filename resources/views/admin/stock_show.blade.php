@extends('admin.layout.app')

@section('heading', 'Product Stock')


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
                                    <th>Product</th>
                                    <th>Stock</th>
                                    <th>Purchases</th>
                                    <th>In Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stocks as $stock)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $stock->product_title }}
                                    </td>
                                    <td>
                                        {{ $stock->stock }}
                                    </td>
                                    <td>
                                        @php
                                            $purchases = \App\Models\OrderDetail::select('qty')->where('product_id',$stock->id)->sum('qty');
                                            $stock_now = $stock->stock - $purchases;
                                        @endphp
                                        {{ $purchases }}
                                    </td>
                                    <td>

                                        @if ($stock_now > 0)
                                        {{ $stock_now }}
                                        @else
                                        <button style="border-color:red;" class="btn btn-xs" disabled="disabled">Out of Stock</button>
                                        @endif
                                        

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