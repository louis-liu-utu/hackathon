<?php


namespace App\Http\Services;

use App\Blog;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Image;

class BlogService
{

    const SORT_STEP = 10;

    public function createBlog($request) {
        try {
            $blog = Blog::create($request->except('thumbnail'));
            $blog->thumbnail = $this->uploadThumbnail($request);
            $blog->lb_content = $request->lb_content;
            $blog->sort = $this->getNewSortNumber();
            $blog->save();
            if($request->has('is_top')) $this->setOnlyBlogTop($blog);
            if($request->has('topics')) $blog->topics()->sync($request->topics);

            return $blog;
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function getDefaultBlogsList() {
        return Blog::with('type')->with('topics')->priority()->get();
    }

    public function getBlogsListForFront() {
        return Blog::with('type')->active()->priority()->get();
    }

    public function deleteBlog($blog) {
        try {
            $this->deleteClearImage($blog);
            $blog->delete();
        } catch (\Exception $e) {
            throw  $e;
        }
    }

    public function updateBlog($request,$blog) {
        try {
            $blog->update($request->except('thumbnail'));
            $thumbnail = $this->uploadThumbnail($request,$blog->thumbnail);
            if($thumbnail)  $blog->thumbnail = $thumbnail;
            $blog->lb_content = $request->lb_content;
            $blog->save();
            if($request->has('is_top')) $this->setOnlyBlogTop($blog);
            if($request->has('topics')) $blog->topics()->sync($request->topics);
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function exchange($request) {
        if($request->source || $request->dest) {
            $source = Blog::find($request->source);
            $dest = Blog::find($request->dest);
            $temp = $source->sort;
            $source->sort = $dest->sort;
            $dest->sort = $temp;
            $source->save();
            $dest->save();
        }
    }

    private function deleteClearImage($blog) {
        $thumbnail = public_path('/storage/blogs/'.$blog->thumbnail);
        $bigImage = public_path('/storage/blogs/'.ltrim($blog->thumbnail,'t_'));
        if(file_exists($thumbnail)) {
            unlink($thumbnail);
        }
        if(file_exists($bigImage)) {
            unlink($bigImage);
        }
    }

    private function uploadThumbnail($request,$fileName = null) {
        if($request->hasFile('thumbnail')) {
            if(!$fileName) $fileName = time().'.'.$request->thumbnail->extension();
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

    private function setOnlyBlogTop($blog) {
        Blog::where('id','!=',$blog->id)->update(['is_top' => 0]);
    }

    private function getNewSortNumber() {
        return Blog::max('sort') + self::SORT_STEP;
    }

}
