@extends('frontEnd.layouts.masters')

@section('table_content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title">Order Details</div>
                <div>
                    <h4>Delivery Status:{!! GetDeliveryStatus($order->delivery_status) !!}</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ( $order->orderDetails as $detail)
                            <tr>
                                <!-- relation ache tai onno model a jauwa jai -->
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Grand Order: </strong></td>
                            {{-- jog korar jonno --}}
                            <td>{{ $order->orderDetails->sum('quantity') }}</td>
                            <td>{{ $order->total_amount }}</td>
                            {{-- <td>{{ $order->orderDetails->sum('price') }}</td> --}}
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection