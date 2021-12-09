<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Patient;
use Hash;
use Auth;

class PatientController extends Controller
{
    public function showPatientPage()
    {
        $records = Patient::all();
        return view('admin.patient_page', compact('records'));
    }

    public function patientHomepage()
    {
        
        if(Auth::guard('patient')->check()){
            return view('patient.patienthomepage');
        }
  
        return redirect()->intended('authentication/login')->withSuccess('Opps! You do not have access');
    }

    public function deletePatientRecord($id)
    {
        $records = Patient::find($id);
        $records->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function editPatientRecord($id)
    {
        $data = Patient::find($id);
        return view('admin.patient_edit',['data'=>$data]);
    }

    public function updatePatientRecord(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'contact' => 'required',
            'address' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'password' => 'required|string|min:6|confirmed',
    ]);

        $data = Patient::find($request->id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->age = $request->age;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect()->route('patientPage')->with('message','Updated Successfully');
    }

}
