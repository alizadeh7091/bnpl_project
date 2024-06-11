<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment($loan_id, $customer_id)
    {
        $loan = Loan::query()->findOrFail($loan_id);
//        dd($loan);
        $transaction = Transaction::where('customer_id', $customer_id)->get();

        Payment::query()->create(
            [
                'loan_id' => $loan_id,
                'transaction_id' => $transaction->id,
                'installment_number' => 1,
                'installment_amount' => 1000,
                'due_date' => date(2025 / 01 / 01),
                'pay_date' => $transaction->created_at,
            ]
        );
    }
}

