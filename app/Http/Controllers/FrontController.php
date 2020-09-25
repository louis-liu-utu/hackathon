<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Career;
use App\Helpers\AppSoftware;
use App\Http\Services\BlogService;
use App\Http\Services\CareerService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function newsList(BlogService $blogService) {
        $news = $blogService->getBlogsListForFront();
        return view('blog_list', compact('news'));
    }

    public function newsDetail($slug) {
        $news = Blog::where('slug',$slug)->with('type')->first();
        return view('blog_detail',compact('news'));
    }

    public function careers(CareerService $careerService) {
        $careers = $careerService->getCareers();
        return view('careers',compact('careers'));
    }

    public function careerDetail($slug) {
        $career = Career::where('slug', $slug)->first();
        return view('career-detail',compact('career'));
    }

    public function downloadAppAndStat($name) {
       AppSoftware::increaseDownload($name);
       $file = AppSoftware::getDownloadFile($name);
       if($file) return response()->download($file);
       return response()->redirectTo(AppSoftware::getLink($name));
    }

}
