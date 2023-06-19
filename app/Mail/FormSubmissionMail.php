<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $email
     * @param string $message
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emailsend.mailsend')
                    ->subject('Laravel HTML Testing Mail');
    }
}
