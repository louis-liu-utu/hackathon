<?php

namespace App\Helpers;

use App\App;

class AppSoftware {
    public static function has($name) {
        $app = App::where('name', $name)->first();
        return $app && $app->getDownloadLink();
    }

    public static function increaseDownload($name) {
        $app = App::where('name', $name)->first();
        $app && $app->downloadIncrease();
    }

    public static function getLink($name) {
        $app = App::where('name', $name)->first();
        return $app->getDownloadLink() ?? "";
    }

    public static function getDownloadFile($name) {
        $app = App::where('name', $name)->first();

        if($name === 'android beta' && (!$app || $app && !$app->url && !$app->file_name))  return public_path('files/utu_v_0.1.apk');

        return $app->getFullFilePath() ?? "";
    }


}
