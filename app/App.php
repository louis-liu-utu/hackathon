<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{

    protected $fillable = [
        'name',
        'url',
        'file_name'
    ];

    public function downloads() {
        return $this->hasMany('App\AppDownload', 'app_id');
    }
}
