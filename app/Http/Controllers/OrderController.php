<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use App\Models\Loan;
use App\Models\Order;
use App\Models\Order_activity;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Tests\Integration\Database\EloquentHasOneOfManyTest\State;

class OrderController extends Controller
{
    private function addActivicty($order_id, $customer_id, $status)
    {
        Order_activity::query()->create(
            [
                'order_id' => $order_id,
                'customer_id' => $customer_id,
                'status' => $status,
            ]
        );
    }

    private function addToLoan($order_id, $amount)
    {
        Loan::query()->create(
            [
                'order_id' => $order_id,
                'amount' => $amount,
                'description' => 'lorem'
            ]
        );
    }

    public function addOrder(Request $request, $id)
    {
        $service = Service::query()->findOrFail($id);
        $order = Order::query()->create(
            [
                'customer_id' => 1,
                'service_id' => $service->id,
                'price' =>  $service->price,
                'payment_type' => PaymentType::tryFrom($request->input('payment_type')),
                'status' => OrderStatus::tryFrom('active'),
            ]
        );

        $this->addActivicty($order->id, $order->customer_id, $order->status);
        $this->addToLoan($order->id, 1000000);
    }
}







