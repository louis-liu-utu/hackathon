<?php


namespace App\Http\Services;

use App\Blog;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Image;

class BlogService
{

    public function uploadThumbnail($request) {
        if($request->hasFile('thumbnail')) {
            $fileName = time().'.'.$request->thumbnail->extension();
            $path = public_path('/storage/blogs');
            File::isDirectory($path) or File::makeDirectory($path, 0777,true, true);

            $thumbnailFileName = 't_'.$fileName;
            $image = Image::make($request->thumbnail->path());
            $image->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.'/'.$thumbnailFileName);
            $request->thumbnail->move($path, $fileName);
            return $thumbnailFileName;
        }
        return "";
    }

    public function createBlog($request) {
        try {
            $blog = Blog::create($request->except('thumbnail'));
            $blog->thumbnail = $this->uploadThumbnail($request);
            $blog->lb_content = $request->lb_content;
            $blog->save();

            $blog->topics()->sync($request->topics);
            return $blog;
        } catch (QueryException $e) {
            throw $e;
        }
    }
    public function getDefaultBlogsList() {
        return Blog::with('type')->with('topics')->priority()->get();
    }

}
