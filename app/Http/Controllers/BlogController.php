<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogType;
use App\Http\Requests\CreateBlog;
use App\Http\Services\BlogService;
use App\Topic;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index() {
        $blogs = $this->blogService->getDefaultBlogsList();
        return view('admin.blogs.index',compact('blogs'));
    }

    public function create() {
        $types = BlogType::orderBy('name')->get();
        $topics = Topic::orderBy('name')->get();
        return view('admin.blogs.create',compact('types','topics'));
    }

    public function store(CreateBlog $request) {
        try {
            $this->blogService->createBlog($request);
            return response()->redirectTo('admin/blogs')->with('success','new blog successfully');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
