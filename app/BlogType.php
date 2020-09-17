<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogType extends Model
{
    protected $fillable = [
        'name',
        'sort'
    ];

    public function blogs() {
        return $this->hasMany('App\Blog','type_id');
    }

}
