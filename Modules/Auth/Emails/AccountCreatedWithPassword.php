<?php

namespace Modules\Auth\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreatedWithPassword extends Mailable
{
    use Queueable, SerializesModels;
    private $props = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($props)
    {
        $this->props = $props;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config("mail.from.address"), config('mail.from.name'))
            ->view('auth::mail_account_created', [
                'password' => $this->props["password"],
                'email' => $this->props["email"]
            ]);
    }
}
