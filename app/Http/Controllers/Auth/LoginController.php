<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'landlord') {
            return redirect()->route('landlord.dashboard');
        } elseif ($user->role == 'tenant') {
            return redirect()->route('tenant.dashboard');
        }

        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->needs_password_reset) {
                Auth::logout();
                return false;
            }
            if ($user->role === $request->role) {
                return true;
            }
            Auth::logout();
        }
        return false;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user && $user->needs_password_reset) {
            return redirect()->route('password.request')
                ->with('status', 'Please reset your password to activate your account.');
        }

        return redirect()->back()->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => [trans('auth.failed')],
                'role' => 'Incorrect role selected.',
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
