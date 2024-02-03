<x-admin-layout>
    <style>
        body.vertical-layout.vertical-menu-modern.menu-expanded .footer {
            margin-left: 0px;
        }
    </style>

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Positions</li>
                        <li class="breadcrumb-item active">Approve Position Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="">
                <div class="collapse show">
                    <div class="pd_lr_body">

                        <div class="">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home">Basic Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1">Job Description</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="home" class="tab-pane pd_0 active"><br>
                                    <div class="collapse show">
                                        <div class="pd_0">
                                            <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered wd_21">
                                                                <tr>
                                                                    <th>Client Name</th>
                                                                    <td>{{optional ($view->client_na)->client_name}}
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <th>SPOC Details</th>
                                                                    <td>
                                                                        <ul style="padding:0px;">
                                                                            <li>{{optional ($view->pos_client_cont)->contact_name}}
                                                                            </li>
                                                                            <li>{{optional ($view->pos_client_cont)->mobile}}
                                                                            </li>
                                                                            <li>{{optional ($view->pos_client_cont)->email}}
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Job Title</th>
                                                                    <td>{{$view->job_title }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Job Location</th>
                                                                    <td>{{$view->job_location}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Job Code</th>
                                                                    <td>{{$view->job_code}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td>{{$view->age_min}}-{{$view->age_max}}Years
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Gender</th>
                                                                    <td>{{$view->gender}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Experience</th>
                                                                    <td>{{$view->min_experience }}-{{$view->max_experience}}Years
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>CTC</th>
                                                                    <td>{{$view->annual_ctc_min}}-{{$view->annual_ctc_max}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Billable Value</th>
                                                                    <td>{{$view->billable_value}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total Billable Value</th>
                                                                    <td>{{$view->total_billable}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Qualification</th>

                                                                    <td>{{optional ($view->qualification_title)->qualification_name}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Functional Area</th>
                                                                    <td>{{optional ($view->functional_pos)->function}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Created At</th>
                                                                    <td>{{$view->created_at}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered wd_21">
                                                                <tr>
                                                                    <th>Created By</th>
                                                                    <td>{{optional($view->position_create)->fname}}{{optional($view->position_create)->lname}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>CRM</th>
                                                                    <td style="text-align: left;">
                                                                        <!-- CRM Name Fetch -->

                                                                        @php

                                                                        $test=json_decode($view->crm);
                                                                        @endphp

                                                                        @foreach($test as $test1)
                                                                        @php

                                                                        $crm_name=App\Models\User::where('id',$test1)->get();

                                                                        @endphp
                                                                        <span class="badge badge-primary">
                                                                            {{$crm_name[0]->fname}} {{$crm_name[0]->lname}}</span>

                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Technical Skills</th>

                                                                    @php
                                                                    $test='';
                                                                    $test=json_decode($view->technicalskils);
                                                                    $count=count($test);
                                                                    @endphp



                                                                    <td>
                                                                        @php
                                                                        for($i=0;$i<$count;$i++){ @endphp <span class="badge badge-primary">
                                                                            {{$test[$i]}}</span>

                                                                            @php
                                                                            }

                                                                            @endphp
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <th>Behavioural Skills</th>
                                                                    @php
                                                                    $test1='';
                                                                    $test1=json_decode($view->behaviour_skils);
                                                                    $count=count($test1)
                                                                    @endphp

                                                                    <td>
                                                                        @php
                                                                        for($i=0;$i<$count;$i++){ @endphp <span class="badge badge-secondary">
                                                                            {{$test1[$i]}}
                                                                            </span>
                                                                            @php
                                                                            }
                                                                            @endphp

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total Openings</th>
                                                                    <td>{{$view->total_opening}}</td>
                                                                </tr>
                                                                <tr>
                                                                    @php
                                                                    $recruiter_id=App\Models\Position::where('position_id', $view->position_id)->get(['recruiters','position_no_recruiter','is_approve']);
                                                                    @endphp

                                                                    <th>Recruiters</th>
                                                                    <td>
                                                                        @foreach($recruiter_id as $recruiter_name)
                                                                        <span class="badge badge-primary">
                                                                            {{optional ($recruiter_name->client_requiter)->fname}}{{optional ($recruiter_name->client_requiter)->lname}} - {{$recruiter_name->position_no_recruiter}}
                                                                        </span>
                                                                        @php
                                                                        if($recruiter_name->is_approve==1){
                                                                        @endphp
                                                                        <span>
                                                                            <i class="la la-check-circle" data-toggle="tooltip" title="Approve"></i>
                                                                        </span>
                                                                        @php
                                                                        }
                                                                        elseif($recruiter_name->is_approve==0){
                                                                        @endphp
                                                                        <span>
                                                                            <i class="la la-hourglass-start"  data-toggle="tooltip" title="Pending"></i>
                                                                        </span>
                                                                        @php
                                                                        }
                                                                        elseif($recruiter_name->is_approve=2){
                                                                        @endphp
                                                                        <span>
                                                                            <i class="la la-times-circle"  data-toggle="tooltip" title="Rejected"></i>
                                                                        </span>
                                                                        @php
                                                                        }
                                                                        @endphp

                                                                        @endforeach

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Start Date</th>
                                                                    <td>{{$view->created_at}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Exp. Joining Date</th>
                                                                    <td>{{$view->joining_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Resume Type</th>
                                                                    <td>{{$view->resume_type}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Project Type</th>
                                                                    <td>{{$view->project_type}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Hide Resume Contacts</th>
                                                                    <td>{{$view->resume_contact}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Modified On</th>
                                                                    <td>{{$view->joining_date}}</td>
                                                                </tr>
                                                                <!--<tr>-->
                                                                <!--    <th>Status</th>-->
                                                                <!--    @if ($view->status == 1)-->
                                                                <!--    <td><span class="badge badge-default badge-success">Assigned</span></td>-->

                                                                <!--    @else-->

                                                                <!--    <td><span class="badge badge-default badge-danger">Inactive</span></td>-->

                                                                <!--    @endif-->
                                                                <!--</tr>-->
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade pd_0"><br>
                                    <div class="collapse show">
                                        <div class="pd_0">
                                            <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                                                <div class="">
                                                    <table class="table table-bordered wd_16">
                                                        <tr>
                                                            <th>Job Description</th>
                                                            <td>{!!html_entity_decode($view->job_description_ckediter)!!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Attachment</th>
                                                            <td>{{$view->file_attachment}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $level_id=App\Models\User::where('id',$view->created_by)->get(['level_1','level_2']);
                @endphp




                <div class="mt_btn">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#position_approve">
                        Approval
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#position_reject">Reject</button>

                    <a href="{{url('/position_approve')}}"> <button type="button" class="btn btn-light">Cancel</button></a>
                </div>




                <!-- <div class="mt_btn">
                    <a href="{{url('/position_approve')}}"> <button type="button" class="btn btn-light">Cancel</button></a>
                </div> -->



            </div>
        </div>
        <!-- Form wizard with icon tabs section end -->
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="position_approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Approve Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{url('/position_approve_remark')}}" method="POST">
                        @csrf
                        <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                            <div class="table-responsive">
                                <table class="table table-bordered wd_37">
                                    <tr>

                                        <th>Remarks</th>
                                        <!-- // <td><textarea class="form-control"></textarea></td> -->
                                        <td class="pd_0"><textarea name="remarks" class="form-control"></textarea></td>

                                        <input type="hidden" name="position_id" value="{{$view->position_id}}">
                                        <input type="hidden" name="id" value="{{$id}}">
                                    </tr>
                                </table>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- reject position model -->
    <div class="modal fade" id="position_reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Reject Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{url('/position_reject_remark')}}" method="POST">
                        @csrf
                        <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                            <div class="table-responsive">
                                <table class="table table-bordered wd_37">
                                    <tr>
                                        <th>Remarks</th>
                                        <!-- // <td><textarea class="form-control"></textarea></td> -->
                                        <td><textarea name="remarks" class="form-control pd_0"></textarea></td>

                                        <input type="hidden" name="position_id" value="{{$view->position_id}}">
                                        <input type="hidden" name="id" value="{{$id}}">
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
</x-admin-layout>