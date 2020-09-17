<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use VanOns\Laraberg\Models\Gutenbergable;

class Blog extends Model
{
    use Gutenbergable;

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

    public function topicNames() {
        $topics = $this->topics()->get('name');
        return $topics->implode('name',',');
    }

    public function type() {
        return $this->belongsTo('App\Topic','id','type_id');
    }

    public function scopePriority($query) {
        return $query->orderBy('is_top','desc')->orderBy('sort','desc');
    }

    public function getStatus() {
        return $this->is_top ? 'top' : $this->is_active ? 'active' : 'inactive';
    }
}
