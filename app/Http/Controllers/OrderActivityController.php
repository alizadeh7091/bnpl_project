<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order_activity;
use Illuminate\Http\Request;

class OrderActivityController extends Controller
{
    public function addActivicty($order_id, $customer_id, $status)
    {
        Order_activity::query()->create(
            [
                'order_id' => $order_id,
                'customer_id' => $customer_id,
                'status' => $status,
            ]
        );
    }
}
