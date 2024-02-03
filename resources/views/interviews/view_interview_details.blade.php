<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('/Interview_Schedule')}}">Interviews</li></a>
                        <li class="breadcrumb-item active">{{$interview_details->candidate_name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @php
    $recruiter=App\Models\Resume::where('id',$interview_details->candidate_id)->first('created_by');
    $recruiter_name=App\Models\User::where('id',$recruiter->created_by)->first('name');



    @endphp
    @php
    $interview_date=App\Models\Interview::orderBy('id', 'DESC')->where('candidate_id',$interview_details->candidate_id)->where('interview_level','!=','null')->take(1)->first('interview_date');
    @endphp

    @php
    $stage=App\Models\Interview::orderBy('id', 'DESC')->where('candidate_id',$interview_details->candidate_id)->where('interview_level','!=','null')->take(1)->first('interview_level');
    @endphp

    @php
    $interview_status_result=App\Models\Interview::orderBy('id', 'DESC')->where('candidate_id',$interview_details->candidate_id)->take(1)->first('interview_status');
    @endphp


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered wd_37">
                            <tr>
                                <th>Candidate Name</th>
                                <td>{{$interview_details->candidate_name}}</td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td>{{optional($interview_details->position_name)->job_title}}</td>
                            </tr>
                            <tr>
                                <th>Company</th>
                                <td>{{optional($interview_details->client_n)->client_name}}</td>
                            </tr>
                            <tr>
                                <th>Interview Date</th>
                                <td>{{date('j-F-Y', strtotime($interview_date->interview_date))}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered wd_37">

                            @php
                            $interview_stage='';
                            if($stage->interview_level==1)
                            {
                            $interview_stage="First Interview";

                            }
                            elseif($stage->interview_level==2)
                            {
                            $interview_stage="Second Interview";
                            }

                            elseif($stage->interview_level==3)
                            {
                            $interview_stage="Third Interview";
                            }
                            elseif($stage->interview_level==4)
                            {
                            $interview_stage="Four Interview";
                            }
                            elseif($stage->interview_level==5)
                            {
                            $interview_stage="Final Interview";
                            }
                            @endphp



                            <tr>
                                <th>Current Stage</th>
                                <td>{{ $interview_stage}}</td>
                            </tr>

                            @php

                            if($interview_status_result->interview_status==0)
                            {
                            $interview="Schedule ";
                            $class="warning";

                            }
                            elseif($interview_status_result->interview_status==1)
                            {
                            $interview="Reschedule";
                            $class="secondary";
                            }

                            elseif($interview_status_result->interview_status==2)
                            {
                            $interview="Selected";
                            $class="success";
                            }

                            elseif($interview_status_result->interview_status==3)
                            {
                            $interview="Rejected";
                            $class="danger";
                            }

                            @endphp
                            <tr>
                                <th>Current Status</th>
                                <td>{{$interview}}</td>
                            </tr>
                            <tr>
                                <th>Recruiter</th>
                                <td>{{$recruiter_name->name}}</td>
                            </tr>
                            <tr>
                                <th>Create Date</th>
                                <td>{{date('j-F-Y', strtotime($interview_details->created_at))}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
            <div class="table-responsive">
                <table class="table table-bordered wd_37">
                    <tr>
                        <th>Interview Date</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>


                    @php
                    $stage_details=App\Models\Interview::where('candidate_id',$interview_details->candidate_id)->get();
                    @endphp
                    @foreach($stage_details as $st_details)

                    <tr>

                        @php
                        $interview_date="";
                         $inter_date="";
                            if($st_details->interview_status==0)
                            {
                            $int="Schedule";
                            $interview_date=$st_details->interview_date;


                            }
                            elseif($st_details->interview_status==1)
                            {
                            $int="Reschedule";
                            $interview_date=$st_details->interview_date;
                            }

                            elseif($st_details->interview_status==2)
                            {
                            $int="Selected";
                            $interview_date=$st_details->interview_date;

                            }

                            elseif($st_details->interview_status==3)
                            {
                            $int="Rejected";
                            $interview_date=$st_details->interview_date;

                            }
                            @endphp

                        <td>{{$interview_date}}</td>



                        @php
                        $interview_stage='';
                            if(4<=$st_details->interview_cv_status && $st_details->interview_cv_status<=7 )
                            {

                                $interview_stage="First Interview";
                            }
                            elseif(8<=$st_details->interview_cv_status && $st_details->interview_cv_status<=11 )
                            {

                                $interview_stage="Second Interview";

                            }
                            elseif(12<=$st_details->interview_cv_status && $st_details->interview_cv_status<=15 )
                            {
                                $interview_stage="Third Interview";

                            }

                            elseif(16<=$st_details->interview_cv_status && $st_details->interview_cv_status<=19 )
                            {
                                $interview_stage="Four Interview";

                            }
                            elseif(20<=$st_details->interview_cv_status && $st_details->interview_cv_status<=23 )
                            {
                                $interview_stage="Final Interview";

                            }
                        @endphp
                        <td>{{$interview_stage}} </td>


                            @php
                            $rem="";
                            if($st_details->interview_status==0)
                            {
                            $int="Schedule";
                            $class="warning";

                            }
                            elseif($st_details->interview_status==1)
                            {
                            $int="Reschedule";
                            $class="secondary";

                            }

                            elseif($st_details->interview_status==2)
                            {
                            $int="Selected";
                            $class="success";
                            $rem=$st_details->remark;
                            }

                            elseif($st_details->interview_status==3)
                            {
                            $int="Rejected";
                            $class="danger";
                            $rem=$st_details->reject_interview_resn;


                            }

                            @endphp
                            <td>{{$int}}</td>
                            <td>{{$rem}}</td>
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
        <div class="mt_btn">
            <a href="{{url('/Interview_Schedule')}}">
                <button type="button" class="btn btn-primary">Back</button>
            </a>
        </div>
    </div>


</x-admin-layout>