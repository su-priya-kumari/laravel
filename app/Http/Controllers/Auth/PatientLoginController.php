<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Auth\SessionGuard;
class PatientLoginController extends Controller
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
   
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:patient')->except('logout');
    }

// patient
     public function showPatientLoginForm()
    {
        return view('patient.login');
    }

    public function patientLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            // if (Auth::guard('patient')->email_verified_at == null){
            //     Auth::logout();
            //     return redirect()->intended('authentication/login')->with('message', 'Please verify your email to continue');
            // }
            return redirect()->intended('/homepage');
        }
        return redirect()->back()->with('message','something went wrong!please try again !');
    }

}
