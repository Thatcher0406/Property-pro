<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate($token)
 {
    $user = User::where('activation_token', $token)->first();

    if ($user) {
        $user->is_active = 1;
        $user->email_verified_at = now();
        $user->activation_token = null;
        $user->save();

        event(new Verified($user));

        return redirect('/login')->with('status', 'Your account has been activated and email verified.');
    }

    return redirect('/login')->with('error', 'Activation token is invalid.');
 }
}
