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
//        dd($request);
        $customer = new Customer();
        $customer->name = $request->input('name');
//        dd($customer->name);
        $customer->family = $request->input('family');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->save();
        return redirect()->route('all.services');
    }

    public function loginCustomer()
    {
        return view('customer.login');
    }
}
