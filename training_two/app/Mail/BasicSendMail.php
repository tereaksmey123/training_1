<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BasicSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     * 
     * Main ->
     * Partner ->
     * 
     * 
     * production 
     * history
     * 
     * zone
     * shape
     * 
     * 
     */
    public function build()
    {
        return $this
            ->with(['user' => $this->user])
            ->markdown('mails.basic_send_mail');
    }
}
