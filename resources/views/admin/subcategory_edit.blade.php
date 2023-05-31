@extends('admin.layout.app')

@section('heading', 'Add subcategory')

@section('button')
<div class="ml-auto">
<a href="{{ route('admin_subcategory_show') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_subcategory_update',$subcategory->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value=" {{ $subcategory->name }} ">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}"
                                            @if ($subcategory->category_id == $row->id)
                                                selected
                                            @endif
                                            >{{ $row->name }}</option>
                                        @endforeach
                                    </select>
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