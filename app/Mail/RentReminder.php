<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RentReminder extends Mailable
{
use Queueable, SerializesModels;

public $application;

public function __construct(Application $application)
{
    $this->application = $application;
}

public function build()
{
    return $this->markdown('emails.rent-reminder')
                ->subject('Reminder: Rent Payment Due');
}

}
