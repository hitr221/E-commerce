@extends('admin.master')
@section('title', 'Product Details')
@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products Long Detail</h4>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <div class="table-responsive m-t-20">
                        <table class="table table-striped border">
                                <tr>
                                    <th>SL No</th>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <th>Category Name</th>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Sub Category Name</th>
                                    <td>{{ $product->subCategory->name }}</td>
                                </tr>
                                <tr>
                                    <th>Brand Name</th>
                                    <td>{{ $product->brand->name }}</td>
                                </tr>
                                <tr>
                                    <th>Unit Name</th>
                                    <td>{{ $product->unit->name }}</td>
                                </tr>
                                <tr>
                                    <th>Product Name</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Code</th>
                                    <td>{{ $product->code }}</td>
                                </tr>
                                <tr>
                                    <th>Model</th>
                                    <td>{{ $product->model }}</td>
                                </tr>
                                <tr>
                                    <th>Stock Amount</th>
                                    <td>{{ $product->stock_amount }}</td>
                                </tr>
                                <tr>
                                    <th>Regular Price</th>
                                    <td>{{ $product->regular_price }}</td>
                                </tr>
                                <tr>
                                    <th>Sell Price</th>
                                    <td>{{ $product->selling_price }}</td>
                                </tr>
                                <tr>
                                    <th>Short Description</th>
                                    <td>{{ $product->short_description }}</td>
                                </tr>
                                <tr>
                                    <th>Long Description</th>
                                    <td>{!!$product->long_description!!}</td>
                                </tr>
                                <tr>
                                    <th>Feature Image</th>
                                    <td><img src="{{ asset($product->image) }}" alt="{{ $product->image }}"height="100" width="120"/></td>
                                </tr>
                                <tr>
                                    <th>Other Images</th>
                                    <td>
                                        @foreach ($product->otherImages as $otherImage)
                                            <img src="{{ asset($otherImage->image) }}" alt="{{ $otherImage->image }}" height="100" width="120" />
                                        @endforeach

                                    </td>
                                </tr>
                                <tr>
                                    <th>Hit Count</th>
                                    <td>{{ $product->hit_count }}</td>
                                </tr>
                                <tr>
                                    <th>Sell Count</th>
                                    <td>{{ $product->sell_count }}</td>
                                </tr>
                                <tr>
                                    <th>Feature Status</th>
                                    <td>{{ $product->featured_status == 1 ? 'Featured' : 'Not Featured'  }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-success btn-sm"><i class="ti-pencil"></i></a>
                                        <a href="{{ route('product.delete', $product->id) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure to delete this product?');"><i
                                                class="ti-trash"></i></a>
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
