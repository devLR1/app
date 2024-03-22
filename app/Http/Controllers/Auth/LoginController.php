<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

//    public function login(Request $request)
//    {
//        $credentials = $request->only('username', 'password');
//
//        if (Auth::attempt($credentials)) {
//            // Autentikacija uspjela, korisnik je uspješno prijavljen
//            $user = Auth::user();
////            $token = Auth::user()->tok('MyAppToken')->accessToken;
//            return response()->json(['token' => $token], 200);
////            return redirect('/targets');
//        } else {
//            // Autentikacija nije uspjela, korisničko ime ili lozinka nisu ispravni
//            return response()->json(['message' => 'Neuspešna prijava'], 401);
//        }
//    }
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
    protected $redirectTo = 'http://127.0.0.1:8080/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
