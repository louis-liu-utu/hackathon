<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AppDownload extends Model
{
    protected $fillable = [
        'app_id',
        'ip',
    ];

    public function app() {
        return $this->belongsTo('App\App');
    }

    public function scopeLastYear($query) {
        $lastYearStartAt = Carbon::now()->subDays(365);
        return $query->where('created_at', '>' , $lastYearStartAt);
    }

    public function scopeCountByDate($query) {
        return $query->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->orderBy('date','asc');
    }
}
