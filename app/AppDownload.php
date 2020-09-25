<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppDownload extends Model
{
    protected $fillable = [
        'app_id',
        'ip',
    ];

    public function app() {
        return $this->belongsTo('App\App');
    }
}
