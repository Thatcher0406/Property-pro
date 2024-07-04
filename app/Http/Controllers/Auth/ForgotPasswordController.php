<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Override the sendResetLinkEmail method to customize the email sending process
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check the status and handle accordingly
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    // Custom function to send the reset email with the generated URL
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
