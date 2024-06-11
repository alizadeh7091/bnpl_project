<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function viewPayment()
    {
        $installments = Payment::all();
        return view('payment')->with(
            [
                'installments' => $installments,

            ]
        );
    }

    public function storePayment(Request $request,$id)
    {
        $validated = $request->validate(
            [
                'amount' => ['required', 'max:32'],
            ]
        );
        $installment = Payment::query()->findOrFail($id);
        $amount = $request->input('amount');
        $attr = ['installment'=>$amount];
        $installment->update($attr);
        return redirect()->route('all.services');
    }
}

