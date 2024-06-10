<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function addOrder(Request $request)
    {
        $order = new Order();
        $order->customer_id = 2;
        $order->total_price = 20;
        $order->payment_type = $request->input('payment_type');
        $order->status = $request->input('status');
        $order->save();
//        dd($order);
        $carts = Cart::where('customer_id', 1)->get();
        foreach ($carts as $_cart) {
            Order_detail::create(
                [
                    'order_id' => $order->id,
                    'service_id' => $_cart->service_id,
                    'quantity' => $_cart->quantity,
                ]
            );
            $cart_id = $_cart->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->route('all.services');
    }
}







