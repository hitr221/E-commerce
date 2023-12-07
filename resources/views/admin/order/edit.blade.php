@extends('admin.master')
@section('title', 'Edit Order')
@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Information</h4>
                    <h3 class="text-center text-warning">{{ Session('message') }}</h3>
                    <form action="{{route('admin.update-order', ['id' => $order->id])}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-3">Customer Info</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="{{$order->customer->name." (".$order->customer->mobile.")"}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order ID</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="{{$order->id}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Total</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="{{$order->order_total}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Status</label>
                            <div class="col-md-9">
                                <select name="order_status" class="form-control">
                                    <option {{$order->order_status == "Pending" ? 'selected' : '' }} value="Pending">Pending</option>
                                    <option {{$order->order_status == "Processing" ? 'selected' : '' }} value="Processing">Processing</option>
                                    <option {{$order->order_status == "Complete" ? 'selected' : '' }} value="Complete">Complete</option>
                                    <option {{$order->order_status == "Cancel" ? 'selected' : '' }} value="Cancel">Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Delivery Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success w-100" value="Update Order">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
