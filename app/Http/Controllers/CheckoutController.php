<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Billing;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function billingDetailsForm(){
        return view('frontEnd.pages.billing_detail');
    }

    public function billingStore(Request $request){

        // dd(session()->get('cartItems'));
        // return $request->all();

      $cartItems = collect(session()->get('cartItems'));
        //  return $cartItems;

       $totalPrice = $cartItems->sum('price');
        // return $totalPrice;

        // query builder user kore-

        DB::beginTransaction();

        try {
           
            $billing = new Billing;
            $billing->first_name = $request->first_name;
            $billing->last_name = $request->last_name;
            $billing->number = $request->number;
            $billing->address1 = $request->address1;
            $billing->address2 = $request->address2;
            $billing->user_id=auth()->user()->id;
            $billing->save();


            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->order_date =now();
            $order->total_amount = $totalPrice;
            $order->status = 'pending';
            $order->save();

            foreach($cartItems as $item){
                $detail = new OrderDetail;
                $detail->product_id = $item->id;
                $detail->price = $item->price;
                $detail->quantity = $item->quantity;
                $detail->order_id = $order->id;
                $detail->save();
            }



            DB::commit();
            // order id restore korar jonne
            Session::put('order_id', $order->id);
            return redirect()->route('order.payment')->with('success', 'Another step to Go!!');

            // return 'stored';

        } catch (\Exception $e) {
            
            // return $e->getMessage();
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }

        

    }
}
