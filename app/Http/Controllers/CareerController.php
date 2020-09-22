<?php

namespace App\Http\Controllers;

use App\Career;
use App\Http\Requests\CareerRequest;
use App\Http\Services\CareerService;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    protected  $careerService;

    public function __construct(CareerService $careerService)
    {
        $this->careerService = $careerService;
    }

    public function index() {
        $careers = $this->careerService->getCareers();
        return view('admin.careers.index',compact('careers'));
    }

    public function create() {
        return view('admin.careers.create');
    }

    public function store(CareerRequest $request) {
        try {
            $this->careerService->createCareer($request);
            return response()->redirectTo('admin/careers')->with('success','create career successfully');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit( Career $career) {
       return view('admin.careers.edit',compact('career'));
    }


    public function update(CareerRequest $request, Career $career) {
        try {
            $this->careerService->updateCareer($career,$request);
            return response()->redirectTo('admin/careers')->with('success','update career successfully');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Career $career) {
        try {
            $this->careerService->deleteCareer($career);
            return back()->with('success','delete successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
