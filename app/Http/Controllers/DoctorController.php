<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Doctor;
use DB;
use Hash;

class DoctorController extends Controller
{
    public function showDoctorPage()
    {
        $c_data = DB::table('clinics')->select('id','clinic_name')->get();
        $records = Doctor::all();
        return view('admin.doctor_page', compact('records','c_data'));
    }

    public function deleteDoctorRecord($id)
    {
        $records = Doctor::find($id);
        $records->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function editDoctorRecord($id)
    {
        $c_data = DB::table('clinics')->select('id','clinic_name')->get();
        $data = Doctor::find($id);
        return view('admin.doctor_edit', compact('c_data','data'));
    }

    public function updateDoctorRecord(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'clinic_id' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|string|max:255',
            'specialist' => 'required|string|max:255',
            'treatment' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
        ]);
            $d = Doctor::find($request->id);
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
                return redirect()->intended('admin/doctor/page')->with('message','Docotr Updated Successfully');
            }
            return redirect()->back()->with('message','something went wrong!'); 
    }
}
