<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->roles()->attach(Role::where('name', 'user')->first());

        //send activation email
        //$user->sendEmailVerificationNotification();

        return redirect()->route('login')->with('success', 'Your account has been created. Please check your email for activation link.');
    }
 }
