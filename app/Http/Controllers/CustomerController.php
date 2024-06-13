<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function registerCustomer()
    {
//        dd('hi');
        return view('customer.register');
    }

    public function storeCustomer(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required','max:32'],
                'family' => ['required','max:32'],
                'email' =>  ['required','max:32'],
                'password' => ['required','max:16','min:8'],
                'phone' => ['min:11','max:16'],
                'address' => ['max:255']
            ]
        );
        Customer::query()->create(
            [
                'name' => $request->input('name'),
                'family' => $request->input('family'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address')
            ]
        );
        return redirect()->route('all.services');
    }

    public function loginCustomer()
    {
        return view('customer.login');
    }
}
