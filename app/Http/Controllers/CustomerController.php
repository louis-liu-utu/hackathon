<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CreateCustomer;
use App\Mail\AdminNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::latest()->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function store(CreateCustomer $request) {
        $inputData = $request->only(['first_name','last_name','email','country','device']);
        $inputData['ip'] = $request->ip();

        if($customer = Customer::create($inputData)) {
            Mail::to(config('app.admin_notified_mail'))->send(new AdminNotify($customer));
            return redirect()->to('get-started-message');
        } else {
            return redirect()->back();
        }
    }

    public function show($id) {
        $customer = Customer::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }
}
