<?php


namespace App\Http\Services;



use App\AppUser;
use App\InvitedCode;
use App\Mail\AppInvitedCode;
use App\Mail\SendInvitedCode;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class InvitedCodeService
{

    public function generateInvitedCode($customId) {
        $existedInvitedCode = InvitedCode::where('customer_id', $customId)->where('status',InvitedCode::STATUS_CREATE)->first();
        if($existedInvitedCode) return $existedInvitedCode;

        $randStr = $this->generateRandom12NumberAndLetter();
        return InvitedCode::create([
            'code' => $randStr,
            'customer_id' => $customId,
            'status' => InvitedCode::STATUS_CREATE
        ]);
    }

    public function sendInvitedCode($customId) {
        $existedInvitedCode = InvitedCode::where('customer_id', $customId)->where('status',InvitedCode::STATUS_CREATE)->with('customer')->first();
        if(!$existedInvitedCode) return ['status' => 0, 'msg' => 'invited code not generated yet.'];
        try {
            Mail::to($existedInvitedCode->customer->email)->send(new SendInvitedCode($existedInvitedCode));
        } catch (\Exception $e) {
            return ['status' => 0, 'msg' => 'fail to send mail '];
        }
        $existedInvitedCode->status = InvitedCode::STATUS_SENT;
        $existedInvitedCode->sent_at = now();
        $existedInvitedCode->expired_by = Carbon::now()->addDays(config('app.request_access_invited_code_expired_dates'));
        $existedInvitedCode->save();
        return ['status' => 1, 'msg' => 'send email successfully '];
    }

    private function generateRandom12NumberAndLetter() {
        $seeds = ['0','1','2','3','4','5','6','7','8','9',
            'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
            'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $randomStr = implode('',Arr::random(Arr::shuffle($seeds),12));

        //check invited existed
        /*while($existedCode = InvitedCode::where('code', $randomStr)->first()) {
            $randomStr = $this->generateRandom12NumberAndLetter();
        }*/
        return $randomStr;
    }


    public function checkAndSetIfCodeExpired($code) {
        $invitedCode = InvitedCode::where('code', $code)->first();
        if($invitedCode && $invitedCode->expired_by < now()) {
            $invitedCode->status = InvitedCode::STATUS_EXPIRED;
            $invitedCode->save();
            return false;
        }
        return true;
    }

    public function setCodeUsed($code) {
        $invitedCode = InvitedCode::where('code', $code)->first();
        if($invitedCode) {
            $invitedCode->status = InvitedCode::STATUS_VERIFIED;
            $invitedCode->save();
            return true;
        }
        return false;
    }

    public function apiGenerateInvitedCodeAndSendEmail($request) {
        $appUser = AppUser::firstOrNew(['email' => $request->email]);
        $appUser->nick_name = $request->fullname;
        $appUser->app_user_id = $request->name;
        $appUser->save();

        $randStr = $this->generateRandom12NumberAndLetter();
        $invitedCode = InvitedCode::firstOrNew([ 'code' => $randStr]);
        $invitedCode->customer_id = 0;
        $invitedCode->app_user_id = $request->name;
        $invitedCode->status = InvitedCode::STATUS_CREATE;
        $invitedCode->save();

        try {
            Mail::to($appUser->email)->send(new AppInvitedCode(['code' => $randStr,'name'=>$appUser->nick_name]));
        } catch (\Exception $e) {
            throw $e;
        }
        $invitedCode->status = InvitedCode::STATUS_SENT;
        $invitedCode->sent_at = now();
        $invitedCode->expired_by = Carbon::now()->addDays(config('app.request_access_invited_code_expired_dates'));
        $invitedCode->save();

        $appUser->invited_num = $appUser->invited_num + 1;
        if($appUser->invited_times <= 5) $appUser->invited_times = $appUser->invited_times + 1;
        else {
            $appUser->invited_times = 1;
        }
        $appUser->save();

        return ['code' => $randStr, 'invited_times' => $appUser->invited_times];
    }

    public function getInvitedCodeStatusByUser($request) {

    }
}
