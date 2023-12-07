@extends('admin.master')
@section('title', 'Add Product')
@section('body')


    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <form class="form-horizontal p-t-20" action="{{ route('product.new') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control" id="categoryId">
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Sub Category Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="sub_category_id" class="form-control" id="subCategoryId">
                                    <option value="" disabled selected>-- Select Sub Category --</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Brand Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="brand_id" class="form-control">
                                    <option value="" disabled selected>-- Select Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Unit Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="unit_id" class="form-control">
                                    <option value="" disabled selected>-- Select Unit --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" placeholder="Name">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Code<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="code" type="text" class="form-control" placeholder="Code">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Model</label>
                            <div class="col-sm-9">
                                <input name="model" type="text" class="form-control" placeholder="Model Name">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Product Stock Amount<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="stock_amount" type="number" class="form-control" placeholder="Stock Amount">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Product Price<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input name="regular_price" type="number" class="form-control"
                                        placeholder="Regular Price">
                                    <input name="selling_price" type="number" class="form-control"
                                        placeholder="Selling Price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description" placeholder="Short Description"></textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Long Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="long_description" placeholder="Long Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify"
                                    accept="image/*" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" multiple id="input-file-now" class="dropify"
                                    accept="image/*" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1"
                                        checked>Published
                                </label>
                                <label><input type="radio" name="status" value="2">Unpublished
                                </label>
                            </div>
                        </div>
                </div>
                <div class="form-group row m-b-0">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New
                            Product</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
