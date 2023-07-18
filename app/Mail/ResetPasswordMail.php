<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    private $body;
    private $action_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body, $action_link)
    {
        $this->body = $body;
        $this->action_link = $action_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.passwords.forgot-password')
            ->with([
                'body' => $this->body,
                'action_link' => $this->action_link
            ]);
    }
}
