<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\Qualification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch_degree()
    {
        $result = Degree::all()->where('is_deleted', 'N');
        // dd($result);
        $view = Qualification::all()->where('is_deleted', 'N');

        return view('settings.Degree', compact('result','view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_degree(Request $request)
    {
        $role = new Degree;
        $role->degree = request('degree');
        $role->qualification = request('qualification');
        $role->status = request('status');
        $role->save();
        $request->session()->flash('roleinster', 'Degree Created Successflly');

        return redirect('degree');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_degree(Request $request, $id)
    {
        $role = Degree::findorfail($id);
        $role->qualification = request('qualification');
        $role->degree = request('degree');
        $role->status = request('status');
        $role->save();

        $request->session()->flash('roleinster', 'Degree Update Successflly');
        return redirect('/degree');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function delete_degree(Request $request , $id)
    {
        $role = Degree::findorfail($id);
        $role->is_deleted = "Y";
        $role->save();
        $request->session()->flash('delt', 'Degree Deleted Successflly');
        return redirect('/degree');
    }
    public function degree_action(Request $request){
        // dd($request->all());
        $check_degree=Degree::where('degree',$request->degree)->get();
        $count=count($check_degree);
        
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(["status"=> $status]);
    }
}
