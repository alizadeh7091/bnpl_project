<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    public function viewInstallments()
    {
        $installments = Installment::all();
        return view('installment')->with(
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
        Installment::query()->where('id',$id)
            ->update(['payment_amount'=>$request->input('amount')]);
        return redirect()->route('all.services');
    }
}

