<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Mail;
use Cache;
use App\Models\User;
use App\Models\location;
use App\Models\Trakings;
use App\Models\PasswordSecurity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail as FacadesMail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();

        return back()->with('message', 'User deleted.');
    }

    public function user_insert(Request $request)
    {
        // $created_by = session('USER_ID');
        //  dd($request->all());
        $user = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            //         'mobile' => 'numeric|required|min:10|max:10',
            //         'gender' => 'required',
            //         'designation' => 'required',
            //         'role' => 'required',
            // 		'user_location' => 'required',
            // 		'label_1' => 'required',
            // 		'label_2' => 'required',
            // 		'status' => 'required',
            //         'editer' => 'required ',
            //         'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        //image

        if ($request->image != '') {
            $imageName = time() . '.' . $request->image->extension();
            // dd($imageName);
            $randimg =  $request->image->move(('images/'), $imageName);
            // dd($randimg);
        } else {
            $imageName = null;
        }

        $role = new user;
        $role->fname = request('fname');
        $role->lname = request('lname');
        $role->username =  request('fname')  . " " . request('lname');
        $role->name = request('fname') . " " . request('lname');
        $randompassword = Str::random(10);
        $role->temp_password = $this->attributes['password'] = Hash::make($randompassword);
        $role->temp_decrypt = $randompassword;
        $role->email = request('email');
        $role->mobile = request('mobile');
        $role->gender = request('gender');
        $role->designation = request('designation');
        $role->role_id = request('role');
        $role->location_id = request('user_location');
        $role->level_1 = request('label_1');
        $role->level_2 = request('label_2');
        $role->status = request('status');
        $role->images = $imageName;
        $role->signature = request('editor');
        $role->created_by = session('USER_ID');
        $role->save();
        
         $last_user_id = $role->id;
        //dd($role->id);
        $passwordSecurity =new PasswordSecurity;
        $passwordSecurity->user_id = $role->id;
        $passwordSecurity->password_expiry_days = 30;
        $passwordSecurity->password_updated_at = Carbon::now();
        $passwordSecurity->save();
        $this->mail_send($randompassword, $role->email, $role->username, 'abinash889@gmail.com');
    
        //insert data into model has role 

        $model = DB::table('model_has_roles')->insert(
            ['role_id' => request('role'), 'model_id' => $last_user_id]
        );


        $permission = DB::table('role_has_permissions')->select('permission_id')->where('role_id', request('role'))->get();

        $count = count($permission);
        // dd($permission[1]->permission_id,$count,$last_user_id,request('role'));

        for ($i = 0; $i < $count; $i++) {

            $model = DB::table('model_has_permissions')->insert(
                ['permission_id' => $permission[$i]->permission_id, 'model_id' => $last_user_id]
            );
        }


        Cache::flush();

        // $request->session()->flash('roleinster', 'User Inserted Successflly');
        return redirect()->back()->with('msg', 'User Inserted Successfully');
        // return redirect('admin/user');
    }

    public function mail_send($temp_pass, $email, $username)
    {
        // echo "hyy";
        $data = ['temp_pass' => $temp_pass, 'email' => $email, 'username' => $username];

        // $data = ['name' => $fname, 'password' => $password];
        $smail = $email;
        $user['to'] = $smail;

        FacadesMail::send('mail.otppassword', $data, function ($messages) use ($user) {
            $messages->to($user['to']);

            $messages->subject('CT Hiring - OTP Password');
        });
    }


    public function userfetch()
    {
        $role = role::all();

        $location3 = location::all()->where('is_deleted', 'N');

        // $whereData = array(array('role_id', '=', '1'), array('role_id', '=', '5'), array('role_id', '=', '6'), array('role_id', '=', '7'));
        // role wise user show in this query ,which is inserted by 1,5,6,7
        $l1 = user::where('is_deleted', '=', 'N')
            ->where(function ($q) {
                    $q->where('role_id', '=', 1)
                    ->orwhere('role_id', '=', 2)
                    ->orwhere('role_id', '=', 3)
                    ->orwhere('role_id', '=', 4)
                    ->orwhere('role_id', '=', 5)
                    ->orwhere('role_id', '=', 6)
                    ->orwhere('role_id', '=', 7)
                    ->orwhere('role_id', '=', 8)
                    ->orwhere('role_id', '=', 10);
            })->get();

        $l2 = user::where('is_deleted', '=', 'N')
            ->where(function ($q) {
                $q->where('role_id', '=', 1)
                    ->orwhere('role_id', '=', 2)
                    ->orwhere('role_id', '=', 3)
                    ->orwhere('role_id', '=', 4)
                    ->orwhere('role_id', '=', 5)
                    ->orwhere('role_id', '=', 6)
                    ->orwhere('role_id', '=', 7)
                    ->orwhere('role_id', '=', 8)
                    ->orwhere('role_id', '=', 10);
            })->get();

        $view = user::all()->where('is_deleted', 'N');

        return view('admin.users.index', compact('view', 'location3', 'role', 'l1', 'l2'));
    }
    public function edit_user(Request $request,$id){
        $user = user::where('id',$id)->get();
        //dd($user);
        $role = role::all();

        $location3 = location::all()->where('is_deleted', 'N');

        // $whereData = array(array('role_id', '=', '1'), array('role_id', '=', '5'), array('role_id', '=', '6'), array('role_id', '=', '7'));
        // role wise user show in this query ,which is inserted by 1,5,6,7
        $l1 = user::where('is_deleted', '=', 'N')
            ->where(function ($q) {
                $q->where('role_id', '=', 1)
                    ->orwhere('role_id', '=', 2)
                    ->orwhere('role_id', '=', 3)
                    ->orwhere('role_id', '=', 4)
                    ->orwhere('role_id', '=', 5)
                    ->orwhere('role_id', '=', 6)
                    ->orwhere('role_id', '=', 7)
                    ->orwhere('role_id', '=', 8)
                    ->orwhere('role_id', '=', 10);
            })->get();

        $l2 = user::where('is_deleted', '=', 'N')
            ->where(function ($q) {
                $q->where('role_id', '=', 1)
                    ->orwhere('role_id', '=', 2)
                    ->orwhere('role_id', '=', 3)
                    ->orwhere('role_id', '=', 4)
                    ->orwhere('role_id', '=', 5)
                    ->orwhere('role_id', '=', 6)
                    ->orwhere('role_id', '=', 7)
                    ->orwhere('role_id', '=', 8)
                    ->orwhere('role_id', '=', 10);
            })->get();

        return view('admin.users.edit_user',compact('user', 'location3', 'role', 'l1', 'l2'));
    }

    public function update_user(Request $request, $id)
    {

        $role = user::findorfail($id);
        $role->fname = request('fname');
        $role->lname = request('lname');
        $role->email = request('email');
        $role->mobile = request('mobile');
        $role->gender = request('gender');
        $role->designation = request('designation');
        $role->role_id = request('role');
        $role->location_id = request('user_location');
        $role->level_1 = request('label_1');
        $role->level_2 = request('label_2');
        $role->signature = request('editor');
        $role->status = request('status');


        $role->modified_by = session('USER_ID');
        if ($request->hasfile('image')) {
            $destination = 'images/' . $role->images;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/', $filename);
            $role->images = $filename;
        }
        $role->save();


        DB::table('model_has_permissions')->where('model_id', $id)->delete();


        DB::update('update model_has_roles set role_id = ? where model_id = ?', [request('role'), $id]);
        $role_has_permision = DB::table('role_has_permissions')->where('role_id', request('role'))->get();
        $permision_count = count($role_has_permision);



        for ($i = 0; $i < $permision_count; $i++) {
            $role = DB::table('model_has_permissions')->insert([
                "permission_id" => json_decode($role_has_permision)[$i]->permission_id,
                "model_id" => $id
            ]);
        }

        $request->session()->flash('roleinster', 'User Update Successfully');
        return redirect('/user');
    }

    public function delete_user(Request $request, $id)
    {
        $role = user::findorfail($id);
        $role->is_deleted = "Y";
        $role->deleted_by = session('USER_ID');

        $role->save();
        $request->session()->flash('delt', 'User Delete Successflly');
        return redirect('/user');
    }

    // generate new otp for user

    public function generate_otp()
    {
        $userpost = User::all();
        return view('otp_generate.generate_otp', compact('userpost'));
    }

    public function generate_new_otp(Request $request, $id)
    {
        $role = user::findorfail($id);
        if ($role->password) {
            $role->password = "NULL";
        }
        $randompassword = Str::random(10);
        $role->temp_decrypt = $randompassword;
        $role->temp_password = $this->attributes['password'] = Hash::make($randompassword);
        $role->otp_create_date = date('Y-m-d H:i');
        $role->save();
        $this->mail_send1($randompassword, $role->email, $role->username);

        return redirect('/generate_otp')->with('msg', 'new otp generated.');
    }

    public function mail_send1($randompassword, $email, $username)
    {
        // echo "hyy";
        $data = ['temp_pass' => $randompassword, 'email' => $email, 'username' => $username];

        // $data = ['name' => $fname, 'password' => $password];
        $smail = $email;
        $user['to'] = $smail;

        FacadesMail::send('mail.otppassword', $data, function ($messages) use ($user) {
            $messages->to($user['to']);

            $messages->subject('CT Hiring - OTP Password');
        });
    }



    //change password by profile 


    public function changepassview(Request $request)
    {
        // dd($request->all());
        $check_mail=User::where('email',$request->email)->get();
        $count=count($check_mail);
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        // return response()->json(["status"=> $status]);
        // session::flash('success', "Password must contain minimum 8 characters with atleast one numeric, one uppercase, one lowercase and a special character.");
        return view('profile.change_password');
    }

    //password change function

    public function changePassword(Request $request)
    {

        // $request->validate([
        //     'current_password' => 'required',
        //     'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
        //     'password_confirmation' => 'required|same:password',
        // ]);

        $user = Auth::user();
         //dd($user);
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = Hash::make($request->password);
        //$user->save();
        session::flash('success', 'Password successfully changed!');
        return back();
    }

    // user traking function:

    public function allTrakings()
    {
        $trackrecords = Trakings::orderBy('id', 'desc')->get();
        return view('trakings.alltrakings', compact('trackrecords'));
    }

    function active_inactive($id)
    {

        $user = DB::table('users')
            ->select('status')
            ->where('id', '=', $id)
            ->first();
        if ($user->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $values = array('status' => $status);
        DB::table('users')->where('id', $id)->update($values);

        return redirect('/alltraking')->with('success','User Blacklisted Successfully');

    }
    public function email(Request $request)
    {
        $check_mail=User::where('email',$request->email)->get();
        $count=count($check_mail);
        if($count > 0){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(["status"=> $status]);
    }
}
