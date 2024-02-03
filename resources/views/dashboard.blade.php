<x-admin-layout>
    <style>
    input[type="date"].form-control, input[type="time"].form-control, input[type="datetime-local"].form-control, input[type="month"].form-control {
    line-height: 1;
}
        select.form-control:not([size]):not([multiple]) {
            height: calc(26px + 2px);
        }
        .form-control{
                padding: 0.35rem 10px!important;
        }
        .no_count {
            border-right: 1px dashed #ADB2B5;
            max-width: 15%;
            margin-bottom: 10px;
        }

        .ml_23 {
            margin-left: 23px;
        }

        .pd_20 {
            padding: 20px;
        }

        .label {
            cursor: default;
        }

        .label-warning,
        .badge-warning {
            background-color: #f89406 !important;
        }

        .label {
            padding: 1px 4px 2px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .label,
        .badge {
            font-size: 13px;
            font-weight: bold;
            line-height: 14px;
            color: #fff;
            text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);
            white-space: nowrap;
            vertical-align: baseline;
            background-color: #999;
        }

        .label-success,
        .badge-success {
            background: #70A415 !important;
        }

        .label-important,
        .badge-error {
            background: #C62626 !important;
        }

        .label-info,
        .badge-info {
            background: #058DC7 !important;
        }
        .srch{
            padding: 0.3rem 10px;
            font-size: 13px;
            line-height: 1.25;
            color: #4E5154;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #BABFC7;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .betch{
            padding: 1px 4px;
            font-size: 0.8rem;
        }
    </style>
    <div class="content-header row"></div>
    <div class="content-body">
        <!-- Revenue, Hit Rate & Deals -->
        <div class="row">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Dashboard 
                            <span style="float:right">
                                <form action="{{url('/search_filter')}}" method="post">
                                    @csrf
                                    <div class="col-12" id="search">
                                        <div class="row">
                                            <div class="col-2 pd_3">
                                                <lable>For The Period: </lable>
                                            </div>
                                            <div class="col-2 pd_3">
                                                <input type="date" class="form-control" name="from_date">
                                            </div>
                                            <div class="col-2 pd_3">
                                                <input type="date" class="form-control" name="to_date">
                                            </div>
                                            <div class="col-2 pd_3">
                                                <select name="report" class="form-control" style="clear:left">
                                                    <option value="">Choose Report</option>
                                                    <option value="monthwise">Monthwise</option>
                                                    <option value="cumulative">Cumulative</option>
                                                </select>
                                            </div>
                                            <div class="col-2 pd_3">
                                                <select name="client" class="form-control" style="clear:left">
                                                    <option value="">Choose Client</option>
                                                    @php
                                                        $client = App\Models\client::select('client_name')->distinct()->get();
                                                    @endphp
                                                    @foreach($client as $cl)
                                                        <option value="1">{{$cl->client_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2 pd_3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-light">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </span>
                        </h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            @php
                                foreach($resume as $cr){
                                    $user = App\Models\Position::where('position_id',$cr->position_id)->first();
                                }
                                $id = json_decode($user->crm);
                            @endphp                            
                            <div class="row pd_20">
                                <div class="col-12 col-md-2 no_count">
                                    <h5>Openings Worked</h5>
                                    @php
                                        $ldate = date('Y-m-d');
                                        $plan = App\Models\myplan::where('task_date',$ldate)->where('user_id',session('USER_ID'))->where('approve_status',1)->get();
                                        $count = count($plan);
                                    @endphp
                                    @if($count > 0 && $id[0]=session('USER_ID'))
                                        <h2><b>{{$count}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 no_count ml_23">
                                    <h5>CV Sent</h5>
                                    @php
                                        $sent_cv = App\Models\Resume::where('cv_status','>=',1)->where('crm_status',1)->get();
                                            $count1 = count($sent_cv);
                                            foreach($sent_cv as $s_cv){
                                                $check= $s_cv->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count1 > 0 && $id[0]==session('USER_ID') && $check == $current_month)
                                        <h2><b>{{$count1}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 no_count ml_23">
                                    <h5>CV Shortlisted</h5>
                                    @php
                                        $shortlisted = App\Models\Resume::where('cv_status','>=',2)->get();
                                        $count2 = count($shortlisted);
                                            foreach($shortlisted as $s){
                                                $check1= $s->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count2 > 0 && $id[0]==session('USER_ID') && $check1 == $current_month)
                                        <h2><b>{{$count2}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 no_count ml_23">
                                    <h5>CAN Interviewed</h5>
                                    @php
                                        $interviewed = App\Models\Resume::where('cv_status','>=',2)->get();
                                        $count3 = count($interviewed);
                                            foreach($interviewed as $I){
                                                $check2= $I->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count3 > 0 && $id[0]==session('USER_ID') && $check2 == $current_month)
                                        <h2><b>{{$count3}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 no_count ml_23">
                                    <h5>CAN Joined</h5>
                                    @php
                                        $joined = App\Models\Resume::where('cv_status','>=',26)
                                        ->where('cv_status','!=',27)->where('cv_status','!=',28)->get();
                                        $count4 = count($joined);
                                        foreach($joined as $J){
                                                $check3= $J->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count4 > 0 && $id[0]==session('USER_ID') && $check3 == $current_month)
                                        <h2><b>{{$count4}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 ml_23">
                                    <h5>Billing Value</h5>
                                    @php
                                        $resume = App\Models\Resume::where('cv_status','>=',29)->get();
                                        foreach($resume as $res){
                                        
                                            $billing = App\Models\Billing::where('resume_id',$res->id)->first();
                                            $check= $billing->created_at->format('M');
                                            
                                           
                                        }
                                    @endphp
                                    
                                    @if(!empty($resume) && !empty($billing) && $id[0]==session('USER_ID'))
                                            @if($check==$current_month)
                                                <h2><b>₹{{$billing->sum('billing_amount')}}</b></h2>
                                            @else
                                                <h2><b>₹0</b></h2>
                                            @endif
                                  
                                    @endif
                                </div>
                            </div>
                            <div class="row pd_20">
                                <div class="col-12 col-md-2 no_count">
                                    <h5>Feedback Awaited</h5>
                                    @php
                                        $feedback = App\Models\Resume::where('cv_status','=',1)->get();
                                        $count6 = count($feedback);
                                            foreach($feedback as $F){
                                                $check4= $F->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count6 > 0 && $id[0]==session('USER_ID') && $check4 == $current_month)
                                        <h2><b>{{$count6}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 no_count ml_23">
                                    <h5>CV Rejected</h5>
                                    @php
                                        $reject_cv = App\Models\Resume::where('cv_status','=',3)
                                        ->get();
                                        $count7 = count($reject_cv);
                                            foreach($reject_cv as $R){
                                                $check5= $R->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count7 > 0 && $id[0]==session('USER_ID') && $check5 == $current_month)
                                        <h2><b>{{$count7}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 no_count ml_23">
                                    <h5>CAN INT Rejected</h5>
                                    @php
                                        $int_reject = App\Models\Resume::where('cv_status','=',7)
                                        ->orwhere('cv_status','=',11)->orwhere('cv_status','=',15)->orwhere('cv_status','=',19)->orwhere('cv_status','=',23)
                                        ->get();
                                        $count8 = count($int_reject);
                                            foreach($int_reject as $I_r){
                                                $check6= $I_r->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count8 > 0 && $id[0]==session('USER_ID') && $check6 == $current_month)
                                        <h2><b>{{$count8}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 no_count ml_23">
                                    <h5>CAN Offered</h5>
                                    @php
                                        $offer = App\Models\Resume::where('cv_status','>=',22)
                                        ->where('cv_status','!=',25)
                                        ->get();
                                        $count9 = count($offer);
                                        foreach($offer as $O){
                                                $check7= $O->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count9 > 0 && $id[0]==session('USER_ID') && $check7 == $current_month)
                                        <h2><b>{{$count9}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 no_count ml_23">
                                    <h5>Offer Rejected</h5>
                                    @php
                                        $reject_offer = App\Models\Resume::where('cv_status','=',25)
                                        ->get();
                                        $count10 = count($reject_offer);
                                        foreach($reject_offer as $r_o){
                                                $check8= $r_o->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count10 > 0 && $id[0]==session('USER_ID') && $check8 == $current_month)
                                        <h2><b>{{$count10}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                                <div class="col-12 col-md-2 ml_23">
                                    <h5>Openings Billed</h5>
                                    @php
                                        $billed = App\Models\Resume::where('cv_status','=',29)
                                        ->get();
                                        $count11 = count($billed);
                                        foreach($billed as $B){
                                                $check9= $B->created_at->format('M');
                                            }
                                    @endphp
                                    @if($count11 > 0 && $id[0]==session('USER_ID') && $check9 == $current_month)
                                        <h2><b>{{$count11}}</b></h2>
                                    @else
                                        <h2><b>0</b></h2>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Calculation Table</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <div class="row">
                                
                                <div class="col-3">
                                        <tbody>
                                    <table class="table">
                                            <tr>
                                                <th>Criteria</th>
                                                <th>{{date('M Y',strtotime($res->created_at))}}</th>
                                            </tr>
                                            <tr>
                                                <td>Openings Worked</td>
                                                @if($count > 0 && $id[0]=session('USER_ID'))
                                                    <td>{{$count}}</td>
                                                @else
                                                    <td>0</td>
                                                @endif
                                                
                                            </tr>
                                            <tr>
                                                <td>CV Submitted</td>
                                                @if($count1 > 0 && $id[0]==session('USER_ID'))
                                                    <td>{{$count1}}</td>
                                                @else
                                                    <td>0</td>
                                                @endif
                                            
                                            </tr>
                                            <tr>
                                                <td>CRM Rejected</td>
                                                @php
                                                    $crm_reject = App\Models\Resume::where('cv_status','=',0)->where('crm_status',2)->get();
                                                    $count12 = count($crm_reject);
                                                @endphp
                                                @if($count12 > 0 && $id[0]=session('USER_ID'))
                                                    <td>{{$count12}}</td>
                                                @else
                                                    <td>0</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>CRM Validation Pending</td>
                                                @php
                                                    $crm_pending = App\Models\Resume::where('cv_status','=',0)->where('crm_status',0)->get();
                                                    $count13 = count($crm_pending);
                                                @endphp
                                                @if($count13 > 0 && $id[0]=session('USER_ID'))
                                                    <td>{{$count13}}</td>
                                                @else
                                                    <td>0</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>CV Sent</td>
                                                <td>
                                                    @if($count1 > 0 && $id[0]==session('USER_ID'))
                                                    <span style="color: white;" class="label label-warning shortlist_label cv_sent_label" data-original-title="">
                                                        {{$count1}}
                                                    </span>
                                                    @else
                                                    <span style="color: white;" class="label label-warning shortlist_label cv_sent_label" data-original-title="">
                                                        0
                                                    </span> 
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CV Feedback Awaited</td>
                                                <td>
                                                    @if($count6 > 0 && $id[0]==session('USER_ID'))
                                                    <span style="color: white;" class="label label-primary shortlist_label" data-original-title="">{{$count6}}</span>
                                                    @else
                                                    <span style="color: white;" class="label label-primary shortlist_label" data-original-title="">0</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CV Shortlisted</td>
                                                <td>
                                                    @if($count2 > 0 && $id[0]==session('USER_ID'))
                                                    <span rel="tooltip" style="color: white;" class="label label-success shortlist_label" data-original-title="">
                                                        {{$count2}}
                                                    </span>
                                                    @else
                                                    <span rel="tooltip" style="color: white;" class="label label-success shortlist_label" data-original-title="">
                                                        0
                                                    </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CV Rejected</td>
                                                <td>
                                                    @if($count7 > 0 && $id[0]==session('USER_ID'))
                                                    <span style="color: white;" class="label label-important shortlist_label" data-original-title="">{{$count7}}</span>
                                                    @else
                                                    <span style="color: white;" class="label label-important shortlist_label" data-original-title="">0</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>First Interview Scheduled</td>
                                                <td>
                                                    @php
                                                        $first = App\Models\Resume::where('cv_status',4)->get();
                                                        $count14 = count($first);
                                                    @endphp
                                                    @if($count14 > 0 && $id[0]==session('USER_ID'))
                                                    <span rel="tooltip" style="color: white;" class="label label-info first_interview_scheduled">{{$count14}}</span>
                                                    @else
                                                    <span rel="tooltip" style="color: white;" class="label label-info first_interview_scheduled">0</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Second Interview Scheduled</td>
                                                <td>
                                                    @php
                                                        $second = App\Models\Resume::where('cv_status',8)->get();
                                                        $count15 = count($second);
                                                    @endphp
                                                    @if($count15 > 0 && $id[0]==session('USER_ID'))
                                                    <span rel="tooltip" style="color: white;" class="label label-info first_interview_scheduled">{{$count15}}</span>
                                                    @else
                                                    <span rel="tooltip" style="color: white;" class="label label-info first_interview_scheduled">0</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Final Interview Scheduled</td>
                                                <td>
                                                    @php
                                                        $final = App\Models\Resume::where('cv_status',20)->get();
                                                        $count16 = count($final);
                                                    @endphp
                                                    @if($count16 > 0 && $id[0]==session('USER_ID'))
                                                    <span rel="tooltip" style="color: white;" class="label label-info first_interview_scheduled">{{$count16}}</span>
                                                    @else
                                                    <span rel="tooltip" style="color: white;" class="label label-info first_interview_scheduled">0</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CAN Interviewed</td>
                                                @if($count3 > 0 && $id[0]==session('USER_ID'))
                                                <td>{{$count3}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>CAN Int Rejected</td>
                                                @if($count8 > 0 && $id[0]==session('USER_ID'))
                                                <td>{{$count8}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>CAN Offered</td>
                                                @if($count9 > 0 && $id[0]==session('USER_ID'))
                                                <td>{{$count9}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Offer Rejected</td>
                                                @if($count10 > 0 && $id[0]==session('USER_ID'))
                                                <td>{{$count10}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>CAN Joined</td>
                                                @if($count4 > 0 && $id[0]==session('USER_ID'))
                                                <td>{{$count4}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Openings Billed</td>
                                                @if($count11 > 0 && $id[0]==session('USER_ID'))
                                                <td>{{$count11}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Billing Value</td>
                                                @if(!empty($resume) && !empty($billing) && $id[0]==session('USER_ID'))
                                                    <td>₹{{$billing->sum('billing_amount')}}</td>
                                                @else
                                                    <td>₹0</td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Productivity <span style="color:#999">Individual</span>
                            <span style="float:right">
                                <form action="{{url('/search_filter')}}" method="post">
                                    @csrf
                                    <div class="col-12" id="search">
                                        <div class="row">
                                            <div class="col-1" style="margin-left: 33px;"></div>
                                            <div class="col-4 pd_3">
                                                <input type="date" class="form-control" name="from_date">
                                            </div>
                                            <div class="col-4 pd_3">
                                                <input type="date" class="form-control" name="to_date">
                                            </div>
                                            <div class="pd_3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </span>
                        </h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <div class="dataTables_wrapper form-inline" role="grid">
                                <table width="100%" class="table dataTable" style="width: 100%;">
                                    <thead class="">
                                        <tr role="row">
                                            <th style="width: 100px;">Date</th>
                                            <th style="width: 77px;">Session</th>
                                            <th style="text-align: center; width: 112px;">Job Code</th>
                                            <th style="text-align: center; width: 97px;">CTC (₹)</th>
                                            <th style="text-align: center; width: 88px;">CV Target</th>
                                            <th style="text-align: center; width: 72px;">CV Sent</th>
                                            <th style="text-align: center; width: 118px;">Productivity</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6" style="text-align:right;" rowspan="1">Productivity for the Period 01-Oct - 22-Oct </th>
                                            <th style="text-align:center" colspan="1" rowspan="1">0%</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <tr class="odd">
                                            <td>13-Oct-2022</td>
                                            <td class=" ">Forenoon</td>
                                            <td style="text-align:center">
                                                <a target="_blank" href="/position/view/1" rel="tooltip" data-original-title="Sr recurt">CT/26/2022</a>
                                            </td>

                                            <td style="text-align:center">7 Lacs</td>
                                            <td style="text-align:center">0</td>

                                            <td style="text-align:center"></td>
                                            <td style="text-align:center" width="100">0%</td>
                                        </tr>
                                        <tr class="even">
                                            <td class=" ">14-Oct-2022</td>
                                            <td class=" ">Forenoon</td>
                                            <td style="text-align:center">
                                                <a target="_blank" href="/position/view/1" rel="tooltip" data-original-title="Sr recurt">CT/26/2022</a>
                                            </td>

                                            <td style="text-align:center">7 Lacs</td>
                                            <td style="text-align:center">0</td>

                                            <td style="text-align:center"></td>
                                            <td style="text-align:center" width="100">0%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Business Conversion <span style="color:#999">Individual</span>
                            <span style="float:right">
                                <form action="{{url('/search_filter')}}" method="post">
                                    @csrf
                                    <div class="col-12" id="search">
                                        <div class="row">
                                            <div class="col-1" style="margin-left: 33px;"></div>
                                            <div class="col-4 pd_3">
                                                <input type="date" class="form-control" name="from_date">
                                            </div>
                                            <div class="col-4 pd_3">
                                                <input type="date" class="form-control" name="to_date">
                                            </div>
                                            <div class="pd_3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </span>
                        </h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <div id="dt_k_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table class="table table-striped table-bordered">
    							    <thead>
    									<tr>
    										<th style="text-align:center" colspan="2">Openings Related</th>
    										<th style="text-align:center" colspan="2">CV Quality &amp; Contribution</th>
    									</tr>
    								</thead>
    								<tbody>
    									<tr>
    										<td class="optional" width="300">Positions Worked</td>
    										<td style="text-align:center" width="100" class="optional"></td>
    										<td class="essential persist" width="300">CV Sent</td>
    										<td style="text-align:center" width="100" class="optional">
    										0</td>
    									</tr>
    									<tr>
    										<td class="optional">Openings Handled</td>
    										<td style="text-align:center" class="optional">0</td>
    										<td class="essential persist">Average Lead Time (Days)</td>
    										<td style="text-align:center" class="optional">0</td>
    									</tr>
    									<tr>
    										<td class="optional">Openings Billed</td>
    										<td style="text-align:center" class="optional">0</td>
    										<td class="essential persist">CVs Billed</td>
    										<td style="text-align:center" class="optional">0</td>
    									</tr>
    									<tr>
    										<td class="optional">Openings Not Billed</td>
    										<td style="text-align:center" class="optional">0</td>
    										<td class="essential persist">CVs Not Billed</td>
    										<td style="text-align:center" class="optional">0</td>
    									</tr>
    									
    									<tr>
    										<td class="optional">Business Value (₹)</td>
    										<td style="text-align:center" class="optional">- </td>
    										<td class="essential persist">% of Final Interview Candidates</td>
    										<td style="text-align:center" class="optional">0</td>
    									</tr>
    									<tr>
    										<td class="essential persist">Billing Value (₹)</td>
    										<td style="text-align:center" class="optional">0 Lacs</td>
    										<th class="essential persist">Individual Contribution</th>
    										<th style="text-align:center" class="optional">0 Lacs</th>
    										
    									</tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
        									<th colspan="6" style="text-align:right;">Business Conversion for the Period 01-Oct - 22-Oct</th>
        									<th style="text-align:center" colspan=""></th>
    									</tr>
    								</tfoot>
    							</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daily Activity <span style="color:#999">Overview</span></h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <div class="chartjs">
                                <canvas id="thisYearRevenue" width="400" style="position: absolute;"></canvas>
                                <canvas id="lastYearRevenue" width="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Calendar <span style="float:right"><button class="btn btn-warning">View All</button></span></h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Resumes <span style="float:right"><button class="btn btn-warning">View All</button></span></h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <label>Search: <input type="text" class="srch" name="resume" id="search" placeholder="Search User"></label>
                            <div class="dataTables_wrapper form-inline" role="grid">
                                <table width="100%" class="table dataTable" style="width: 100%;">
                                    <thead class="">
                                        <tr role="row">
                                            <th style="width: 100px;">Date</th>
                                            <th style="width: 77px;">Candidate Name</th>
                                            <th style="text-align: center; width: 112px;">Email</th>
                                            <th style="text-align: center; width: 97px;">Phn No.</th>
                                            <th style="text-align: center; width: 88px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $resume = App\Models\Resume::all();
                                        @endphp
                                        @foreach($resume as $res)
                                        <tr class="odd">
                                            <td style="width: 100%;">{{date('d-M-Y',strtotime($res->created_at))}}</td>
                                            <td>{{$res->name}}</td>
                                            <td style="text-align:center">{{$res->email}}</td>
                                            <td style="text-align:center">{{$res->mobile}}</td>
                                            <td style="text-align:center">
                                                @if($res->crm_status==1 && $res->cv_status>=1)
                                                    <span class="btn btn-success betch" data-toggle="tooltip" data-placement="top" title="CRM Validated">
                                                        <b>CRM Validated</b>
                                                    </span>
                                                @elseif($res->crm_status==2 )
                                                    <span class="btn btn-danger betch" data-toggle="tooltip" data-placement="top" title="Rejected">
                                                        <b>Rejected</b>
                                                    </span>
                                                @else
                                                    <span class="btn btn-secondary betch" data-toggle="tooltip" data-placement="top" title="CRM Validation Pending">
                                                        <b>CRM Validation Pending</b>
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Interviews<span style="float:right"><button class="btn btn-warning">View All</button></span></h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <label>Search: <input type="text" class="srch" name="interview" id="search" placeholder="Search User"></label>
           <!--                 <div id="dt_k_wrapper" class="dataTables_wrapper form-inline" role="grid">-->
           <!--                     <table class="table table-striped table-bordered">-->
    							<!--    <thead>-->
    							<!--		<tr>-->
    							<!--			<th style="text-align:center" colspan="2">Openings Related</th>-->
    							<!--			<th style="text-align:center" colspan="2">CV Quality &amp; Contribution</th>-->
    							<!--		</tr>-->
    							<!--	</thead>-->
    							<!--	<tbody>-->
    							<!--		<tr>-->
    							<!--			<td class="optional" width="300">Positions Worked</td>-->
    							<!--			<td style="text-align:center" width="100" class="optional"></td>-->
    							<!--			<td class="essential persist" width="300">CV Sent</td>-->
    							<!--			<td style="text-align:center" width="100" class="optional">-->
    							<!--			0</td>-->
    							<!--		</tr>-->
    							<!--		<tr>-->
    							<!--			<td class="optional">Openings Handled</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--			<td class="essential persist">Average Lead Time (Days)</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--		</tr>-->
    							<!--		<tr>-->
    							<!--			<td class="optional">Openings Billed</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--			<td class="essential persist">CVs Billed</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--		</tr>-->
    							<!--		<tr>-->
    							<!--			<td class="optional">Openings Not Billed</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--			<td class="essential persist">CVs Not Billed</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--		</tr>-->
    									
    							<!--		<tr>-->
    							<!--			<td class="optional">Business Value (₹)</td>-->
    							<!--			<td style="text-align:center" class="optional">- </td>-->
    							<!--			<td class="essential persist">% of Final Interview Candidates</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--		</tr>-->
    							<!--		<tr>-->
    							<!--			<td class="essential persist">Billing Value (₹)</td>-->
    							<!--			<td style="text-align:center" class="optional">0 Lacs</td>-->
    							<!--			<th class="essential persist">Individual Contribution</th>-->
    							<!--			<th style="text-align:center" class="optional">0 Lacs</th>-->
    										
    							<!--		</tr>-->
           <!--                         </tbody>-->
           <!--                         <tfoot>-->
           <!--                             <tr>-->
        			<!--						<th colspan="6" style="text-align:right;">Business Conversion for the Period 01-Oct - 22-Oct</th>-->
        			<!--						<th style="text-align:center" colspan=""></th>-->
    							<!--		</tr>-->
    							<!--	</tfoot>-->
    							<!--</table>-->
           <!--                 </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Clients <span style="float:right"><button class="btn btn-warning">View All</button></span></h4>
                        
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <label>Search: <input type="text" class="srch" name="client" id="search"></label>
                            <div class="dataTables_wrapper form-inline" role="grid">
                                <table width="100%" class="table dataTable" style="width: 100%;">
                                    <thead class="">
                                        <tr role="row">
                                            <th style="width: 100px;">Client</th>
                                            <th style="width: 77px;">Location</th>
                                            <th style="width: 112px;">Created By</th>
                                            <th style="width: 97px;">Created</th>
                                            <th style="width: 88px;">No.positions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="even">
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Positions <span style="float:right"><button class="btn btn-warning">View All</button></span></h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <label>Search: <input type="text" class="srch" name="client" id="search"></label>
                            <div id="dt_k_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table class="table table-striped table-bordered">
    							    <thead>
    									<tr>
    										<th style="text-align:center" colspan="2">Job Title</th>
    										<th style="text-align:center" colspan="2">Client</th>
    										<th style="text-align:center" colspan="2">Status</th>
    										<th style="text-align:center" colspan="2">Created Date</th>
    										<th style="text-align:center" colspan="2">CV Sent</th>
    									</tr>
    								</thead>
    								<tbody>
    									<tr>
    										
    									</tr>
                                    </tbody>
    							</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Offers <span style="float:right"><button class="btn btn-warning">View All</button></span></h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <label>Search: <input type="text" class="srch" name="offers" id="search" placeholder="Search User"></label>
                            <!--<div class="dataTables_wrapper form-inline" role="grid">-->
                            <!--    <table width="100%" class="table dataTable" style="width: 100%;">-->
                            <!--        <thead class="">-->
                            <!--            <tr role="row">-->
                            <!--                <th style="width: 100px;">Date</th>-->
                            <!--                <th style="width: 77px;">Candidate Name</th>-->
                            <!--                <th style="text-align: center; width: 112px;">Email</th>-->
                            <!--                <th style="text-align: center; width: 97px;">Phn No.</th>-->
                            <!--                <th style="text-align: center; width: 88px;">Status</th>-->
                            <!--            </tr>-->
                            <!--        </thead>-->
                            <!--        <tbody>-->
                            <!--
                            <!--            <tr class="odd">-->
                            <!--                
                            <!--            </tr>-->
                            <!--        </tbody>-->
                            <!--    </table>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Joinees<span style="float:right"><button class="btn btn-warning">View All</button></span></h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <label>Search: <input type="text" class="srch" name="joinees" id="search" placeholder="Search User"></label>
           <!--                 <div id="dt_k_wrapper" class="dataTables_wrapper form-inline" role="grid">-->
           <!--                     <table class="table table-striped table-bordered">-->
    							<!--    <thead>-->
    							<!--		<tr>-->
    							<!--			<th style="text-align:center" colspan="2">Openings Related</th>-->
    							<!--			<th style="text-align:center" colspan="2">CV Quality &amp; Contribution</th>-->
    							<!--		</tr>-->
    							<!--	</thead>-->
    							<!--	<tbody>-->
    							<!--		<tr>-->
    							<!--			<td class="optional" width="300">Positions Worked</td>-->
    							<!--			<td style="text-align:center" width="100" class="optional"></td>-->
    							<!--			<td class="essential persist" width="300">CV Sent</td>-->
    							<!--			<td style="text-align:center" width="100" class="optional">-->
    							<!--			0</td>-->
    							<!--		</tr>-->
    							<!--		<tr>-->
    							<!--			<td class="optional">Openings Handled</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--			<td class="essential persist">Average Lead Time (Days)</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--		</tr>-->
    							<!--		<tr>-->
    							<!--			<td class="optional">Openings Billed</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--			<td class="essential persist">CVs Billed</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--		</tr>-->
    							<!--		<tr>-->
    							<!--			<td class="optional">Openings Not Billed</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--			<td class="essential persist">CVs Not Billed</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--		</tr>-->
    									
    							<!--		<tr>-->
    							<!--			<td class="optional">Business Value (₹)</td>-->
    							<!--			<td style="text-align:center" class="optional">- </td>-->
    							<!--			<td class="essential persist">% of Final Interview Candidates</td>-->
    							<!--			<td style="text-align:center" class="optional">0</td>-->
    							<!--		</tr>-->
    							<!--		<tr>-->
    							<!--			<td class="essential persist">Billing Value (₹)</td>-->
    							<!--			<td style="text-align:center" class="optional">0 Lacs</td>-->
    							<!--			<th class="essential persist">Individual Contribution</th>-->
    							<!--			<th style="text-align:center" class="optional">0 Lacs</th>-->
    										
    							<!--		</tr>-->
           <!--                         </tbody>-->
           <!--                         <tfoot>-->
           <!--                             <tr>-->
        			<!--						<th colspan="6" style="text-align:right;">Business Conversion for the Period 01-Oct - 22-Oct</th>-->
        			<!--						<th style="text-align:center" colspan=""></th>-->
    							<!--		</tr>-->
    							<!--	</tfoot>-->
    							<!--</table>-->
           <!--                 </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-admin-layout>