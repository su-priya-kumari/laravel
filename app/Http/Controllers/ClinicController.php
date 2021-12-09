<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function indexclinic()
    {
        return view('admin.clinic_add');
    }

    public function deleteClinicRecord($id)
    {
        $records = Clinic::find($id);
        $records->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function editClinicRecord($id)
    {
        $data = Clinic::find($id);
        return view('admin.clinic_edit',['data'=>$data]);
    }
    
    public function showClinicPage()
    {
        $records = Clinic::all();
        return view('admin.clinic_page', compact('records'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'clinic_name'=>'required',
            'address'=>'required',
            'state'=>'required',
            'country'=>'required',
            'contact'=>'required',
            'specialization'=>'required',
        ]);

        Clinic::create([
            'clinic_name'=> $request->clinic_name,
            'address'=> $request->address,
            'state'=> $request->state,
            'country'=> $request->country,
            'contact'=> $request->contact,
            'specialization'=> $request->specialization,
        ]);
        return redirect()->route('clinicPage')->with('message','Inserted Successfully');
    }

    public function updateClinicRecord(Request $request)
    {
        $request->validate([
        'clinic_name'=>'required',
        'address'=>'required',
        'state'=>'required',
        'country'=>'required',
        'contact'=>'required',
        'specialization'=>'required',
    ]);

        $data = Clinic::find($request->id);
        $data->clinic_name=$request->clinic_name;
        $data->address=$request->address;
        $data->state=$request->state;
        $data->country=$request->country;
        $data->contact=$request->contact;
        $data->specialization=$request->specialization;
        $data->save();
        return redirect()->route('clinicPage')->with('message','Updated Successfully');
    }
}
