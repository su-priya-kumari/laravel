<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
    public function showAdminPage()
    {
        $records = Admin::all();
        return view('admin.admin_page', compact('records'));
    }
    
    public function mappage()
    {
        return view('admin.map');
    }
    public function mapspage()
    {
        return view('admin.maps');
    }
    public function dashboardpage()
    {
        return view('admin.dashboard');
    }
    public function profilepage()
    {
        return view('admin.profile');
    }
    public function errorpage()
    {
        return view('admin.error');
    }
    
    public function deleteAdminRecord($id)
    {
        $records = Admin::find($id);
        $records->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function editAdminRecord($id)
    {
        $data = Admin::find($id);
        return view('admin.admin_edit',['data'=>$data]);
    }

    public function updateAdminRecord(Request $request)
    {
        $request->validate([
        'firstname'=>'required',
        'lastname'=>'required',
        'email'=>'required|email',
        'password' => 'required|string|min:6|confirmed',
    ]);

        $data = Admin::find($request->id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect()->route('adminPage')->with('message','Updated Successfully');
    }


}
