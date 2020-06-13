<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {

        return [
            'email' => $request->email,
            'password' => $request->password,
            'status' => true,
        ];
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     $user->generateTwoFactorCode();
    //     $user->notify(new TwoFactorCode());
    // }
}
