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

    public function getDownloadLink() {
        if($this->file_name && file_exists(public_path('storage/app_downloads/'.$this->file_name))) {
            return url('storage/app_downloads/'.$this->file_name);
        }
        if($this->url) return $this->url;

        return "";
    }

    public function downloadIncrease() {
        $data['app_id'] = $this->id;
        $data['ip'] = request()->ip();
        AppDownload::create($data);
    }

    public function getFullFilePath() {
        $fullFilePath = public_path('storage/app_downloads/'.$this->file_name);
        if($this->file_name && file_exists($fullFilePath)) return $fullFilePath;
        return "";
    }
}
