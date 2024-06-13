<?php

namespace App\Http\Controllers;

use App\Models\Installment;

class InstallmentController extends Controller
{
    public function addInstallments($installment_count, $start_date, $loan)
    {
        for ($i = 0; $i < $installment_count; $i++) {
            Installment::query()->create(
                [
                    'loan_id' => $loan->id,
                    'installment_number' => $i + 1,
                    'installment_amount' => $loan->installment_amount,
                    'due_date' => $start_date,
                ]
            );
            $start_date = date('y-m-d', strtotime("+1 month", strtotime($start_date)));
        }
    }

    public function viewInstallments()
    {
        $installments = Installment::query()->where('pay_date', null)->get();
        return view('installment')->with(
            [
                'installments' => $installments,
            ]
        );
    }

}

