<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrders()
    {
        $orders = Order::all();
        return view('order.all')->with([
            'orders' => $orders
        ]);
    }

//    public function addOrder(Request $request, $id)
//    {
//        dd('hey');
//    }
    public function addOrder(Request $request, $id)
    {
//        dd($id);
        $service = Service::find($id);
//        dd($service);
        $order = new Order();
        $order->customer_id = 1;
//        dd($order->customer_id);
        $order->service_id = $service->id;
        $order->quantity = $request->input('quantity');
        $order->total = ($service->price * $order->quantity);
        $order->status = $request->input('status');
        $order->save();
//        dd($service);
        return redirect()->route('all.orders');
    }
}



