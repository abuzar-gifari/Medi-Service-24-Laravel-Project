@extends('vendor.layout.app')
@section('heading','All Medicines')
@section('main_content')
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
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($products as $product)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img style="width:90px; height:90px;" src="{{ asset('uploads/'.$product->photo) }}" class="">
                                    </td>
                                    <td>{{ $product->product_title }}</td>
                                    <td>${{ $product->discount_price }}</td>
                                    <td>{{ $product->stock }} </td>
                                    <td>{{ $product->rCategory->name }}</td>
                                    <td class="pt_10 pb_10">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{ $i }}"><i class="fa fa-eye" aria-hidden="true"></i>View</button>
                                        <a href="{{ route('vendor_product_gallery',$product->id) }}" class="btn btn-warning"> <i class="fa fa-image"></i>Gallery</a>
                                        <a href="{{ route('vendor_product_edit',$product->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                        <a href="{{ route('vendor_product_delete',$product->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i>Delete</a>
                                    </td>
                                </tr>


                                <!-- /* The Modal Must Be in the Loop. Inside the ForEach */ -->
                                
                                



    <!-- Start Modal -->
    <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row bdb1 pt_10 mb_0">
                        <div class="col-md-4"><label class="form-label">Product title</label></div>
                        <div class="col-md-8">{{ $product->product_title }}</div>
                    </div>
                    <div class="form-group row bdb1 pt_10 mb_0">
                        <div class="col-md-4"><label class="form-label">Description</label></div>
                        <div class="col-md-8">{!! $product->short_description !!}</div>
                    </div>
                    <div class="form-group row bdb1 pt_10 mb_0">
                        <div class="col-md-4"><label class="form-label">Type</label></div>
                        <div class="col-md-8">{{ $product->type }}</div>
                    </div>
                    <div class="form-group row bdb1 pt_10 mb_0">
                        <div class="col-md-4"><label class="form-label">SKU No</label></div>
                        <div class="col-md-8">{{ $product->sku_no }}</div>
                    </div>
                    <div class="form-group row bdb1 pt_10 mb_0">
                        <div class="col-md-4"><label class="form-label">MFG</label></div>
                        <div class="col-md-8">{{ $product->mfg }}</div>
                    </div>
                    <div class="form-group row bdb1 pt_10 mb_0">
                        <div class="col-md-4"><label class="form-label">Lifetime</label></div>
                        <div class="col-md-8">{{ $product->lifetime }}</div>
                    </div>
                    <div class="form-group row bdb1 pt_10 mb_0">
                        <div class="col-md-4"><label class="form-label">Stock</label></div>
                        <div class="col-md-8">{{ $product->stock }}</div>
                    </div>
                    <div class="form-group row bdb1 pt_10 mb_0">
                        <div class="col-md-4"><label class="form-label">Category</label></div>
                        <div class="col-md-8">{{ $product->rCategory->name }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


                                


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

@section('right_top_button')
    <div class="ml-auto">
        <a href="{{ route('vendor_product_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
    </div>
@endsection