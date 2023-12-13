@extends('admin.master')
@section('title', 'Edit Brand')
@section('body')


    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Brand</h4>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <form class="form-horizontal p-t-20" action="{{ route('brand.update', ['id' => $brand->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="name" value="{{ $brand->name }}" type="text" class="form-control"
                                    id="exampleInputuname3" placeholder="Brand Name">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Brand Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" placeholder="Brand Description">{{ $brand->description }}</textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Brand Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="dropify"
                                    data-default-file="{{ asset($brand->image) }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1"
                                        {{ $brand->status == 1 ? 'checked' : '' }}>Published
                                </label>
                                <label><input type="radio" name="status" value="2"
                                        {{ $brand->status == 2 ? 'checked' : '' }}>Unpublished
                                </label>
                            </div>
                        </div>
                </div>
                <div class="form-group row m-b-0">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
                            Brand</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
