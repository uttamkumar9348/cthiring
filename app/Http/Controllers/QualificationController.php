<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{

    // public function showqualification()
    // {
    //     return view('qualification');
    // }

    public function add_qualification(Request $request)
    {
        $role = new Qualification;
        $role->qualification_name = request('qualification');

        $role->status = request('status');
        $role->save();
        $request->session()->flash('roleinster', 'Qualification Created Successflly');
        return redirect('/qualification');
    }

    public function fetch_qualification()
    {

        $view = Qualification::all()->where('is_deleted', 'N');

        return view('settings.qualification', compact('view'));
    }

    public function edit_qualificaation(Request $request, $id)
    {
        $role = Qualification::findorfail($id);
        $role->qualification_name = request('qualification');
        $role->status = request('status');
        $role->save();

        $request->session()->flash('roleinster', 'Qualification Update Successflly');
        return redirect('/qualification');
    }
    public function delete_qualification(Request $request, $id)
    {
        $role = Qualification::findorfail($id);
        $role->is_deleted = "Y";
        $role->save();
        $request->session()->flash('delt', 'Qualification Delete Successflly');
        return redirect('/qualification');
    }
    public function qualify_action(Request $request){
        // dd($request->all());
        $check_qualify=Qualification::where('qualification_name',$request->qualify)->get();
        $count=count($check_qualify);
        
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(["status"=> $status]);
    }
}
