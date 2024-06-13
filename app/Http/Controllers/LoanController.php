<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function addToLoan($order_id, $amount, $installment_count, $installment_amount, $start_date)
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
        $add_installment = new InstallmentController();
        $add_installment->addInstallments($loan->installment_count,$loan->start_date,$loan);
    }
}
