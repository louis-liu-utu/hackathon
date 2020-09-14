<?php


namespace App\Http\Services;



use App\Customer;
use App\InvitedCode;
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
        //make sure new rand str not exited
        while($existedCode = InvitedCode::where('code', $randStr)->first()) {
           $randStr = $this->generateRandom12NumberAndLetter();
            $existedCode = InvitedCode::where('code', $randStr)->first();
        }
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
        return implode('',Arr::random(Arr::shuffle($seeds),12));
    }
}
