<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Socialite;
use Auth;
use Exception;
use App\User;

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
    protected $maxAttempts = 3; // default is 5
    protected $decayMinutes = 1; // default is 1
    // protected $redirectTo;
    public function redirectTo()
    {           
        return redirect()->route('admindashboard');
        return $next($request);
    } 
     
    // protected $redirectTo = '/';

    public function showLoginForm()
    {
        if(auth::check()){
            return redirect()->route('admindashboard');
        }
        else{
            return view('admin.loginform');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
       return array_merge($request->only($this->username(), 'password'), ['status' => 1, 'verified' => 1]);
    }
}
