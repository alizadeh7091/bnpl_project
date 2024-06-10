<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Tests\Integration\Database\EloquentHasOneOfManyTest\State;

class OrderController extends Controller
{
    public function addOrder(Request $request,$id)
    {
//        dd($id);
        $service = Service::query()->findOrFail($id);
        $order = new Order();
        $order->customer_id = 1;
        $order->service_id = $service->id;
        $order->price = $service->price;
        $order->payment_type = PaymentType::tryFrom($request->input('payment_type'));
        $order->status = OrderStatus::tryFrom('active');
        $order->save();
//        dd($order);
    }
}







