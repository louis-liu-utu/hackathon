<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppInvitedCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $invitedCode;
    public function __construct($invitedCode)
    {
        $this->invitedCode = $invitedCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to UTU - invited code')
            ->view('mails.app_invited_code')
            ->with('invitedCode',$this->invitedCode);
    }
}
