@extends('admin.master')
@section('title', 'Manage Sub Category')
@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sub Category Table</h4>
                    <h6 class="card-subtitle">Sub Category table example</h6>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($subCategories as $subCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subCategory->category->name }}</td>
                                        <td>{{ $subCategory->name }}</td>
                                        <td>{{ $subCategory->description }}</td>
                                        <td><img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->image }}"
                                                height="50" width="80" /></td>
                                        <td>{{ $subCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('sub-category.edit', $subCategory->id) }}"
                                                class="btn btn-success btn-sm"><i class="ti-pencil"></i></a>
                                            <a href="{{ route('sub-category.delete', $subCategory->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete this subcategory?');"><i
                                                    class="ti-trash"></i></a>
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
@endsection
