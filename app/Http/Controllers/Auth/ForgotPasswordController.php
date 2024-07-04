<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Custom function to send the reset email
protected function sendResetEmail($user, $token)
{
    $url = url('reset-password/'.$token.'?email='.urlencode($user->email));
    $data = [
        'user' => $user,
        'url' => $url,
    ];

    Mail::send('emails.password-reset', $data, function($message) use ($user) {
        $message->to($user->email);
        $message->subject('Reset Password Notification');
    });
}
}
