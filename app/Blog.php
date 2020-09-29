<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use VanOns\Laraberg\Models\Gutenbergable;

class Blog extends Model
{
    use Gutenbergable;

    public $timestamps = true;
    const Default_Thumbnail = "images/blog-default.jpg";

    protected $fillable = [
        'title',
        'slug',
        'type_id',
        'content',
        'thumbnail',
        'published_at',
        'is_active',
        'sort',
        'is_top'
    ];

    public function topics() {
        return $this->belongsToMany('App\Topic','blogs_topics','blog_id','topic_id');
    }

    public function type() {
        return $this->belongsTo('App\BlogType','type_id');
    }

    public function scopePriority($query) {
        //return $query->orderBy('is_top','desc')->orderBy('sort','desc');
        return $query->orderBy('sort','desc');
    }
    public function scopeActive($query) {
        return $query->where('is_active',1);
    }

    public function getStatus() {
        return $this->is_top ? 'top' : $this->is_active ? 'active' : 'inactive';
    }

    public function getThumbnailUrl() {
        if($this->thumbnail && file_exists(public_path('/storage/blogs/'.$this->thumbnail))) {
            return url('/storage/blogs/'.$this->thumbnail.'?'.$this->updated_at);
        }
        return url(self::Default_Thumbnail);
    }

    public function getOriginalImagelUrl() {
        if($this->thumbnail && file_exists(public_path('/storage/blogs/'.ltrim($this->thumbnail,'t_')))) {
            return url('/storage/blogs/'.ltrim($this->thumbnail,'t_').'?'.$this->updated_at);
        }
        return url(self::Default_Thumbnail);
    }
    public function getPublishDate() {
        return date('d M Y', strtotime($this->published_at));
    }
}
