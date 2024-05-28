@extends('frontEnd.layouts.masters')

@section('table_content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="card-title">My Orders</div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#order No</td>
                            <td>Total amount</td>
                            <td>Payment Status</td>
                            <td>Order Date</td>
                            <td>Delivery Status</td>
                            <td></td>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ( $orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>{!! GetPaymentStatus( $order->status) !!}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{!! GetDeliveryStatus($order->delivery_status) !!}</td>
                                <td>
                                    <a href="{{ route('show-order', $order->id) }}" class="btn btn-outline-info">Show More</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection