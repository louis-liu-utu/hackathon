<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogType;
use App\Http\Requests\BlogRequest;
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
        $types = BlogType::withCount('blogs')->orderBy('id')->get();
        return view('admin.blogs.index',compact('blogs','types'));
    }

    public function create() {
        $types = BlogType::orderBy('name')->get();
        $topics = Topic::orderBy('name')->get();
        return view('admin.blogs.create',compact('types','topics'));
    }

    public function store(BlogRequest $request) {
        try {
            $this->blogService->createBlog($request);
            return response()->redirectTo('admin/blogs')->with('success','create blog successfully');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function edit(Blog $blog) {
        $types = BlogType::orderBy('name')->get();
        $topics = Topic::orderBy('name')->get();
       return view('admin.blogs.edit',compact('blog','topics','types'));
    }

    public function update(BlogRequest $request, Blog $blog) {
        try {
            $this->blogService->updateBlog($request,$blog);
            return response()->redirectTo('admin/blogs')->with('success','update blog successfully');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Blog $blog) {
        try {
            $this->blogService->deleteBlog($blog);
            return back()->with('success','delete successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function ajaxSort(Request $request) {
        $this->blogService->exchange($request);
    }

    public function updateType(BlogType $blogType, Request $request) {
        $blogType->name = $request->name;
        $blogType->save();
    }

    public function deleteType(BlogType $blogType) {
        $blogType->delete();
    }
    public function addType(Request $request) {
        $blog = BlogType::create([
            'name' => trim($request->name)
        ]);
        return response()->json($blog);
    }
}
