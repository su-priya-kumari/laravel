<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Http\Request;
// use Spatie\Permission\Models\Permission;
// use App\Models\User;
// use App\Models\Admin;
// use App\Models\Patient;
// use App\Models\Doctor;
// use App\Models\VerifyUser;
// use Session;
// use Auth;
// use Mail;
// use DB;
// use App\Mail\VerifyEmail;
// use Carbon;

// class RegisterController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Register Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles the registration of new users as well as their
//     | validation and creation. By default this controller uses a trait to
//     | provide this functionality without requiring any additional code.
//     |
//     */

//     use RegistersUsers;
//     /**
//      * Where to redirect users after registration.
//      *
//      * @var string
//      */
//     protected $redirectTo = '/home';

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest');
//         // $this->middleware('guest:admin');
//         $this->middleware('guest:doctor');
//         $this->middleware('guest:patient');
//     }

// // Admin
//     public function showAdminAddForm()
//     {
//         if(Auth::guard('admin')->check()){
//            return view('admin.admin_add');
//         }
//         return redirect('error/page'); 
//     }

//     protected function createAdmin(Request $request)
//     {
//         $request->validate([
//             'firstname' => 'required|string|max:255',
//             'lastname' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:admins',
//             'password' => 'required|string|min:6|confirmed',
//         ]);
//         $a = new Admin();
//         $a->firstname = $request->firstname;
//         $a->lastname = $request->lastname;
//         $a->email = $request->email;
//         $a->password = Hash::make($request->password);
//         $check = $a->save();
//         if($check){
//             return redirect()->intended('/admin/page')->with('message','Admin Add Successfully');
//         }
//         return redirect()->back()->with('message','something went wrong!');  
//     }

// // Doctor
//     public function showDoctorAddForm()
//     {
//         $c_data = DB::table('clinics')->select('id','clinic_name')->get();

//         if(Auth::guard('admin')->check()){
//             return view('admin.doctor_add', compact('c_data'));
//         }
//          return redirect('error/page'); 
//     }

//     protected function createDoctor(Request $request)
//     {
//         $request->validate([
//             'firstname' => 'required|string|max:255',
//             'lastname' => 'required|string|max:255',
//             'clinic_id' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:doctors',
//             'password' => 'required|string|min:6|confirmed',
//             'gender' => 'required|string|max:255',
//             'specialist' => 'required|string|max:255',
//             'treatment' => 'required|string|max:255',
//             'experience' => 'required|string|max:255',
//             'designation' => 'required|string|max:255',
//         ]);
//             $d = new Doctor();
//             $d->firstname = $request->firstname;
//             $d->lastname = $request->lastname;
//             $d->clinic_id = $request->clinic_id;
//             $d->email = $request->email;
//             $d->password = Hash::make($request->password);
//             $d->gender = $request->gender;
//             $d->specialist = $request->specialist;
//             $d->treatment = $request->treatment;
//             $d->experience = $request->experience;
//             $d->designation = $request->designation;
//             $check = $d->save();
//             if($check){
//                 return redirect()->intended('admin/doctor/page')->with('message','Docotr Add Successfully');
//             }
//             return redirect()->back()->with('message','something went wrong!'); 
//     }
// //patient
//     public function showPatientRegisterForm()
//     {
//         return view('patient.register');
//     }

//     public function create(array $data)
//     {
//       return Patient::create([
//         'firstname' => $data['firstname'],
//         'lastname' => $data['lastname'],
//         'contact' => $data['contact'],
//         'address' => $data['address'],
//         'age' => $data['age'],
//         'gender' => $data['gender'],
//         'email' => $data['email'],
//         'password' => Hash::make($data['password'])
//         // $p = new Patient();
//         // $p->firstname = $request->firstname;
//         // $p->lastname = $request->lastname;
//         // $p->contact = $request->contact;
//         // $p->address = $request->address;
//         // $p->age = $request->age;
//         // $p->gender = $request->gender;
//         // $p->email = $request->email;
//         // $p->password = Hash::make($request->password);
//         // $p->save();
//       ]);
//     }

//     protected function createPatient(Request $request)
//     {
//         $request->validate([
//             'firstname' => 'required|string|max:255',
//             'lastname' => 'required|string|max:255',
//             'contact' => 'required',
//             'address' => 'required',
//             'age' => 'required',
//             'gender' => 'required',
//             'email' => 'required|string|email|max:255|unique:patients',
//             'password' => 'required|string|min:6|confirmed',
//         ]);

//             $user = Patient::create([
//                 'firstname' => $request->firstname,
//                 'lastname' => $request->lastname,
//                 'contact' => $request->contact,
//                 'address' => $request->address,
//                 'age' => $request->age,
//                 'gender' => $request->gender,
//                 'email' => $request->email,
//                 'password' => Hash::make($request->password)
//             ]);
           
//             $token = Str::random(64);
  
//             VerifyUser::create([
//                 'user_id' => $user->id, 
//                 'token' => $token
//                 ]);
    
//             Mail::to($user->email)->send(new VerifyEmail($user));
            
//             // return redirect()->intended('/homepage')->withSuccess('Great! You have Successfully loggedin');
//     }

//     public function verifyEmail($token)
//     {
//         $verifiedUser = VerifyUser::where('token', $token)->first();
  
//         $message = 'Sorry your email cannot be identified.';
  
//         if(isset($verifiedUser) ){
//             $user = $verifiedUser->user;
              
//             if(!$user->email_verified_at) {
//                 $user->email_verified_at = Carbon::now();
//                 $user->save();
//                 return redirect()->intended('authentication/login')->with('message', 'Your e-mail is not verified');
//             } else {
//                 return redirect()->back()->with('message', 'Your e-mail is already verified. You can now login.');
//             }
//         }
//         else{
//             return redirect()->intended('authentication/login')->with('message', 'something went wrong');
//         }
//     }
// }
