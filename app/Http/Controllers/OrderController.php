<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function MyOrderIndex(){

        // login customer er order show korar jonno tar id ~
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('frontEnd.pages.my_order', compact('orders'));

    } 

    public function ShowOrder($order_id){
        // return $order_id;

        // order id k find korar jonne ~

        $order = Order::with('orderDetails')->find($order_id);
        // return $order;

        return view('frontEnd.pages.order_details', compact('order'));

    }
}
