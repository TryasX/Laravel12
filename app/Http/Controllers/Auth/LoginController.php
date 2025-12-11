<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    public function username()
    {
        return 'FingerPrintID';
    }

        protected function sendFailedLoginResponse(\Illuminate\Http\Request $request)
    {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'password' => ['Password atau Fingerprint ID salah.'],
        ]);
    }

    protected function validateLogin($request)
    {
        $request->validate([
            'FingerPrintID' => 'required|numeric',
            'password' => 'required',
        ]);
    }


    protected function credentials(\Illuminate\Http\Request $request)
    {
        return [
            'FingerPrintID' => $request->get('FingerPrintID'),
            'password' => $request->get('password'),
        ];
    }

    public function logout(\Illuminate\Http\Request $request)
{
    // Hapus session auth
    $this->guard()->logout();

    // Invalidate session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Arahkan ke login
    return redirect('/');
}


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
