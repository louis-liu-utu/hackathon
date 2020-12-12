<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;


class ApiController extends Controller
{
    const STATUS_OK = 200;
    const STATUS_ERR = 400;
    const STATUS_AUTH_ERR = 401;

    public function __construct()
    {

    }

    public function get_start(Request $request) {
        return response()->json([
            'code' => self::STATUS_OK,
            'message' => 'test',
            'data' => []
        ]);
    }

    /**
     * api/check_invited_code
     * post
     * username=**,password=**,invitedCode=**
     */
    public function checkInvitedCode(Request $request) {
        $result = $this->validateAuth($request);
        if($result['code'] !== self::STATUS_OK) {
            return response()->json($result);
        }

        $result = $this->validateInvitedCode($request);
        if($result['code'] !== self::STATUS_OK) {
            return response()->json($result);
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

    private function validateInvitedCode($request) {
        $validator = Validator::make($request->all(),
            [
                'invitedCode' => ['required', new ValidateInvitedCodeVerified($request->invitedCode)]
            ],
            [
                'invitedCode.required' => 'invited code is required',
            ]);

        if($validator->fails()) {
            return [
                'code' => self::STATUS_ERR,
                'message' => $validator->errors()->first(),
                'data' => ''
            ];
        }

        return [
            'code' => self::STATUS_OK,
            'message' => '',
            'data' => ''
        ];
    }

    private function validateAuth($request) {
        $validator = Validator::make($request->all(),
            [
                'username' => 'required|exists:users,email',
                'password' => ['required', new ValidatePassword($request->username)],
            ],
            [
                'username.required' => 'username is required',
                'password.required' => 'password is required',
                'username.exists' => 'username is not existed',
            ]);

        if($validator->fails()) {
            return [
                'code' => self::STATUS_AUTH_ERR,
                'message' => $validator->errors()->first(),
                'data' => ''
            ];
        }

        return [
            'code' => self::STATUS_OK,
            'message' => '',
            'data' => ''
        ];
    }
}
