<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class ActivateAccount extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', Carbon::now()->addMinutes(60), ['id' => $this->user->id, 'hash' => sha1($this->user->email)]
        );

        return (new MailMessage)
            ->subject('Activate Your Account')
            ->line('Click the button below to activate and verify your account.')
            ->action('Activate Account', $verificationUrl)
            ->line('If you did not create an account, no further action is required.');
    }
}
