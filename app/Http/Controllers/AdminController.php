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
       /* $customers = Customer::lastLatestMonth()->get();

        $labels = $customers->map(function ($customer) {
            return date( 'm/d',strtotime($customer->date));
        })->toJson();

        $series = $customers->map(function ($customer) {
            return $customer->count;
        })->toJson();
        $labels = [];
        $index = 0;
        foreach ($customers as $customer) {
            $date = date('m/d',strtotime($customer->created_at));
            if(!in_array($date, $labels)) {
                $labels[$index] = $date;
                $series[$index] = 1;
            } else {
                $series[$index]++;

            }
        }*/

        return view('admin.dashboard');
    }


}
