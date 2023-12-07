@extends('admin.master')
@section('title', 'Manage Units')
@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Unit Table</h4>
                    <h6 class="card-subtitle">Unit table example</h6>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Unit Name</th>
                                    <th>Unit Code</th>
                                    <th>Unit Description</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $unit->id }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->code }}</td>
                                        <td>{{ $unit->description }}</td>
                                        <td>{{ $unit->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-success btn-sm"><i
                                                    class="ti-pencil"></i></a>
                                            <a href="{{ route('unit.delete', $unit->id) }}" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete this unit?');"><i
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
