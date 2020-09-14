<?php

namespace App\Http\Controllers;

use App\Http\Services\InvitedCodeService;
use App\InvitedCode;
use App\Rules\ValidateInvitedCodeVerified;
use App\Rules\ValidatePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    const STATUS_OK = 200;
    const STATUS_ERR = 0;
    protected $invitedCodeService;


    public function __construct(InvitedCodeService $invitedCodeService)
    {
        $this->invitedCodeService = $invitedCodeService;
    }

    public function checkInvitedCode(Request $request) {
       $validator = $this->validateInvitedCode($request);

        if($validator->fails()) {
            return response()->json([
                'code' => self::STATUS_ERR,
                'message' => $validator->errors()->first(),
                'data' => $request->invitedCode
            ]);
        }

       if(!$this->invitedCodeService->checkAndSetIfCodeExpired($request->invitedCode)) {
           return response()->json([
               'code' => self::STATUS_ERR,
               'message' => 'the invited code has been expired',
               'data' => $request->invitedCode
           ]);
       }

        return response()->json([
            'code' => self::STATUS_OK,
            'message' => 'the invited code is valid',
            'data' => $request->invitedCode
        ]);
    }

    public function setInvitedCodeUsed(Request $request) {
        $validator = $this->validateInvitedCode($request);

        if($validator->fails()) {
            return response()->json([
                'code' => self::STATUS_ERR,
                'message' => $validator->errors()->first(),
                'data' => $request->invitedCode
            ]);
        }

        if(!$this->invitedCodeService->setCodeUsed($request->invitedCode)) {
            return response()->json([
                'code' => self::STATUS_ERR,
                'message' => 'fail to set invited code used',
                'data' => $request->invitedCode
            ]);
        }

        return response()->json([
            'code' => self::STATUS_OK,
            'message' => 'set invited code used successfully',
            'data' => $request->invitedCode
        ]);
    }

    public function generateInvitedCode(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'username' => 'required|exists:users,email',
                'password' => ['required', new ValidatePassword($request->username)],
                'email' => 'required|email',
                'first_name' => 'required',
                'last_name' => 'required'
            ],
            [
                'username.required' => 'username is required',
                'password.required' => 'password is required',
                'username.exists' => 'username is not existed',
                'first_name.required' => 'first name is required',
                'last_name.required' => 'last name is required',
                'email.required' => 'email is required',
                'email.email' => 'email format is invalid'
            ]);

        if($validator->fails()) {
            return response()->json([
                'code' => self::STATUS_ERR,
                'message' => $validator->errors()->first(),
                'data' => ''
            ]);
        }

        try {
            $invitedCode = $this->invitedCodeService->apiGenerateInvitedCodeAndSendEmail($request);
            return response()->json([
                'code' => self::STATUS_OK,
                'message' => 'generate code and send email successfully',
                'data' => $invitedCode->code
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => self::STATUS_ERR,
                'message' => 'fail to send email',
                'data' => ''
            ]);
        }
    }

    private function validateInvitedCode($request) {
        $validator = Validator::make($request->all(),
            [
                'username' => 'required|exists:users,email',
                'password' => ['required', new ValidatePassword($request->username)],
                'invitedCode' => ['required', new ValidateInvitedCodeVerified($request->invitedCode)]
            ],
            [
                'username.required' => 'username is required',
                'password.required' => 'password is required',
                'invitedCode.required' => 'invited code is required',
                'username.exists' => 'username is not existed',
            ]);

       return $validator;
    }
}
