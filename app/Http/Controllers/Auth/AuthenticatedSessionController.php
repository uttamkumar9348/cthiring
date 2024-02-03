<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\Models\User;
use App\Models\OtpStore;
use App\Models\Trakings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\PasswordSecurity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail as FacadesMail;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

       
        // dd($request->all());
       // $request->authenticate();
    //    $check_user=User::all();
    //    dd($check_user);

        // dd($user_id->$request->id);


        $password_status=User::where('email',$request->email)->get();
        
        

        if(!$password_status->isEmpty()){

            //dd($password_status);
            $password_ex_id=$password_status[0]->id;
            $request->session()->forget('password_expired_id');
    
            $password_updated_at = PasswordSecurity::where('user_id',$password_ex_id)->get('password_updated_at');
            $password_expiry_days = PasswordSecurity::where('user_id',$password_ex_id)->get('password_expiry_days');
            $date=date('Y-m-d',strtotime($password_updated_at[0]->password_updated_at));
            $password_expiry_at = Carbon::parse($date)->addDays($password_expiry_days[0]->password_expiry_days);
            $now=Carbon::now();
          
            $temp_pass_status=$password_status[0]->temp_password;
            $pass = Hash::check($request->password, $temp_pass_status);

        if(!$temp_pass_status==null && $pass){

            $get_user=User::where('email',$request->email)
                            ->where('temp_password', Hash::check('temp_password',$request->password))
                            ->get();

                            // dd($get_user[0]->id);
                            $get_id=$get_user[0]->id;
                        //   dd($get_user);
                if($get_user->isNotEmpty()){
                     return view('auth.newpassword',compact('get_id'));

                }
                else{
                    return "incorrect";
                }
        }
        else{
            $user = User::where('id',$password_status[0]->id)->first('role_id');
            //dd($user->role_id);
            if($user->role_id != 9){
                if($password_expiry_at->lessThan(Carbon::now())){
                    $request->session()->put('password_expired_id',$password_status[0]->id);
                    auth()->logout();
                    return redirect()->back()->with('msg', "Your Password is expired, Please Contact To Administrator.");
                }
            }

       $credentials = $request->only('email', 'password');
      //dd($password_status);
       if (Auth::attempt($credentials)) {
        $id = Auth::user()->id;

        $user_id = User::where('id',$id)->get();
        $user_fname = $user_id[0]['fname'];
        $user_lname = $user_id[0]['lname'];
        $username =  $user_fname . " " .  $user_lname;

        //dd( $username);

        $email= $request->email;
        // $random=rand(111111,999999);
        $random=123456;
        $user_data=User::where('id',$id)->get('mobile');
        $is_present_mobile_no=OtpStore::where('mobile_no',$user_data[0]->mobile)->get();
        if($is_present_mobile_no->isEmpty()){
            $otpstore= new OtpStore;
            $otpstore->otp=$random;
            $otpstore->mobile_no=$user_data[0]->mobile;
            $otpstore->save();


            $customer_mobile=$otpstore->mobile_no;
            $customer_otp=  $otpstore->otp;


        }
        else{
            $otpstore=OtpStore::where('mobile_no','=',$user_data[0]->mobile)->first();
            $otpstore->otp=$random;
            $otp_in=$otpstore->otp;
            $otpstore->update();

        }
        $request->session()->regenerate();
        $request->session()->put('USER_ID', Auth::id());
        $userid=session('USER_ID');


        // dd($otp_in,$email);

       // $this->mail_send('Prasant','666555');
        $this->mail_send( $random ,$email,$username,'abinash889@gmail.com');

        if(Auth::user()->status == 1){
            $request->session()->flash('success','OTP sent to your email id.');
            return view('auth.otp');
            }
            else{

                return redirect ('/');
            }

       }elseif($password_status[0]->temp_password !=null){
           return redirect ('/login')->with('msg',"One Time Password Failed");
       }else{

        $request->session()->regenerate();
         $request->session()->put('USER_ID', Auth::id());
         $userid=session('USER_ID');
        //dd(session('USER_ID'));

        //  return redirect()->intended(RouteServiceProvider::HOME)->with('msg',"Invalid Password");
        return redirect ('/login')->with('msg',"Invalid Password");
            }
            
        }
    }
    else{
        return redirect ('/login')->with('msg',"Invalid User Id");
    }
    }

    //prasant email
    public function mail_send($random,$email,$username)
    {
        // echo "hyy";
 $data = [ 'otp' => $random , 'email' => $email, 'username' => $username];

        // $data = ['name' => $fname, 'password' => $password];
         $smail = $email;
        $user['to'] = $smail;

        FacadesMail::send('mail.otp', $data, function ($messages) use ($user) {
            $messages->to($user['to']);

            $messages->subject('CT Hiring -Login OTP Password');
        });
    }

    public function newpass(Request $request)
    {
      //dd($request->all());
      $changepass=User::where('id',$request->user_id)->first();
      $get_id = $changepass->id;
      //dd($changepass);
        if($changepass->change_pass==null){
            $device = User::where('id',$request->user_id);
            $device->update([
            'password' => Hash::make($request->password),
            'change_pass' => Hash::make($request->password),
    
            'temp_password' => null
            ]);
         
            $passwordSecurity =PasswordSecurity::where('user_id',$request->user_id)->first();
                // $passwordSecurity->user_id = $request->user_id;
                $passwordSecurity->password_expiry_days = 30;
                $passwordSecurity->password_updated_at = Carbon::now();
                $passwordSecurity->update();

                return redirect ('/login')->with('success',"Password Change Successful. Login with your New Password");
        }else{
          
          

            if(Hash::check($request->password,$changepass->change_pass) ){
                //Current password and new password are same
                //dd('hy');
                $request->session()->flash('error','New Password cannot be same as your previous password. Please choose a different password.'); 
                return view('auth.newpassword',compact('get_id'));
            }else{
                $device = User::where('id',$request->user_id);
                $device->update([
                'password' => Hash::make($request->password),
                'change_pass' => Hash::make($request->password),
        
                'temp_password' => null
                ]);
             
                $passwordSecurity =PasswordSecurity::where('user_id',$request->user_id)->first();
                // $passwordSecurity->user_id = $request->user_id;
                $passwordSecurity->password_expiry_days = 30;
                $passwordSecurity->password_updated_at = Carbon::now();
                $passwordSecurity->update();

                    return redirect ('/login')->with('success',"Password Change Successful. Login with your New Password");
                }   
        }   
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success',"Logout Successfully");
    }

    public function otp()
    {
        // $request->session()->flash('success','OTP sent to your email id.');
        return view('auth.otp');
    }
    public function otp_verify(Request $request){

       // dd($request->all(),session('USER_ID'));
        $mobile_no_get=User::where('id',session('USER_ID'))->get('mobile');
        $get_otp=OtpStore::where('mobile_no',$mobile_no_get[0]->mobile)->get();

        //dd($request->otp,$get_otp[0]->otp);
       if($request->otp==$get_otp[0]->otp){

        $request->session()->put('otp_verified',true);
        // dd($request->session());


           //create user traking data in traking model

           Trakings::create([
            'users_id' =>auth()->id(),
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'ip_addresh' => $request->ip(),
            //'device' => $request->header('User-Agent');
            'device' => $request->userAgent()

        ]);



        return redirect('/');

       }
       else{
        // Auth::logout();
        $request->session()->flash('otpmsg','Invalid OTP');
        return view('auth.otp');

       }
    }
}