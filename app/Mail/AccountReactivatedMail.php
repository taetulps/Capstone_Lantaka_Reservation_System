<?php

namespace App\Mail;

<<<<<<< HEAD
use App\Models\User;
=======
use App\Models\Account;
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountReactivatedMail extends Mailable
{
    use Queueable, SerializesModels;

<<<<<<< HEAD
    public User $user;
    public string $plainPassword;

    public function __construct(User $user, string $plainPassword)
=======
    public Account $user;
    public string $plainPassword;

    public function __construct(Account $user, string $plainPassword)
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
    {
        $this->user          = $user;
        $this->plainPassword = $plainPassword;
    }

    public function build(): self
    {
        return $this->subject('Account Reactivated — Lantaka Reservation System')
                    ->view('emails.account_reactivated');
    }
}
