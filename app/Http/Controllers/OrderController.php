<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\Order;
use App\Models\Order_activity;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private function addInstallments($installment_count, $start_date,$loan)
    {
        for ($i = 0; $i < $installment_count; $i++) {
            Installment::query()->create(
                [
                    'loan_id' => $loan->id,
                    'installment_number'=> $i+1,
                    'installment_amount' => $loan->installment_amount,
                    'due_date' => date('y-m-d',strtotime("+1 month", strtotime($start_date))),
                ]
            );
        }
    }

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

    private function addToLoan($order_id, $amount, $installment_count, $installment_amount, $start_date)
    {
        $loan = Loan::query()->create(
            [
                'order_id' => $order_id,
                'amount' => $amount,
                'installment_count' => $installment_count,
                'installment_amount' => $installment_amount,
                'start_date' => $start_date
            ]
        );
//        dd(gettype($loan->id));
        $this->addInstallments($loan->installment_count,$loan->start_date,$loan);
    }

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

        $this->addActivicty($order->id, $order->customer_id, $order->status);
        $this->addToLoan($order->id, 1200000, 12, 200, '2025-01-01');
        return redirect()->route('all.services');
    }
}







