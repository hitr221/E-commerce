@extends('admin.master')
@section('title', 'Edit Product')
@section('body')


    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <form class="form-horizontal p-t-20" action="{{ route('product.update', ['id' => $product->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control" id="categoryId">
                                    {{-- <option value="" disabled selected>-- Select Category --</option> --}}
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Sub Category Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="sub_category_id" class="form-control" id="subCategoryId">
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}"
                                            {{ $subCategory->id == $product->subCategory_id ? 'selected' : '' }}>
                                            {{ $subCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Brand Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="brand_id" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Unit Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="unit_id" class="form-control">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ $unit->id == $product->unit_id ? 'selected' : '' }}>
                                            {{ $unit->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" value="{{$product->name}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Code<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="code" type="text" class="form-control" value="{{$product->code}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Model</label>
                            <div class="col-sm-9">
                                <input name="model" type="text" class="form-control" value="{{$product->model}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Product Stock Amount<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="stock_amount" type="number" class="form-control" value="{{$product->stock_amount}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Product Price<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input name="regular_price" type="number" class="form-control"
                                        value="{{$product->regular_price}}">
                                    <input name="selling_price" type="number" class="form-control"
                                        value="{{$product->selling_price}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description">{{$product->short_description}}</textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Long Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="long_description">{{$product->long_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify"
                                data-default-file="{{ asset($product->image) }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" multiple id="input-file-now" class="dropify"
                                    accept="image/*" data-default-file="@foreach ($product->otherImages as $otherImage)
                                        {{ asset($otherImage->image) }}
                                    @endforeach"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1"
                                    {{ $product->status == 1 ? 'checked' : '' }}>Published
                            </label>
                            <label><input type="radio" name="status" value="2"
                                    {{ $product->status == 2 ? 'checked' : '' }}>Unpublished
                            </label>
                            </div>
                        </div>
                </div>
                <div class="form-group row m-b-0">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
                            Product</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
