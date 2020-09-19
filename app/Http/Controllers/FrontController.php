<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Services\BlogService;
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
}
