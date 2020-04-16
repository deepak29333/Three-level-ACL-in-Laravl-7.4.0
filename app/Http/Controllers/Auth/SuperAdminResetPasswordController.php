<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;
class SuperAdminResetPasswordController extends Controller
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
    protected $redirectTo = '/superadmin';
    public function __construct(){
        $this->middleware('guest:superadmin');
    }
    protected function guard(){
        return Auth::guard('superadmin');
    }
    public function broker(){
        return Password::broker('superadmins');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset-superadmin')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

}
