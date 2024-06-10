<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function allCarts()
    {
        $carts = Cart::where('customer_id', 1)->get();
//        dd($carts);
//        $services = Service::all();
        return view('cart.all')->with([
            'carts' => $carts,
//            'services' => $services
        ]);
    }

    public function addToCart(Request $request, $id)
    {
//        dd($id);
        $service = Service::find($id);
        $cart = new Cart();
        $cart->customer_id = 1;
        $cart->service_id = $service->id;
        $cart->quantity = $request->input('quantity');
        $cart->total_price = ($service->price*$cart->quantity);
        $cart->save();
//        dd($cart);
        return redirect()->back();
    }
}
