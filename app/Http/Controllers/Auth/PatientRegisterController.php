<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\VerifyUser;
use App\Mail\VerifyEmail;
use App\Models\Patient;
use Session;
use Carbon;
use Auth;
use Mail;


class PatientRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:patient');
    }

//patient
    public function showPatientRegisterForm()
    {
        return view('patient.register');
    }

    protected function createPatient(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'contact' => 'required',
            'address' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:patients',
            'password' => 'required|string|min:6|confirmed',
        ]);

            $user = Patient::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'contact' => $request->contact,
                'address' => $request->address,
                'age' => $request->age,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
  
            // VerifyUser::create([
            //     'token' => Str::random(60),
            //     'user_id' => $user->id, 
            // ]);
                
            // Mail::to($user->email)->send(new VerifyEmail($user));
            
            return redirect()->intended('authentication/login')->with('message', 'Please click on the link sent to your email');
    }

    public function verifyEmail($token)
    {
        $verifiedUser = VerifyUser::where('token',$token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(isset($verifiedUser) ){
            $user = $verifiedUser->user;
              
            if(!$user->email_verified_at) {
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect()->intended('authentication/login')->with('message', 'Your e-mail has been verified');
            } else {
                return redirect()->back()->with('message', 'Your e-mail is already verified. You can now login.');
            }
        }
        else{
            return redirect()->intended('authentication/login')->with('message', 'something went wrong');
        }
    }
}
