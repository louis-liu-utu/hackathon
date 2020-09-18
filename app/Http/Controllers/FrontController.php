<?php

namespace App\Http\Controllers;

use App\Http\Services\BlogService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function newsList(BlogService $blogService) {
        $news = $blogService->getBlogsListForFront();
        return view('blog_list', compact('news'));
    }
}
