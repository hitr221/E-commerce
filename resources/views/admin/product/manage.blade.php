@extends('admin.master')
@section('title', 'Manage Products')
@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Product Information</h4>
                    <h6 class="card-subtitle">Product table example</h6>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Product Name</th>
                                    <th>Code</th>
                                    <th>Model</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->model }}</td>
                                        <td><img src="{{ asset($product->image) }}" alt="{{ $product->image }}"
                                            height="50" width="80" /></td>
                                        <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td justify-content-between>
                                            <a href="{{ route('product.detail', $product->id) }}"
                                                class="btn btn-primary btn-sm"><i class="ti-reddit"></i></a>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-success btn-sm"><i class="ti-pencil"></i></a>
                                            <a href="{{ route('product.delete', $product->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete this product?');"><i
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
