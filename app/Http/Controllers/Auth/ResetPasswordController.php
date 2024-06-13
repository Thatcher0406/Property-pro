<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    protected function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    protected function validationErrorMessages()
    {
        return [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Passwords do not match',
            'password.min' => 'Password must be at least 8 characters',
        ];
    }
}
