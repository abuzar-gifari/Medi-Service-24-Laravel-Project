@extends('admin.layout.app')

@section('heading', 'View SubCategories')

@section('button')
<div class="ml-auto">
<a href="{{ route('admin_subcategory_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->rCategory->name }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_subcategory_edit',$row->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin_subcategory_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
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