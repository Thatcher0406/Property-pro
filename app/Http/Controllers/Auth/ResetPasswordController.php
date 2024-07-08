<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/login';

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        Log::info('Password reset attempt for user: '.$request->email);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                    'needs_password_reset' => false,
                    //'email_verified_at' => date('Y-m-d H:i:s'),
                    'is_active' => true,
                ])->save();


                //DB::table('users')->update(['password' => Hash::make($password)])->where('email', $user->email);

                $user->setRememberToken(Str::random(60));

                Log::info('Password reset successful for user: '.$user->email);
            }
        );

        Log::info('Password reset status: '.$status);

        return $status == Password::PASSWORD_RESET
                    ? redirect($this->redirectPath())->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}

