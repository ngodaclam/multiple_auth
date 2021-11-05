<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmRegisterCtv extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user =$this->user;
        return $this->view('auth.emails.confirm-mail-ctv')
            ->subject('Jiian Thông Báo !')
            ->from(env('MAIL_USERNAME','chuongvv@beetsoft.com.vn'))
            ->with($user);
    }
}
