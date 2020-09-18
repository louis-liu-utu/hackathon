<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CreateCustomer;
use App\Http\Services\InvitedCodeService;
use App\InvitedCode;
use App\Mail\AdminNotify;
use App\Mail\RequestAccessSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            try {
                Mail::to(config('app.admin_notified_mail'))->send(new AdminNotify($customer));
                Mail::to($customer->email)->send(new RequestAccessSuccess());
            } catch (\Exception $exception) {
                Log::channel('mail')->error($exception->getMessage());
            }
            return redirect()->to('get-started-message');
        } else {
            return redirect()->back();
        }
    }

    public function show($id, Request $request, InvitedCodeService $invitedCodeService) {
        $customer = Customer::findOrFail($id);
        $generatedInvitedCode = null;

        if($request->has('action')) {
            if($request->action === 'generate') {
                $generatedInvitedCode = $invitedCodeService->generateInvitedCode($id);
                return redirect()->back()->with(compact('generatedInvitedCode'));
            }
            if($request->action === 'send') {
                $result = $invitedCodeService->sendInvitedCode($id);
                return redirect()->back()->with(compact('result'));
            }
        }


        return view('admin.customers.edit', compact('customer','generatedInvitedCode'));
    }

}
