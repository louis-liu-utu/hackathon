<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotify extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        //
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Request Access Application: '.$this->customer->id ?? '')
            ->view('mails.admin_notify')
            ->with($this->customer->toArray());
    }
}
