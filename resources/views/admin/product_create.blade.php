@extends('admin.layout.app')
@section('heading','Create Medicine')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_product_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Create Medicine</h4>
                        <div class="form-group mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="product_title" placeholder="enter title">
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Description</label>
                            <input type="text" class="form-control" name="short_description" placeholder="enter title">
                        </div>
                         <div class="form-group mb-3">
                            <label>Long Description</label>
                            <textarea name="long_description" class="form-control snote" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Selling price</label>
                            <input type="text" class="form-control" name="selling_price" value="{{ old('selling_price') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Discount Rate</label>
                            <input type="text" class="form-control" name="discount_rate" value="{{ old('discount_rate') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Sku No</label>
                            <input type="text" class="form-control" name="sku_no" value="{{ old('sku_no') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>MFG</label>
                            <input type="text" class="form-control" name="mfg" value="{{ old('mfg') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Lifetime</label>
                            <input type="text" class="form-control" name="lifetime" value="{{ old('lifetime') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Stock</label>
                            <input type="text" class="form-control" name="stock" value="{{ old('stock') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Featured?</label>
                            <select name="is_featured">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection

@section('button')
    <div class="ml-auto">
        <a href="{{ route('admin_product_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection