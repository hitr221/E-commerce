@extends('admin.master')
@section('title', 'Manage Order')
@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Order Information</h4>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Order No</th>
                                    <th>Customer Info</th>
                                    <th>Order Date</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer->name. ' (' .$order->customer->mobile .')' }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->order_total }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>
                                            <a href="{{ route('admin.order-detail', ['id' => $order->id]) }}"
                                                class="btn btn-info btn-sm" title="View Order Detail"><i class="ti-book"></i></a>
                                            <a href="{{ route('admin.order-edit', $order->id) }}"
                                                class="btn btn-success btn-sm" title="Order Edit"><i class="ti-pencil"></i></a>
                                            <a href="{{ route('admin.order-invoice', ['id' => $order->id]) }}"
                                                class="btn btn-primary btn-sm" title="View Order Invoice"><i class="ti-reddit"></i></a>
                                            <a href="{{ route('admin.order-print-invoice', ['id' => $order->id]) }}"
                                                class="btn btn-warning btn-sm" title="Print Order Invoice"><i class="ti-dropbox"></i></a>
                                            <a href="{{ route('admin.order-delete', $order->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete this order?');"><i
                                                    class="ti-trash" title="Delete Order"></i></a>
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
