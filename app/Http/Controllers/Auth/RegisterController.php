<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Landlord;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Mail\AccountActivationMail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/activation-pending';

    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:tenant,landlord,admin'],
            'phone' => ['nullable', 'string', 'max:20'],
            'dob' => ['nullable', 'date'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make(Str::random(16)), // Set a temporary password
            'activation_token' => Str::random(60),
            'role' => $data['role'],
            'phone' => $data['phone'] ?? null,
            'dob' => $data['dob'] ?? null,
            'is_active' => false, 
            'needs_password_reset' => true,
        ]);

        // Handle specific role creation
        switch ($data['role']) {
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

        $this->sendPasswordResetNotification($user);

        // Uncomment to send activation email
         //Mail::to($user->email)->send(new AccountActivationMail($user));

        return $user;
    }

    /**
     * Handle registration form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        return $this->registered($request, $user);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();

        //send passswor dreset email
        $token = app('auth.password.broker')->createToken($user);
    $user->sendPasswordResetNotification($token);

    return redirect('/activation-pending')->with('status', 'Registration successful. Please check your email to reset your password.');
    }

    protected function sendPasswordResetNotification($user)
{
    $token = Password::createToken($user);
    $user->sendPasswordResetNotification($token);
}

    
}
