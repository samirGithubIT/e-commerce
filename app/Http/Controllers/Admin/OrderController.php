<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('backEnd.pages.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function search(Request $request){
        // return $request->all();

        $user_id = $request->user_id;
        $payment_status = $request->payment_status;
        // range use korar jonno explode use korte hobe
        $order_date = explode(' to ',$request->order_date);

        $orders = Order::where(function($query) use($user_id, $payment_status, $order_date){
            // dd($payment_status);
            if(!empty($user_id)){
                $query->where('user_id', $user_id);
            }
            if(!empty($payment_status)){
                $query->where('status', $payment_status);
            }
            if(!empty($order_date) && count($order_date) > 1){
                $query->where('order_date', '>=' ,$order_date[0]);
                $query->where('order_date', '<=' ,$order_date[1]);
            }elseif(!empty($order_date)){
                $query->where('order_date', $order_date);
            }
        })->paginate(10);
        
        return view('backEnd.pages.order.index', compact('orders'));


    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $order = Order::with('orderDetails')->find($id);
        return view('backEnd.pages.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function acceptOrder(Request $request){
        // return $request->all();

        $this->validate($request, ['order_id' => 'required', 'delivery_status' => 'required']);

        $order_id = $request->order_id;
        $delivery_status = $request->delivery_status;

        $order = Order::find($order_id);
        $order->delivery_status = $delivery_status;
        $order->save();

        return redirect()->back()->with('success', 'order '.$delivery_status.' successfully');
    }

    public function viewInvoice()
    {
        $data = [
            'foo' => 'bar'
        ];

        $pdf = PDF::loadView('pdf.document', $data);

        return $pdf->stream('document.pdf');
    }
}
