<?php

namespace App\Rules;

use App\InvitedCode;
use Illuminate\Contracts\Validation\Rule;

class ValidateInvitedCodeVerified implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $invitedCode;

    public function __construct($invitedCode)
    {
        $this->invitedCode = InvitedCode::where('code', $invitedCode)->first();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->invitedCode ? $this->invitedCode->status === InvitedCode::STATUS_SENT : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $errorMsg = 'the invited code is invalid';
        if(!$this->invitedCode) $errorMsg = 'the invited code is not existed';
        else if($this->invitedCode->status === InvitedCode::STATUS_CREATE) $errorMsg = 'the invited code has not been sent';
        else if($this->invitedCode->status === InvitedCode::STATUS_EXPIRED) $errorMsg = 'the invited code has been expired';
        else if($this->invitedCode->status === InvitedCode::STATUS_VERIFIED) $errorMsg = 'the invited code has been used';
        return $errorMsg;
    }
}
