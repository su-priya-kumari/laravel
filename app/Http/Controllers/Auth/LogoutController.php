<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

class LogoutController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    // public function __construct()
    // {
    //         $this->middleware('guest')->except('logout');
    //         $this->middleware('guest:admin')->except('logout');
    //         $this->middleware('guest:doctor')->except('logout');
    //         $this->middleware('guest:patient')->except('logout');
    // }

// logout    
    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
