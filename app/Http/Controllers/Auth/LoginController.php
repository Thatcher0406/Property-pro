<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            return '/admin/dashboard';
        } elseif ($user->hasRole('landlord')) {
            return '/landlord/dashboard';
        } elseif ($user->hasRole('tenant')) {
            return '/tenant/dashboard';
        }
        return '/home';
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        //$this->middleware('auth')->only('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->roles()->where('name', $request->role)->exists()) {
                return true;
            }
            Auth::logout();
        }
        return false;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => [trans('auth.failed')],
                'role' => 'Incorrect role selected.',
            ]);
    }

    // Define custom middleware for specific controller actions
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/login');
    }
}

