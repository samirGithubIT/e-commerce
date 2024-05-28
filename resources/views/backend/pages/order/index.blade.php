@extends('backend.layout.master')

@section('page-title', 'Order Lists')

@section('content')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.order.search') }}" method="get">
                
                <div class="row d-flex justify-content-space-between mt-3">
                    <div class="col-auto">
                        <select name="user_name" id="user_name" class="form-select">
                            <option value="">--Select User--</option>
                            @foreach (App\Models\User::all() as $user)
                                <option value="{{ $user->id }}" {{ request()->user_name == $user->id ? 'selected': '' }} >{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <select name="payment_status" id="payment_status" class="form-select">
                            <option value="">--Select Payment Status--</option>
                            @foreach (GetPaymentOptions() as $item)
                                <option value="{{ $item }}" {{ request()->payment_status == $item ? 'selected': '' }} >{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-auto">
                        <input type="text" name="order_date" value="{{ request()->order_date }}" class="daterangepickr form-control" placeholder="--Select Date--">
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-info">Search</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h3>List of Orders</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#order No</td>
                            <td>User</td>
                            <td>Total amount</td>
                            <td>Payment Status</td>
                            <td>Order Date</td>
                            <td>Delivery Status</td>
                            <td>more</td>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ( $orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>{!! GetPaymentStatus( $order->status) !!}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{!! GetDeliveryStatus($order->delivery_status) !!}</td>
                                <td>
                                    <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-outline-info">Show More</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                    {!! $orders->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection