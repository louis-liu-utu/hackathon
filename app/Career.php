<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use VanOns\Laraberg\Models\Gutenbergable;

class Career extends Model
{
    use Gutenbergable;

    protected $fillable = [
        'title',
        'location',
        'slug'
    ];
}
