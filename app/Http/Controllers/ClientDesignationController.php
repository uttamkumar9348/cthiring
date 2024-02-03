<?php

namespace App\Http\Controllers;

use App\Models\client_designation;
use Illuminate\Http\Request;

class ClientDesignationController extends Controller
{


    // public function ShowClientDesignation()
    // {
    //     return view('client_designation');
    // }


    public function add_clientdesignation(Request $request)
    {
        $role = new client_designation;
        $role->client_designation = request('client_designation');
        // $role->mobile = request('mobile');


        $role->status = request('status');
        $role->save();
        $request->session()->flash('roleinster', 'Designation Created Successflly');
        return redirect('/client_designation');
    }



    public function fetch_clientdesignation()
    {

        $view = client_designation::all()->where('is_deleted', 'N');


        return view('settings.client_designation', compact('view'));
    }

    public function edit_clientdesignation(Request $request, $id)
    {
        $role = client_designation::findorfail($id);
        $role->client_designation = request('client_designation');
        $role->status = request('status');
        $role->save();

        $request->session()->flash('roleinster', 'Designation Update Successflly');
        return redirect('/client_designation');
    }

    public function delete_clientdesignation(Request $request, $id)
    {
        $role = client_designation::findorfail($id);
        $role->is_deleted = "Y";
        $role->save();
        $request->session()->flash('delt', 'Role Delete Successflly');
        return redirect('/client_designation');
    }
    public function client_action(Request $request){
        $check_desg=client_designation::where('client_designation',$request->client)->get();
        $count=count($check_desg);
        
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(["status"=> $status]);
    }
}
