<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class TestEmailController extends Controller
{
    public function sendTestEmail()
    {
        $details = [
            'title' => 'Test Email from Laravel',
            'body' => 'This is a test email sent from a Laravel application using Gmail SMTP.'
        ];

        Mail::to('recipient@example.com')->send(new TestEmail($details));

        return 'Email has been sent';
    }
}
