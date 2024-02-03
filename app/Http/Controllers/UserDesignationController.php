<?php

namespace App\Http\Controllers;

use App\Models\user_designation;
use Illuminate\Http\Request;

class UserDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add_userdesignation(Request $request)
    {
        $role = new user_designation;
        $role->user_designation = request('user_designation');
        //$role->mobile = request('mobile');


        $role->status = request('status');
        $role->save();
        $request->session()->flash('roleinster', 'Designation Created Successflly');
        return redirect('/candidate_designation');
    }



    public function fetch_userdesignation()
    {

        $view = user_designation::all()->where('is_deleted', 'N');


        return view('settings.user_designation', compact('view'));
    }

    public function edit_userdesignation(Request $request, $id)
    {
        $role = user_designation::findorfail($id);
        $role->user_designation = request('user_designation');      

        $role->status = request('status');
        $role->save();

        $request->session()->flash('roleinster', 'Designation Update Successflly');
        return redirect('/candidate_designation');
    }

    public function delete_userdesignation(Request $request, $id)
    {
        $role = user_designation::findorfail($id);
        $role->is_deleted = "Y";
        $role->save();
        $request->session()->flash('delt', 'Role Delete Successflly');
        return redirect('/candidate_designation');
    }
        public function candidate_action(Request $request){
        $check_desg=user_designation::where('user_designation',$request->user)->get();
        $count=count($check_desg);
        
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(["status"=> $status]);
    }
}
