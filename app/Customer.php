<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

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
        return $query->where('created_at', '>' , $lastMonthStartAt);
    }

    public function scopeLastYear($query) {
        $lastYearStartAt = Carbon::now()->subDays(365);
        return $query->where('created_at', '>' , $lastYearStartAt);
    }

    public function scopeCountByDate($query) {
        return $query->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->orderBy('date','asc');
    }

    public function invitedCodes() {
        return $this->hasMany('App\InvitedCode');
    }


    public function getInvitedStatus() {
        $invitedCodes = $this->hasMany('App\InvitedCode')->orderBy('created_at','desc')->first();
        $status = "";
        if($invitedCodes) {
            if($invitedCodes->status === InvitedCode::STATUS_CREATE ) $status = 'created';
            if($invitedCodes->status === InvitedCode::STATUS_SENT) $status = 'sent';
            if($invitedCodes->status === InvitedCode::STATUS_VERIFIED) $status = 'used';
            if($invitedCodes->status === InvitedCode::STATUS_EXPIRED) $status = 'expired';
        }


        return $status;
    }
}
