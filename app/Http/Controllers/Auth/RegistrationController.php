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
    // DISPLAY REGISTRATION FORM
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    //Handle registration form submission
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|in:tenant,landlord,admin',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role and create corresponding record in respective table
        switch ($request->role) {
            case 'tenant':
                Tenant::create(['user_id' => $user->id]);
                break;
            case 'landlord':
                Landlord::create(['user_id' => $user->id]);
                break;
            case 'admin':
                Admin::create(['user_id' => $user->id]);
                break;
        }

    
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->roles()->attach(Role::where('name', 'user')->first());

        //send activation email
        //$user->sendEmailVerificationNotification();

        return redirect()->route('login')->with('success', 'Your account has been created. Please check your email for activation link.');
    }
 }
