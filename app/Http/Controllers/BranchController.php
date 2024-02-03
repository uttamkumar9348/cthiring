<?php

namespace App\Http\Controllers;

use App\Models\client_location;
use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class BranchController extends Controller
{

    // clint data table

    public function clientbranch()
    {
       
        $location = DB::table('client_location')
        ->where('is_deleted', 'N')
        ->get();
        //dd($location);
        return view('settings.client_branch',['c_location' => $location]);
    }

    public function addclientbranch(Request $request)
    {

        $location = DB::table('client_location')->insert([
            'location' => $request->input('location'),
            'status' => $request->input('status'),
            'created_by'=>session('USER_ID'),
        ]);
        $request->session()->flash('msg', 'Client Branch Created Successfully');
        return redirect('/client_branch');
    }

    public function client_branch_updatedit(Request $request, $id)

    {


        DB::table('client_location')->where('id', $id)->update([
            'location' => $request->location,
            'status' => $request->status,
            'modified_by'=>session('USER_ID'),
            'updated_at'=> now()


        ]);
        $request->session()->flash('msg', 'Client Branch update Successfully');
        return redirect('/client_branch');
        // return view('thank');
    }

    public function client_delete(Request $request, $id)
    {

        // DB::table('client_location')->where('id', $id)->delete();
        DB::table('client_location')->where('id', $id)->update([
            'is_deleted' => 'Y'
        ]);

        $request->session()->flash('delt', 'Client Branch delete Successfully');
        return redirect('/client_branch');
    }
    public function client_branch_action(Request $request){
        $check_loc=client_location::where('location',$request->location)->get();
        $count=count($check_loc);
        
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(["status"=> $status]);
    }

    //user_branch 


     public function userbranch()
    {
        $location = DB::table('location')->get()->where('is_deleted', 'N');

        return view('settings.user_branch', ['location' => $location]);

        // return view('user_branch');
    }

    public function addbranch(Request $request)
    {

        $location = DB::table('location')->insert([
            'location' => $request->input('location'),
            'status' => $request->input('status'),
            'created_by'=>session('USER_ID'),
        ]);
        $request->session()->flash('msg', 'User Branch Created Successfully');
        return redirect('/user_branch');
    }

    public function updatedit(Request $request, $id)

    {


        DB::table('location')->where('id', $id)->update([
            'location' => $request->location,
            'status' => $request->status,
            'modified_by'=>session('USER_ID'),
            'updated_at'=> now()


        ]);
        $request->session()->flash('msg', 'User Branch update Successfully');
        return redirect('/user_branch');
        // return view('thank');
    }

    public function userdelete(Request $request, $id)
    {
        DB::table('location')->where('id', $id)->update([
            'is_deleted' => 'Y'
        ]);
        $request->session()->flash('delt', 'User Branch delete Successfully');
        return redirect('/user_branch');
    }
        public function user_branch_action(Request $request){
        $check_loc=location::where('location',$request->location)->get();
        $count=count($check_loc);
        
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(["status"=> $status]);
    }
}
