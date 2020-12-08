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
    const STATUS_ERR = 400;
    const STATUS_AUTH_ERR = 401;
    protected $invitedCodeService;


    public function __construct(InvitedCodeService $invitedCodeService)
    {
        $this->invitedCodeService = $invitedCodeService;
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

    /**
     * api/set_invited_code_used
     * post
     * username=**,password=**,invitedCode=**
     */
    public function setInvitedCodeUsed(Request $request) {
        $result = $this->validateAuth($request);
        if($result['code'] !== self::STATUS_OK) {
            return response()->json($result);
        }

        $result = $this->validateInvitedCode($request);
        if($result['code'] !== self::STATUS_OK) {
            return response()->json($result);
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

    /**
     * api/generate_invited_code
     * post
     * username=**,password=**,email=**,fullname=**,name=**
     */
    public function generateInvitedCodeByUser(Request $request) {
        $result = $this->validateAuth($request);
        if($result['code'] !== self::STATUS_OK) {
            return response()->json($result);
        }
        $result = $this->validateCustomerInfo($request);
        if($result['code'] !== self::STATUS_OK) {
            return response()->json($result);
        }

        try {
            $invitedCode = $this->invitedCodeService->apiGenerateInvitedCodeAndSendEmail($request);
            return response()->json([
                'code' => self::STATUS_OK,
                'message' => 'generate code and send email successfully',
                'data' => $invitedCode
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => self::STATUS_ERR,
                'message' => $e->getMessage(),
                'data' => ''
            ]);
        }
    }

    public function getInvitedCodeStatusByUser(Request $request) {
        $result = $this->validateAuth($request);
        if($result['code'] !== self::STATUS_OK) {
            return response()->json($result);
        }

        $result = $this->validateUserInfo($request);
        if($result['code'] !== self::STATUS_OK) {
            return response()->json($result);
        }

        try {
            $invitedCode = $this->invitedCodeService->getInvitedCodeStatusByUser($request);
            return response()->json([
                'code' => self::STATUS_OK,
                'message' => '',
                'data' => $invitedCode
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => self::STATUS_ERR,
                'message' => $e->getMessage(),
                'data' => ''
            ]);
        }

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

    private function validateCustomerInfo($request) {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'fullname' => 'required',
                'name' => 'required'
            ],
            [
                'fullname.required' => 'first name is required',
                'email.required' => 'email is required',
                'email.email' => 'email format is invalid',
                'name.required' => 'user id/name is required',
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

    private function validateUserInfo($request) {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'user id/name is required',
            ]
        );

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
}
