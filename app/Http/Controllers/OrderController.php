<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\Order;
use App\Models\Order_activity;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function addOrder(Request $request, $id)
    {
        $service = Service::query()->findOrFail($id);
        $order = Order::query()->create(
            [
                'customer_id' => 1,
                'service_id' => $service->id,
                'price' => $service->price,
                'payment_type' => PaymentType::tryFrom($request->input('payment_type')),
                'status' => OrderStatus::ACTIVE->value,
            ]
        );
        $add_activity = new OrderActivityController();
        $add_activity->addActivicty($order->id, $order->customer_id, $order->status);
        $add_loan = new LoanController();
        $add_loan-> addToLoan($order->id, 1200000, 12, 100, '2024-06-01');
        return redirect()->route('all.services');
    }
}







