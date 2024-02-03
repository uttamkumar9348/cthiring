<x-admin-layout>
<style>
    .expiry{
        border: 1px solid #eb5c5c;
        padding: 3px 10px;
        color: #fff;
        background-color: #ee303e;
        border-radius:5px;
    }
</style>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item active">Generate OTP</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('roleinster'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('roleinster')}}
    </div>
    @endif
    @if(session()->has('msg'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('msg')}}
    </div>
    @endif
    @php 
        Illuminate\Support\Facades\Session::forget('msg'); 
    @endphp
    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="collapse show table-responsive">
                <table class="table table-striped dataex-html5-selectors">
                    <thead>
                        <tr>
                            <th>user id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">OTP Password</th>
                            <th class="text-center">OTP Status</th>
                            <th class="text-center">Password Status</th>
                            <th class="text-center">generate new otp</button></th>
                            <th class="text-center">Password Change Date</th>
                            <th class="text-center">Expiry Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userpost as $i)
                        <tr>
                            <td style="vertical-align: middle;">{{$i['id']}}</td>
                            <td style="vertical-align: middle;">{{$i['name']}}</td>
                            <td style="vertical-align: middle;">{{$i['email']}}</td>
                            <td class="text-center" style="vertical-align: middle;">{{$i['mobile']}}</td>
                            <td class="text-center" style="vertical-align: middle;">{{$i['temp_decrypt']}}</td>
                            @if ($i['temp_password'])
                            <td class="text-center"><span class="active_btn" style="background-color:#F5AA1A;color:#fff;">New OTP Generated</span></td>
                            @else
                            <td class="text-center"><span class="active_btn btn-success">Active</span></td>
                            @endif

                            @if ($i['temp_password'])
                            <td class="text-center"><span class="active_btn" style="background-color:#058DC7;color:#fff;">Not Active</span></td>
                            @else
                            <td class="text-center"><span class="active_btn btn-success">Active</span></td>
                            @endif
                            <td class="text-center">
                                <a href="{{ url('generate_new_otp/'. $i->id) }}">
                                    <button type="button" class="btn btn-success"> generate new otp</button>
                                </a>
                            </td>
                            @php
                                $user = App\Models\User::where('id',$i->id)->first('role_id');
                                $expiry = App\Models\PasswordSecurity::where('user_id',$i->id)->first('password_updated_at');
                                $date1 = date('d-m-y',strtotime($expiry->password_updated_at));
                                $date2 = date('d-m-y',strtotime('+30 days',strtotime($expiry->password_updated_at)));
                                
                                $date = (\Carbon\Carbon::now()->diff(\Carbon\Carbon::parse($expiry->password_updated_at)));
                                $numberofDays =  $date->format('%a');
                                
                            @endphp
                            <td class="text-center" style="vertical-align: middle;">{{date('d-M-Y H:i A',strtotime($expiry->password_updated_at))}}</td>
                            
                            @if($user->role_id != 9)
                            @if($numberofDays > 30)
                            <td class="text-center" style="vertical-align: middle;"><span class="expiry">Expired</span></td>
                            @else
                            <td class="text-center" style="vertical-align: middle;">{{ 30 - $numberofDays }} days left</td>
                            @endif
                            @else
                            <!--<td class="text-center" style="vertical-align: middle;">{{$numberofDays }} days </td>-->
                            <td class="text-center" style="vertical-align: middle;"><span class="expiry" style="background-color:#1E9FF2;border:1px solid #1E9FF2">ADMIN</span></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
        <!-- Form wizard with icon tabs section end -->
</x-admin-layout>