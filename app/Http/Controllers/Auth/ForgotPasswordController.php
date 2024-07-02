<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    // Show the form to request a password reset link.
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Send a reset link to the given user.
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == \Illuminate\Support\Facades\Password::RESET_LINK_SENT
                    ? back()->with('status', trans($response))
                    : back()->withErrors(['email' => trans($response)]);
    }

    // Show the reset password form.
    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => request('email')]
        );
    }

    // Reset the given user's password.
    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = $this->broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == \Illuminate\Support\Facades\Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', trans($response))
                    : back()->withErrors(['email' => [trans($response)]]);
    }
}
