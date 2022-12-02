<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $activate;

    public function __construct($user, $activate)
    {
        $this->user = $user;
        $this->activate = $activate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.activate')->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject("VERIFY YOUR EMAIL | VICTORSPREDICT.COM");
    }
}
