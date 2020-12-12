<?php

namespace App\Http\Controllers;

use App\AppDownload;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Analytics;
use Illuminate\Routing\Controller;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
     const INDEX_SLOT = 5;

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

    }


}
