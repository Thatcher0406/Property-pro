<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        $user = auth()->user();
        if ($user->role === 'admin') {
            return '/admin/dashboard';
        } elseif ($user->role === 'landlord') {
            return '/landlord/dashboard';
        } elseif ($user->role === 'tenant') {
            return '/tenant/dashboard';
        }
        return '/home';
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
            if ($user->role === $request->role) {
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
