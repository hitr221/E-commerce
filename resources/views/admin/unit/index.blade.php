@extends('admin.master')
@section('title', 'Add Unit')
@section('body')


    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Unit</h4>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <form class="form-horizontal p-t-20" action="{{ route('unit.new') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="exampleInputuname3"
                                    placeholder="Unit Name">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Code<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="code" type="text" class="form-control" id="exampleInputuname3"
                                    placeholder="Unit Code">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Unit Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" placeholder="Unit Description"></textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1" checked>Published
                                </label>
                                <label><input type="radio" name="status" value="2">Unpublished
                                </label>
                            </div>
                        </div>
                </div>
                <div class="form-group row m-b-0">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New
                            Unit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
