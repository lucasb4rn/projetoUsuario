<?php

namespace projetoUsuario\Http\Controllers\Auth;

use projetoUsuario\Http\Controllers\Controller;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profileUsuario';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function showLoginForm()
    {
        return view('usuario.loginUsuario');
    }

    protected function loggedOut(Request $request) {
        return redirect('/login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');

        return array_add($credentials, 'situacao_id', '1');
    }



}
