@extends('frontEnd.layouts.masters')

@section('content')
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bg="img/bg/9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">Checkout</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    {{-- cart area --}}


    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Order Details</h4>
                            <div class="ltn__checkout-single-content-info">

                                <table class="table">
                                    <tr>
                                        <th>Product image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>

                                    @foreach ($order->orderDetails as $detail)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($detail->product->image ? Storage::url($detail->product->image) : 'assets/asset/img/No Product Image.png') }}" alt="#" style="height: 100px">
                                            </td>
                                            <td>{{ $detail->product->name }}</td>
                                            <td>{{ $detail->quantity }}</td>
                                            <td>{{ $detail->price }}</td>
                                        </tr>
                                    @endforeach

                                        <tr>
                                            <th colspan="3"><strong>Total Amount:</strong></th>
                                            <td>{{ $order->total_amount }}</td>
                                        </tr>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Choose payment method</h4>
                            <div class="ltn__checkout-single-content-info">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="{{ url('/bkash/payment') }}">
                                                    <img src="https://www.logo.wine/a/logo/BKash/BKash-bKash-Logo.wine.svg" alt="bkash">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="">
                                                    <img src="https://www.logo.wine/a/logo/Nagad/Nagad-Horizontal-Logo.wine.svg" alt="nagad">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>         
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->
    `
@endsection
