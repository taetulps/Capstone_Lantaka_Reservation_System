<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $status;
    public $campusName;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $status)
    {
        $this->user = $user;
        $this->status = $status;
        // This pulls the name directly from your .env file
        $this->campusName = env('CAMPUS_NAME', 'Adzu Lantaka Campus Administrative Office');
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = ($this->status === 'approved') 
            ? 'Account Registration Approved' 
            : 'Account Registration Declined';

        return $this->subject($subject)
                    ->view('emails.account_status'); // This points to your Blade file
    }
}