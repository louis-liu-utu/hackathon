<?php

namespace App\Http\Controllers;

use App\App;
use App\Http\Requests\AppRequest;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {
        $apps = App::with('downloads')->withCount('downloads')->get();
        return view('admin.apps.index', compact('apps'));
    }

    public function store(AppRequest $request) {
        try {
            $app = App::create($request->validated());

            return back()->with('success','create successfully');
        } catch (\Exception $e) {
            return back()->withErrors('fail to create');
        }

    }

    public function update(AppRequest $request, App $app) {
        try {
            $app->update($request->validated());
            return back()->with('success','update successfully');
        } catch (\Exception $e) {
            return back()->withErrors('fail to update');
        }
    }

    public function destroy(App $app) {
        try {
            $app->delete();
            return back()->with('success','delete successfully');
        } catch (\Exception $e) {
            return back()->withErrors('fail to delete');
        }
    }
}
