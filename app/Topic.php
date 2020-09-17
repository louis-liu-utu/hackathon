<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name',
        'sort'
    ];

    public function blogs() {
        return $this->belongsToMany('App\Blog','blogs_topics','topic_id','blog_id');
    }
}
