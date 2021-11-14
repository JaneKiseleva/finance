<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(User $user)
    {
        return $this->markdown('emails.welcome')->with([
            'user' => $this->user
        ]);
    }
}
