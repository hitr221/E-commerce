@extends('website.master')
@section('title', 'Checkout Page')
@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul class="nav nav-pills">
                            <li><a href="" class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill">Cash On Delivery</a></li>
                            <li><a href="" class="nav-link" data-bs-target="#online" data-bs-toggle="pill">Online Payment</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="cash">
                                <form action="{{route('new-cash-order')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Full Name</label>
                                                    <div class="col-md-12 form-input form">
                                                        @if (isset($customer->id))
                                                        <input type="text" required name="name" value="{{$customer->name}}" readonly placeholder="Full Name">
                                                        @else
                                                        <input type="text" required name="name" placeholder="Full Name">
                                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                        @endif
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    @if (isset($customer->id))
                                                    <input type="email" name="email" value="{{$customer->email}}" readonly required placeholder="Email Address">
                                                    @else
                                                    {{-- <input type="email" name="email" required placeholder="Email Address" id="email"> --}}
                                                    {{-- <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span> --}}
                                                    <input type="email" name="email" onblur="checkCustomerEmail(this.value)" required placeholder="Email Address">
                                                    <span class="text-danger" id="customerEmailError"></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    @if (isset($customer->id))
                                                    <input type="number" name="mobile" value="{{$customer->mobile}}" readonly required placeholder="Phone Number">
                                                    @else
                                                    <input type="number" name="mobile" required placeholder="Phone Number"  id="mobile">
                                                    <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Delivery Address</label>
                                                <div class="form-input form">
                                                    <textarea name="delivery_address" style="height: 100px; padding-top: 10px" placeholder="Delivery Address"></textarea>
                                                    <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Payment Type</label>
                                                <div class="input-group">
                                                    <label><input type="radio" name="payment_type" value="1" checked> Cash On Delivery</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3" checked>
                                                <label for="checkbox-3"><span></span></label>
                                                <p>I accept all terms and conditions</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button class="btn" id="confirmBtn" type="submit">Confirm Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show px-3 my-2" id="online">
                                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="firstName">Full name</label>
                                            {{-- @if (isset($customer->id))
                                            <input type="text" name="name" class="form-control" id="customer_name" placeholder=""
                                                value="{{$customer->name}}" readonly required>
                                            @else --}}
                                            <input type="text" name="name" class="form-control" id="customer_name" placeholder="Your Name"
                                                required/>
                                            {{-- @endif --}}
                                            <div class="invalid-feedback">
                                                Valid customer name is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="mobile">Mobile</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+88</span>
                                            </div>
                                            {{-- @if (isset($customer->id))
                                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile"
                                                value="{{$customer->mobile}}" readonly required>
                                            @else --}}
                                            <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Mobile"
                                                 required/>
                                            {{-- @endif --}}
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Your Mobile number is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        {{-- @if (isset($customer->id))
                                        <input type="email" name="email" class="form-control" id="email"
                                             value="{{$customer->email}}" readonly required>
                                        @else --}}
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="you@example.com" required/>
                                        {{-- @endif --}}
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        {{-- @if (isset($customer->id))
                                        <textarea name="delivery_address" class="form-control" id="address" placeholder="Delivery Address"
                                            value="{{$customer->address}}" readonly required></textarea>
                                        @else --}}
                                        <textarea name="delivery_address" class="form-control" id="address" placeholder="Delivery Address"
                                             required></textarea>
                                        {{-- @endif --}}
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="country">Country</label>
                                            <select class="custom-select d-block w-100 form-control" id="country" required>
                                                <option value="">Choose...</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid country.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="state">State</label>
                                            <select class="custom-select d-block w-100 form-control" id="state" required>
                                                <option value="">Choose...</option>
                                                <option value="Dhaka">Dhaka</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Zip code required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Payment Type</label>
                                            <div class="input-group">
                                                <label><input type="radio" name="payment_type" value="2" checked> Online</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-33" checked>
                                            <label for="checkbox-33"><span></span></label>
                                            <p>I accept all terms and conditions</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Shopping Cart Summary</h5>
                            <div class="sub-total-price">
                                @php($total = 0)
                                @foreach (ShoppingCart::all() as $cart_product)
                                <div class="total-price">
                                    <p class="value">{{$cart_product->name}} ({{$cart_product->qty}}x - TK. {{$cart_product->price}}):</p>
                                    <p class="price">TK. {{$cart_product->total}}</p>
                                </div>
                                @php($total += $cart_product->total)
                                @endforeach
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subtotal Price:</p>
                                    <p class="price">TK. {{$total}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax (15%):</p>
                                    <p class="price">TK. {{$tax = round($total*0.15)}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Cost(100):</p>
                                    <p class="price">TK. {{$shipping = 100}}</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Payable:</p>
                                    <p class="price">TK. {{$orderTotal = $total + $tax + $shipping}}</p>
                                </div>
                                <?php
                                    Session::put('order_total', $orderTotal);
                                    Session::put('tax_total', $tax);
                                    Session::put('shipping_total', $shipping);
                                ?>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{ asset('/') }}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
