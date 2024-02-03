<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\location;
use App\Models\Role;
use App\Models\Position;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
//   public function dashboard()
//     {
//         $resume = Resume::all();
//         //dd($resume);
//         return view('dashboard',compact('resume'));
//     }

    public function view_profile(Request $request,$id)
    {
        $role = User::findorfail($id);
        // dd($role);
        // $rol = role::all();
        return view('profile.view_profile',compact('role'));
    }
    public function edit_profile(Request $request,$id)
    {
        $rol = role::all();
        $loc = location::all()->where('is_deleted', 'N');
        $role = User::findorfail($id);
        // dd($role);
        $l1 = user::
        where('role_id', '=', 1)
        ->orwhere('role_id', '=', 2)
        ->orwhere('role_id', '=', 3)
        ->orwhere('role_id', '=', 4)
        ->orwhere('role_id', '=', 5)
        ->orwhere('role_id', '=', 6)
        ->orwhere('role_id', '=', 7)
        ->orwhere('role_id', '=', 8)
        ->orwhere('role_id', '=', 10)
        ->get();

    // dd($l1);

    $l2 = user::
        where('role_id', '=', 1)
        ->orwhere('role_id', '=', 2)
        ->orwhere('role_id', '=', 3)
        ->orwhere('role_id', '=', 4)
        ->orwhere('role_id', '=', 5)
        ->orwhere('role_id', '=', 6)
        ->orwhere('role_id', '=', 7)
        ->orwhere('role_id', '=', 8)
        ->orwhere('role_id', '=', 10)->get();
        return view('profile.edit_profile',compact('role','loc','rol','l1','l2'));
    }
    public function update_profile(Request $request, $id)
    {
        //dd($request->all());
        // $profile = $request->validate([
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'email' => 'required|email',
        //     'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
        //     'designation' => 'required',
        //     'role' => 'required',
        //     'user_location' => 'required',
        //     'label_1' => 'required',
        //     'label_2' => 'required',
        //   ]);

        $role = user::findorfail($id);
        $role->fname = request('fname');
        $role->lname = request('lname');
        $role->email = request('email');
        $role->mobile = request('mobile');
        $role->designation = request('designation');
        $role->role_id = request('role');
        $role->location_id = request('user_location');
        $role->level_1 = request('label_1');
        $role->level_2 = request('label_2');
        //dd($role);
        $role->save();
        DB::table('model_has_roles')->where('model_id', $id)->update(array('role_id' => request('role')));

       // DB::update('update model_has_roles set role_id = ? where model_id = ?', [request('role') , $id]);

        $request->session()->flash('roleinster', 'user Update Successflly');
        return redirect('/');
    }
    public function cv_bank(){
        return view('cv_bank.cv_bank');
    }
    public function notification(){
        $view = position::distinct('client_name')->get()->unique('position_id');
        $resume = Resume::all();
        return view('notifications.notifications', compact('view','resume'));
    }

}