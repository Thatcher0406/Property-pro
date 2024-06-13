<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ActivationController extends Controller
{

    public function activate($id,$token)
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return redirect('/')->with('error', 'Invalid activation token.');
        }

        $user->is_active = true;
        $user->activation_token = null;
        $user->save();

        // Send password reset link
        //Password::broker()->sendResetLink(['email' => $user->email]);

        return redirect()->route('password.request')->with('status', 'Your account has been activated. Please reset your password.');
    }

    public function pending()
    {
        return view('auth.activation_pending');
    }

    
}

