@extends('admin.layout.app')
@section('heading','Edit Product')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_product_update',$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Existing Photo</label>
                            <img style="width: 30%; height:30%;" src="{{ asset('uploads/'.$product->photo) }}" alt="No Image">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Change Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="product_title" placeholder="enter title"  value="{{ $product->product_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Description</label>
                            <input type="text" class="form-control" name="short_description" placeholder="enter title" value="{{ $product->short_description }}">
                        </div>
                         <div class="form-group mb-3">
                            <label>Long Description</label>
                            <textarea name="long_description" class="form-control snote" cols="30" rows="10">{{ $product->long_description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Selling price</label>
                            <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Discount Rate</label>
                            <input type="text" class="form-control" name="discount_rate" value="{{ $product->discount_rate }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" value="{{ $product->type }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Sku No</label>
                            <input type="text" class="form-control" name="sku_no" value="{{ $product->sku_no }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>MFG</label>
                            <input type="text" class="form-control" name="mfg" value="{{ $product->mfg }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Lifetime</label>
                            <input type="text" class="form-control" name="lifetime"  value="{{ $product->lifetime }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Stock</label>
                            <input type="text" class="form-control" name="stock"  value="{{ $product->stock }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Featured?</label>
                            <select name="is_featured">
                                <option value="Yes" @if ($product->category_id == "Yes")
                                    selected
                                @endif>Yes</option>
                                <option value="No" @if ($product->category_id == "No")
                                    selected
                                @endif>No</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $row)
                                    <option value="{{ $row->id }}"
                                    @if ($product->category_id == $row->id)
                                        selected
                                    @endif
                                    >{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Information</button>
        </div>
    </form>
</div>
@endsection

@section('button')
    <div class="ml-auto">
        <a href="{{ route('admin_product_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection
