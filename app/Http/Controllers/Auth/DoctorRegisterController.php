<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Auth;
use DB;


class DoctorRegisterController extends Controller
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
        $this->middleware('guest:doctor');
    }

// Doctor
    public function showDoctorAddForm()
    {
        $c_data = DB::table('clinics')->select('id','clinic_name')->get();

        if(Auth::guard('admin')->check()){
            return view('admin.doctor_add', compact('c_data'));
        }
         return redirect('error/page'); 
    }

    protected function createDoctor(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'clinic_id' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|string|max:255',
            'specialist' => 'required|string|max:255',
            'treatment' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
        ]);
            $d = new Doctor();
            $d->firstname = $request->firstname;
            $d->lastname = $request->lastname;
            $d->clinic_id = $request->clinic_id;
            $d->email = $request->email;
            $d->password = Hash::make($request->password);
            $d->gender = $request->gender;
            $d->specialist = $request->specialist;
            $d->treatment = $request->treatment;
            $d->experience = $request->experience;
            $d->designation = $request->designation;
            $check = $d->save();
            if($check){
                return redirect()->intended('admin/doctor/page')->with('message','Docotr Add Successfully');
            }
            return redirect()->back()->with('message','something went wrong!'); 
    }

}
