<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Models\Degree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch_specialization()
    {
        $result = Specialization::all()->where('is_deleted', 'N');
        $degree = Degree::all()->where('is_deleted', 'N');
        // dd($result);

        return view('settings.specialization', compact('result','degree'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_specialization(Request $request)
    {
        $role = new Specialization;
        $role->specialization_name = request('specialization');        
        $role->degree_id = request('degree');
        $role->status = request('status');
        $role->save();
        $request->session()->flash('roleinster', 'Specialization Created Successflly');

        return redirect('/specialization');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_specialization(Request $request,$id)
    {
        $role = Specialization::findorfail($id);
        $role->specialization_name = request('specialization');        
        $role->degree_id = request('degree');
        $role->status = request('status');
        $role->save();

        $request->session()->flash('roleinster', 'Specialization Update Successflly');
        return redirect('/specialization');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function delete_specialization(Request $request , $id)
    {
        $role = Specialization::findorfail($id);
        $role->is_deleted = "Y";
        $role->save();
        $request->session()->flash('delt', 'Specialization Deleted Successflly');
        return redirect('/specialization');
    }
    public function spec_action(Request $request){
        // dd($request->all());
        $check_spec=Specialization::where('specialization_name',$request->spec)->get();
        $count=count($check_spec);
        
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(["status"=> $status]);
    }
    public function spec_fetch(Request $request){
        // dd($request->all());
        $check_spec=Specialization::where('degree_id',$request->id)->get();
        // echo $check_spec;
        
        return response()->json($check_spec);
    }
}
