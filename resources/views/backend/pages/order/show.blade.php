@extends('backend.layout.master')

@section('page-title', 'Order Lists')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title">Order Details</div>
                <div>
                    <h4>Delivery Status:{!! GetDeliveryStatus($order->delivery_status) !!}</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                @if ($order->delivery_status == 'Delivered')
                    
                <p class="alert alert-primary mt-4">
                    Your Order has been delivered.
                </p>

                @elseif ($order->status == 'paid')
                <form action="{{ route('admin.order.accept') }}" method="post" class="mt-4">

                    @csrf 

                    <div class="my-4">
                        <label class="form-label">Selete Delivery Status</label>
                        <input name="order_id" type="hidden" value="{{ $order->id }}">
                       <select name="delivery_status" class="form-select">

                        <option value="">--Select--</option>
                       @foreach ( GetDeliveryOptions() as $status)
                       
                       <option value="{{ $status }}" @if ($order->delivery_status == $status) selected @endif>{{ $status }}</option>

                       @endforeach
                       </select>
                       
                       @error('delivery_status')
                       <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-warning"> Save </button>
                </form>
                @else
                <p class="alert alert-danger mt-3">customer has not paid</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection