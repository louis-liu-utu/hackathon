<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    //
    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'country',
      'device',
      'ip'
    ];

    public function getFullName() {
        return $this->first_name. ' '. $this->last_name;
    }

    public function scopeLastLatestMonth($query) {
        $lastMonthStartAt = Carbon::now()->subDays(30);
        return $query->where('created_at', '>' , $lastMonthStartAt)->orderBy('created_at', 'desc');
    }

    public function scopeCountByDate($query) {
        return $query->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->orderBy('date');
    }
}
