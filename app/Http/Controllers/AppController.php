<?php

namespace App\Http\Controllers;

use App\App;
use App\Http\Requests\AppRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AppController extends Controller
{
    public function index() {
        $apps = App::with('downloads')->withCount('downloads')->get();
        return view('admin.apps.index', compact('apps'));
    }

    public function store(AppRequest $request) {
        try {
            $app = App::create($request->except(['file_name','_token']));
            $app->file_name = $this->uploadFile($request);
            $app->save();
            return back()->with('success','create successfully');
        } catch (\Exception $e) {
            return back()->withErrors('fail to create');
        }

    }

    public function update(AppRequest $request, App $app) {
        try {
            $app->update($request->except(['file_name','_token']));
            $app->file_name = $this->uploadFile($request);
            $app->save();
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

    private function uploadFile($request,$fileName = null) {
        if($request->hasFile('file_name')) {
            if(!$fileName) $fileName = time().'_'.$request->file_name->getClientOriginalName();
            $path = public_path('files');
            $request->file_name->move($path, $fileName);
            return $fileName;
        }
        return "";
    }
}
