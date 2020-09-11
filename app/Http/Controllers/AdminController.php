<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::lastLatestMonth()->countByDate()->get();
        $labels = $customers->map(function ($customer) {
            return date( 'm/d',strtotime($customer->date));
        })->toJson();

        $series = $customers->map(function ($customer) {
            return $customer->count;
        })->toJson();

        return view('admin.dashboard',compact('labels','series'));
    }


}
