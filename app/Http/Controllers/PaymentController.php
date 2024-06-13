<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Installment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private function addPenalty($id, $delay_charge)
    {
        $id = $id + 1;
        $installment = Installment::query()->findOrFail($id);
        Installment::query()->where('id', $id)
            ->update(
                [
                    'installment_amount' => $installment->installment_amount + $delay_charge,
                ]
            );
    }

    private function delayPenalty($due_date, $pay_date)
    {
        $due = date_create($due_date);
        $pay = date_create($pay_date);
        $interval = date_diff($due, $pay);
        return (int)($interval->format('%d'));
    }

    public function storePayment($id)
    {
        $installment = Installment::query()->findOrFail($id);
        $delay_charge = $this->delayPenalty($installment->due_date, $installment->pay_date);
        Installment::query()->where('id', $id)
            ->update(
                [
                    'delay_penalty' => $delay_charge,
                    'pay_date' => now(),
                ]
            );
        $this->addPenalty($id, $delay_charge);
        return redirect()->route('all.services');
    }
}
