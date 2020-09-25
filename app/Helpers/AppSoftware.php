<?php

namespace App\Helpers;

use App\App;

class AppSoftware {
    public static function has($name) {
        $app = App::where('name', $name)->first();
        return $app && $app->getDownloadLink() ? true : false;
    }

    public static function increaseDownload($name) {
        $app = App::where('name', $name)->first();
        $app->downloadIncrease();
    }

    public static function getLink($name) {
        $app = App::where('name', $name)->first();
        return $app && $app->getDownloadLink();
    }

    public static function getDownloadFile($name) {
        $app = App::where('name', $name)->first();
        return $app && $app->getFullFilePath();
    }


}
