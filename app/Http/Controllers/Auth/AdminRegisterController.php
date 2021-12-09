<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AdminRegisterController extends Controller
{
    use RegistersUsers;
    
    protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->middleware('guest');
        // $this->middleware('guest:admin');
    }

// Admin
    public function showAdminAddForm()
    {
        if(Auth::guard('admin')->check()){
           return view('admin.admin_add');
        }
        return redirect('error/page'); 
    }

    protected function createAdmin(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $a = new Admin();
        $a->firstname = $request->firstname;
        $a->lastname = $request->lastname;
        $a->email = $request->email;
        $a->password = Hash::make($request->password);
        $check = $a->save();
        if($check){
            return redirect()->intended('/admin/page')->with('message','Admin Add Successfully');
        }
        return redirect()->back()->with('message','something went wrong!');  
    }
  
}
