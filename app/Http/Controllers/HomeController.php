<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\category;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class  HomeController extends Controller
{
    public function home(){


        // return Auth::user();
        // session()->reflash();

        $categories = category::all();
        return view('frontEnd.pages.home', compact('categories'));
    }

    public function ProductView($productId){

        // dd($productId);

        $product = Product::find($productId);

        $html = view('frontEnd.pages.particles.product_modal', compact('product'))->render();

        $response = [
            'html' => $html,
        ];

        return response()->json($response);
    }

    public function checkoutView()
    {
        // session()->get('cartItems');

        // session()->forget('cartItems');

        return view('frontEnd.pages.checkout');
    }

    public function processCheckout(Request $request)
    {
        // return json_decode($request->cartItems, true);
         
        $response = [];

        if(Auth::check()){
            $response = [
                'redirect_url' => route('billing_details'),
                'success' => true
            ];

            $cartItems =  json_decode($request->cartItems);

            session()->put('cartItems', $cartItems);

        }else{
             $response = [
                'redirect_url' => route('customer.login'),
                'success' => false
            ];
        }


       return response()->json($response) ;
    }

    public function paymentIndex(){

        // -- order id dhorar jonne --
        // return Session::get('order_id');

        $order_id = Session::get('order_id');

        // -- order find korar jonne --
          $order = Order::with('orderDetails')->find($order_id); 

        // -- order details dekhar jonne (method 1) --
        //  $order_details = OrderDetail::where('order_id', $order->id)->get();

        // -- relation korar por --
        // return $order;

        return view('frontEnd.pages.payment', compact('order'));
    }
}
