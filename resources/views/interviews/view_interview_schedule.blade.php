<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('/Interview_Schedule')}}">Interviews</li></a>
                        <li class="breadcrumb-item active">View Interview Schedule</li>
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
    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="table-responsive">
            <table class="table table-striped dataex-html5-selectors">
                <thead>
                    <tr>
                        <th>Candidate Name</th>
                        <th>Position</th>
                        <th>Company</th>
                        <th>CRM</th>
                        <th>Recruiter</th>
                        <th>Interview Date</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th>Created</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($interview as $res)

                    @php
                    $crm_id=App\Models\Position::where('position_id', $res->position_id)->get('crm');
                    $crm=json_decode($crm_id[0]->crm);
                    $crm_user_name=App\Models\User::where('id',$crm[0])->first('name');

                    @endphp


                    @php
                    $recruiter=App\Models\Resume::where('id',$res->candidate_id)->first('created_by');
                    $recruiter_name=App\Models\User::where('id',$recruiter->created_by)->first(['name','level_1']);

                    array_push($crm,$recruiter_name->level_1);

                    @endphp


                    @php
                    $inter_date=App\Models\Interview::orderBy('id', 'DESC')->where('candidate_id',$res->candidate_id)->where('interview_level','!=','null')->take(1)->first('interview_date');
                    @endphp


                    @php
                    $stage=App\Models\Interview::orderBy('id', 'DESC')->where('candidate_id',$res->candidate_id)->where('interview_level','!=','null')->take(1)->first('interview_level');
                    @endphp

                    @php
                    $interview_status_result=App\Models\Interview::orderBy('id', 'DESC')->where('candidate_id',$res->candidate_id)->take(1)->first('interview_status');
                    @endphp

                    @if(in_array(session('USER_ID'),$crm))
                    <tr>
                        <td><a href="{{url('/view_interview_details',$res->id)}}">{{$res->candidate_name}}</a></td>
                        <!-- <td>{{$res->position_id}}</td> -->
                        <td>{{optional($res->position_name)->job_title}}</td>
                        <td>{{optional($res->client_n)->client_name}}</td>
                        <td>{{$crm_user_name->name}}</td>
                        <td>{{$recruiter_name->name}}</td>
                        <td>@if($res->interview_date !== null){{date('j-F-Y', strtotime($inter_date->interview_date))}}@endif</td>

                        @php
                        $interview_stage='';
                        if($res->interview_level != null){
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
                        }
                        @endphp


                        <td>{{ $interview_stage}}</td>

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

                        <td><span class="badge badge-default badge-{{$class}}">{{$interview}}</span></td>
                        <td>{{date('j-F-Y', strtotime($res->created_at))}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
</x-admin-layout>