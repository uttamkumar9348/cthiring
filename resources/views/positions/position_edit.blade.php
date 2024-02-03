<x-admin-layout>
    <style>
        .rctr_val {

            display: inline-block;
        }
    </style>
    <script src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <link rel="stylesheet" href="{{ asset('app-assets/position_css/style.css') }}" />

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Positions</li>
                        <li class="breadcrumb-item active">Edit Position</li>
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
                                    <a class="nav-link active" data-toggle="tab" href="#home"><img src="../assets/position/business.png" class="hi8">Basic Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1"><img src="../assets/position/job-offer.png" class="hi8">Job Description</a>
                                </li>
                            </ul>
                            <form class="form frm_select" action="{{url('updateposition',$view[0]->position_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active"><br>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <table class="table">
                                                        <tr>
                                                            <th>
                                                                <label for="">Client Name <span class="text-danger">*</span></label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" value="{{($view[0]->client_na)->client_name}}" readonly>
                                                                <input type="hidden" name="fullname" value="{{$view[0]->client_name}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">SPOC Name <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control select2 wd_58" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="client_contanct_name" id="client_contanct_name">

                                                                    @foreach ($client_contact as $loc )
                                                                    <option value="{{$loc->id}}" {{$view[0]->spoc_name == $loc->id ? 'selected':''}}>
                                                                        {{$loc->contact_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Job Title <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" data-toggle="tooltip" data-trigger="hover" data-placement="top" id="jobname" name="jobname" value="{{$view[0]->job_title}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Job Location <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" data-toggle="tooltip" data-trigger="hover" data-placement="top" id="joblocation" name="joblocation" value="{{$view[0]->job_location}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Job Code <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="jobcode" name="jobcode" value="{{$view[0]->job_code}}" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Experience <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="row wd_70">
                                                                    <div class="col-md-6 p_right">
                                                                        <div class="">
                                                                            <select class="form-control select2" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="min_experience" id="min_experience">
                                                                                <option>Min.</option>
                                                                                @php
                                                                                $i=1;
                                                                                for($i;$i<=50;$i++) { @endphp <option value="{{$i}}" {{$i == $view[0]->min_experience ? 'selected':''}}>{{$i}}
                                                                                    </option>
                                                                                    @php
                                                                                    }
                                                                                    @endphp
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 p_left">
                                                                        <div class="">
                                                                            <select class="form-control select2" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="max_experience" id="max_experience">
                                                                                <option>Max.</option>
                                                                                @php
                                                                                $i=1;
                                                                                for($i;$i<=50;$i++) { @endphp <option value="{{$i}}" {{$i == $view[0]->max_experience ? 'selected':''}}>{{$i}}
                                                                                    </option>
                                                                                    @php
                                                                                    }
                                                                                    @endphp
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Annual CTC <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="row wd_70">
                                                                    <div class="col-md-3 p_right">
                                                                        <div class="">
                                                                            @php
                                                                            $annual_ctc_min=explode(" ",($view[0]->annual_ctc_min))
                                                                            @endphp
                                                                            <input type="text" class="form-control" id="" name="min_salary" value="{{$annual_ctc_min[0]}}" placeholder="Min. CTC">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 pd_0">
                                                                        <div class="">
                                                                            <select class="form-control select2" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="salary_value">
                                                                                @php
                                                                                $salary_value=explode(" ",($view[0]->annual_ctc_min));
                                                                                @endphp
                                                                                <option>Select</option>
                                                                                <option value="Lacs" {{($salary_value[1]=="Lacs")? "selected" : "" }}>Lacs</option>
                                                                                <option value="k" {{($salary_value[1]=="k")? "selected" : "" }}>Thousand</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 pd_0">
                                                                        <div class="">
                                                                            @php
                                                                            $annual_ctc_max=explode(" ",($view[0]->annual_ctc_max))
                                                                            @endphp
                                                                            <input type="text" class="form-control" id="" name="max_salary" value="{{$annual_ctc_max[0]}}" placeholder="Max. CTC">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 p_left">
                                                                        <div class="">
                                                                            <select class="form-control select2" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="salary_value2">
                                                                                @php
                                                                                $max_value=explode(" ",($view[0]->annual_ctc_max));
                                                                                @endphp
                                                                                <option>Select</option>
                                                                                <option value="Lacs" {{($max_value[1]=="Lacs")? "selected" : "" }}>Lacs</option>
                                                                                <option value="k" {{($max_value[1]=="k")? "selected" : "" }}>Thousand</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Qualification <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control select2 wd_58" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" name="qualification" id="qualification">
                                                                    @foreach ($qualification1 as $qualifi2)
                                                                    <option value="{{$qualifi2->id}}" {{($qualifi2->id==$view[0]->qualification)? "selected" : "" }}>
                                                                        {{$qualifi2->qualification_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Functional Area <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control select2 wd_58" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="functionarea">
                                                                    @foreach ($function_area1 as $loc )
                                                                    <option value="{{$loc->id}}" {{$loc->id == $view[0]->functional_area ? 'selected':''}}>
                                                                        {{$loc->function}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Industry <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control select2 wd_58" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="industryname">
                                                                    @foreach ($industry1 as $loc )
                                                                    <option value="{{$loc->id}}" {{$loc->id == $view[0]->industry ? 'selected':''}}>
                                                                        {{$loc->industryfunction}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Age <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="row wd_70">
                                                                    <div class="col-md-6 p_right">
                                                                        <div class="">
                                                                            <select class="form-control select2" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="min_age" id="min_age">
                                                                                <option>Min.</option>
                                                                                @php
                                                                                $i=18;
                                                                                for($i;$i<=70;$i++) { @endphp <option value="{{$i}}" {{$i == $view[0]->age_min ? 'selected':''}}>{{$i}}
                                                                                    </option>
                                                                                    @php
                                                                                    }
                                                                                    @endphp
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 p_left">
                                                                        <div class="">
                                                                            <select class="form-control select2" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="max_age" id="max_age">
                                                                                <option>Max.</option>
                                                                                @php
                                                                                $i=18;
                                                                                for($i;$i<=70;$i++) { @endphp <option value="{{$i}}" {{$i == $view[0]->age_max ? 'selected':''}}>{{$i}}
                                                                                    </option>
                                                                                    @php
                                                                                    }
                                                                                    @endphp
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Gender <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="controls">
                                                                    <div class="skin skin-square d_iln_blk">
                                                                        <input type="radio" value="Male" name="basic_radio" id="radio1" {{ ($view[0]->gender=="Male")? "checked" : "" }}>
                                                                        <label for="radio1">Male</label>
                                                                    </div>
                                                                    <div class="skin skin-square d_iln_blk">
                                                                        <input type="radio" value="Female" name="basic_radio" id="radio2" {{ ($view[0]->gender=="Female")? "checked" : "" }}>
                                                                        <label for="radio2">Female</label>
                                                                    </div>
                                                                    <div class="skin skin-square d_iln_blk">
                                                                        <input type="radio" value="Other" name="basic_radio" id="radio3" {{ ($view[0]->gender=="Other")? "checked" : "" }}>
                                                                        <label for="radio2">Other</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-6">
                                                    <table class="table wd_16">
                                                        <tr>
                                                            <th>
                                                                <label for="">Technical Skills <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="skills wd_58">
                                                                    <input id="tags" type="text" class="form-control techskill" name="technical[]" placeholder="Enter skills separated by comma" value="@foreach ( $edit_result as  $result ){{$result[0]}}, @endforeach">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Behavioural Skills <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="skills wd_58">
                                                                    <input id="tags" type="text" class="form-control techskill" name="behavioural[]" placeholder="Enter skills separated by comma" value="@foreach ( $edit_bevrl as  $result ){{$result[0]}}, @endforeach">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Total Openings <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control select2 wd_58" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="opening" id="opening">
                                                                    <option>Select</option>
                                                                    @php
                                                                    $i=1;
                                                                    for($i;$i<=50;$i++) { @endphp <option value="{{$i}}" {{$i == $view[0]->total_opening ? 'selected':''}}>{{$i}}
                                                                        </option>
                                                                        @php
                                                                        }
                                                                        @endphp
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Recruiters <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" name="recruitername" id="recruiter">

                                                                    <option>Please Select</option>
                                                                    @foreach($requiter as $requiter1)
                                                                    <option value="{{$requiter1->id}}">
                                                                        {{$requiter1->fname}} {{$requiter1->lname}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>

                                                                <div class="rctr_dsn_div pd_0" id="recruiter_value" style="display: inline-block;">

                                                                    @foreach($view as $req)
                                                                    <div class="rctr_val alert alert-dismissible mr_3">
                                                                        <span id="">{{optional($req->client_requiter)->fname}} {{optional($req->client_requiter)->lname}} - {{$req->position_no_recruiter}}<i class="fa fa-trash delete_rctr" value="" data="" data-dismiss="alert" aria-hidden="true"></i></span>
                                                                        <input type="hidden" name="recruter[]" value="{{$req->recruiters.','.$req->position_no_recruiter}}">
                                                                    </div>
                                                                    @endforeach
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">CRM <span class="text-danger">*</span> </label>
                                                            </th>

                                                            <td>
                                                                <input type="text" class="form-control wd_58" value="{{Auth::user()->name}}" readonly>
                                                                <input type="hidden" name="crmid" value="{{Auth::id()}}">
                                                                
                                                                <!--<input type="text" class="form-control wd_58" disabled>-->
                                                                <!-- <div class="form-control wd_58">
                                                                    @php

                                                                    $test=json_decode($view[0]->crm);

                                                                    @endphp

                                                                    @foreach($test as $test1)
                                                                    @php

                                                                    $crm_name=App\Models\User::where('id',$test1)->get();

                                                                    @endphp

                                                                    <span class="badge badge-primary">{{$crm_name[0]->fname}} {{$crm_name[0]->lname}}</span>

                                                                    @endforeach
                                                                </div> -->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Billable value <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="count_bill_value" name="bill_value" value="{{$view[0]->billable_value}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Total Billable Value <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="count_total_billvalue" name="total_billvalue" value="{{$view[0]->total_billable}}" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Expected Joining Date <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="joining_date" name="joiningdate" value="{{$view[0]->joining_date}}">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <label for="">Hide Resume Contacts <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="skin skin-square d_iln_blk">
                                                                    <input type="radio" value="Yes" name="resume1" id="resum1" {{ ($view[0]->resume_contact=="Yes")? "checked" : "" }}>
                                                                    <label for="radio1">Yes</label>
                                                                </div>
                                                                <div class="skin skin-square d_iln_blk">
                                                                    <input type="radio" value="No" name="resume1" id="resum2" {{ ($view[0]->resume_contact=="No")? "checked" : "" }}>
                                                                    <label for="radio2">No</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Resume Password <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="skin skin-square d_iln_blk">
                                                                    <input type="radio" value="Yes" name="password" id="pass1" {{ ($view[0]->resume_password=="Yes")? "checked" : "" }}>
                                                                    <label>Yes</label>
                                                                </div>
                                                                <div class="skin skin-square d_iln_blk">
                                                                    <input type="radio" value="No" name="password" id="pass2" {{ ($view[0]->resume_password=="No")? "checked" : "" }}>
                                                                    <label>No</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Resume Type <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="controls">
                                                                    <div class="skin skin-square d_iln_blk">
                                                                        <input type="radio" value="Snapshot" name="resumetype1" id="resumtype1" {{ ($view[0]->resume_type=="Snapshot")? "checked" : "" }}>
                                                                        <label>Snapshot</label>
                                                                    </div>
                                                                    <div class="skin skin-square d_iln_blk">
                                                                        <input type="radio" value="Fully Formatted Resume" name="resumetype1" id="resumtype2" {{ ($view[0]->resume_type=="Fully Formatted Resume")? "checked" : "" }}>
                                                                        <label>Fully Formatted Resume</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Project Type <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="controls">
                                                                    <div class="skin skin-square d_iln_blk">
                                                                        <input type="radio" value="RPO" name="ptype1" id="project_type1" {{ ($view[0]->project_type=="RPO")? "checked" : "" }}>
                                                                        <label>RPO</label>
                                                                    </div>
                                                                    <div class="skin skin-square d_iln_blk">
                                                                        <input type="radio" value="NON_RPO" name="ptype1" id="project_type2" {{ ($view[0]->project_type=="NON_RPO")? "checked" : "" }}>
                                                                        <label>NON_RPO</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Publish In Website <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <div class="">
                                                                    <label class="container_rdo d_iln_blk">Yes
                                                                        <input type="radio" class="btn_r" value="Yes" name="website1" id="publish_website1" onclick="show1();" {{ ($view[0]->publish_website=="Yes")? "checked" : "" }}>
                                                                        <span class="checkmark"></span>
                                                                    </label>

                                                                    <label class="container_rdo d_iln_blk">No
                                                                        <input type="radio" class="btn_r" value="No" name="website1" id="publish_website2" onclick="show2();" {{ ($view[0]->publish_website=="No")? "checked" : "" }}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table wd_7">
                                                        <tr>
                                                            <th>
                                                                <label for="">Created By <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                @if ($view[0]->crm_change_status == 0)
                                                                <div class="row wd_58">
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control" id="joining_date" name="joining_date" value="{{$view[0]->position_create->fname}} {{$view[0]->position_create->lname}}" readonly>
                                                                    </div>
                                                                    <div class="col-md-3 pd_0">
                                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                                                            Change
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div>
                                                                    @php
                                                                    $crm = App\Models\CrmChange::where('old_crm_id','=',$view[0]->created_by)->get();
                                                                    $user = App\Models\User::where('id',$crm[0]->new_crm_id)->get();
                                                                    @endphp
                                                                    @if ($crm[0]->status == 0)
                                                                    <p>{{$view[0]->position_create->fname}} {{$view[0]->position_create->lname}}</p>
                                                                    @else
                                                                    <p>{{$user[0]->fname}} {{$user[0]->lname}}</p>
                                                                    @endif
                                                                    <p style="margin-bottom:0px;">Old Created By : {{$view[0]->position_create->fname}}</p>
                                                                    <p>({{$crm[0]->from_work_date}} - {{$crm[0]->to_work_date}})</p>

                                                                    <p style="margin-bottom:0px;">New Created By : {{$user[0]->fname}}</p>
                                                                    <p>({{$crm[0]->new_crm_assign_date}})</p>
                                                                    <p style="margin-bottom:0px;">Remarks : {{$crm[0]->remarks}}</p>
                                                                </div>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="table wd_7">
                                                        <tr>
                                                            <th>
                                                                <label for="">Remarks <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <!-- <input type="text" class="form-control wd_58" name="remarks"> -->
                                                                <textarea class="form-control wd_58" name="remarks"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div id="div1" class="hide">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="tooltip">Tips <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                    <span class="tooltiptext">
                                                                        <p>Key Responsibilities</p>
                                                                        <ul>
                                                                            <li>• Responsible for Revenue &amp; Profitability in line with Annual Business Plan.</li>
                                                                            <li>• Directing a team of merchandisers in the development of fact-based models and decision frameworks for complex merchandising engagements.</li>
                                                                            <li>• Develop and execute practical analytic solutions to retail opportunities including clustering and market mapping.</li>
                                                                            <li>• Planning and managing Vendor Assessment and Requirement activities.</li>
                                                                        </ul>
                                                                    </span>
                                                                </div>

                                                                <label>Key Responsibilities <span class="text-danger">*</span></label>
                                                                <textarea class="tinymce" name="responsibility">{{$view[0]->publish_web_responsibility}}</textarea>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="tooltip1">Tips <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                    <span class="tooltiptext1">
                                                                        <p>Req. Industry Exposure</p>
                                                                        <ul>
                                                                            <li>• Leading the SOH/Revenues/Alliances function with a national retailer. Comfortable with working under target pressure and tight timelines.</li>
                                                                            <li>• Sound People Management Skills.</li>
                                                                            <li>• Candidate should have demonstrated great negotiation skills in the previous jobs.</li>
                                                                            <li>• Candidate should be able to maintain good PR with vendors and internal stakeholders.</li>
                                                                            <li>• Candidate should have exhibited adequate capability to successfully negotiate with National and International vendors and also build Joint Business Plan keeping in view the strategic interests of the Organisation.</li>
                                                                            <li>• Preferred Industry will be Large Hypermarket or Key Accounts profiles from FMCG Brands &amp; from consulting firms with prior FMCG / Retail experience.</li>
                                                                        </ul>
                                                                    </span>
                                                                </div>
                                                                <label>Req. Industry Exposure</label>
                                                                <textarea class="tinymce" name="industry"></textarea>
                                                                <br>
                                                                <div class="tooltip2">Tips <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                    <span class="tooltiptext2">
                                                                        <p>Req. Competencies</p>
                                                                        <ul>
                                                                            <li>• Clear Understanding on P&amp;L &amp; Category Budgets.</li>
                                                                            <li>• New Product Launch &amp; Promotions.</li>
                                                                            <li>• Pricing Strategy.</li>
                                                                            <li>• Business &amp; Commercial Acumen.</li>
                                                                            </li>

                                                                            <p>Behavioral:</p>
                                                                            <li>• Developmental Leadership.</li>
                                                                            <li>• Empathy.</li>
                                                                            <li>• Self-Management.</li>
                                                                            <li>• Preparation.</li>
                                                                            <li>• Adaptability.</li>
                                                                        </ul>
                                                                    </span>
                                                                </div>
                                                                <label>Req. Competencies</label>
                                                                <textarea class="tinymce" name="competency"></textarea>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->



                                    <div id="menu1" class="tab-pane fade"><br>
                                        <div class="mb-2">
                                            <div class="row mb-1">
                                                <div class="col-12">
                                                    <table class="table wd_7">
                                                        <tr>
                                                            <th>
                                                                <label for="">Job Description <span class="text-danger">*</span> </label>
                                                            </th>
                                                            <td>
                                                                <textarea name="editor1" id="editor1" rows="10" cols="80">{{$view[0]->job_description_ckediter}}</textarea>
                                                                <script>
                                                                    CKEDITOR.replace('editor1');
                                                                </script>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Attachment </label>
                                                            </th>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <a href="/document/position/jd/{{$view[0]->file_attachment}}" download>
                                                                            <button type="button" class="btn btn-success">Download</button>
                                                                        </a>
                                                                        <p style="margin-left: 10px;margin-top: 12px;">{{$view[0]->file_attachment}}</p>
                                                                        <input type="hidden" name="file_name" value="{{$view[0]->file_attachment}}">
                                                                        <input type="hidden" name="created" value="{{$view[0]->created_at}}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                    <button type="button" name="cancel" class="btn btn-danger">Cancel</button>
                                </div>
                        </div>
                        </form>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">CRM Change
                                            Approval</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form frm_select" action="{{url('/crm_change',$view[0]->position_id)}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" class="form-control" value="{{date('j F-Y')}}" id="change_date">
                                        <input type="hidden" class="form-control" value="{{$view[0]->client_na->id}}" name="client_id">
                                        <input type="hidden" class="form-control" value="{{$view[0]->position_id}}" name="position_id">
                                        <input type="hidden" class="form-control" value="{{Auth::id()}}" name="old_crm_id">

                                        <div class="modal-body">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                @php
                                                $test2=json_decode($view[0]->crm);
                                                @endphp

                                                @foreach($test2 as $test3)
                                                @php
                                                $crm_name1=App\Models\User::where('id',$test3)->get();
                                                @endphp
                                                <!-- <input type="text" nam="old_crm_id" value="{{$test3}}"> -->
                                                <label for="">{{$crm_name1[0]->fname}} {{$crm_name1[0]->lname}}: (From - To) (Existing CRM)</label>

                                                @endforeach

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <input type="text" class="form-control" value="{{date('j F-Y', strtotime($view[0]->created_at))}}" name="crm_working_date_start" readonly>
                                                    </div>

                                                    @if(date("Y-m-d")==date('Y-m-d', strtotime($view[0]->created_at)))
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <input type="text" class="form-control" value="{{date('j F-Y')}}" name="crm_working_date_end" readonly>

                                                    </div>
                                                    @else
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <input type="text" class="form-control" value="{{date('j F-Y', strtotime( '-1 days' ) )}}" name="crm_working_date_end" readonly>
                                                    </div>
                                                    @endif


                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label for="">New CRM:</label><br>
                                                <select class="form-control" id="crm_change" name="crm_change">
                                                    <option>Select</option>
                                                    @foreach($crm_position as $crm_position1)
                                                    <option value="{{$crm_position1->id}}">
                                                        {{$crm_position1->fname}} {{$crm_position1->lname}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12" id="crm_change_date"></div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label for="">Remarks:</label>
                                                <input type="text" class="form-control" placeholder="Remarks" name="crm_change_remark">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>No. of positions</h4>
                        </div>
                        <div class="col-md-6">
                            <select id="no_position" class="form-control">
                                <option value="0">Min.</option>
                                @php
                                $i=1;
                                for($i;$i<=50;$i++) { @endphp <option value="{{$i}}">{{$i}}</option>
                                    @php
                                    }
                                    @endphp
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form wizard with icon tabs section end -->

    <script type="text/javascript">
        $('#files').on('change', function() {
            var result = $("#files").text();

            fileChosen(this, document.getElementById('editor1'));
            CKEDITOR.instances['editor1'].setData(result);
        });
    </script>

    <!-- totalbillable count script code -->

    <script>
        $(function() {
            // jQuery methods go here...
            $('#opening').on("change", function() {
                calculatePrice();
            });
            $('#count_bill_value').keyup(function() {
                calculatePrice();
            });

            function calculatePrice() {
                var quantity = $('#opening').val();
                var rate = $('#count_bill_value').val();
                if (quantity != "" && rate != "") {
                    var price = quantity * rate;
                }
                $('#count_total_billvalue').val(price.toFixed(2));
            }
        });
    </script>

    <!-- min age max Experience dropdown script -->
    <script>
        var minExpe = $('#min_experience'),
            maxExpe = $('#max_experience');

        minExpe.on('change', function() {

            maxExpe.children("option").each(function() {
                var opt = $(this),
                    optVal = parseInt(opt.attr('value'));

                if (optVal <= minExpe.val()) {
                    opt.attr('disabled', 'disabled');
                } else {
                    opt.removeAttr('disabled');
                }

            });

        });

        maxExpe.on('change', function() {

            minExpe.children("option").each(function() {
                var opt = $(this),
                    optVal = parseInt(opt.attr('value'));

                if (optVal != 0 && optVal >= maxExpe.val()) {
                    opt.attr('disabled', 'disabled');
                } else {
                    opt.removeAttr('disabled');
                }

            });

        });
    </script>

    <!-- min age max age dropdown script -->
    <script>
        var minPrice = $('#min_age'),
            maxPrice = $('#max_age');

        minPrice.on('change', function() {

            maxPrice.children("option").each(function() {
                var opt = $(this),
                    optVal = parseInt(opt.attr('value'));

                if (optVal <= minPrice.val()) {
                    opt.attr('disabled', 'disabled');
                } else {
                    opt.removeAttr('disabled');
                }

            });

        });

        maxPrice.on('change', function() {

            minPrice.children("option").each(function() {
                var opt = $(this),
                    optVal = parseInt(opt.attr('value'));

                if (optVal != 0 && optVal >= maxPrice.val()) {
                    opt.attr('disabled', 'disabled');
                } else {
                    opt.removeAttr('disabled');
                }

            });

        });
    </script>

    <!-- for recruiter field dropdown -->


    <script>
        $(document).ready(function() {

            $('.repeater').repeater({

            });
        });
    </script>
    <!-- for technical skil and behaviour skil -->
    <script>
        $('.techskill').tagsinput({
            allowDuplicates: true
        });
    </script>
    <!-- end-->

    <!-- publish on website -->
    <script>
        function show1() {
            document.getElementById('div1').style.display = 'block';
        }

        function show2() {
            document.getElementById('div1').style.display = 'none';
        }
    </script>
    <!-- end -->


    <!-- for recruiter and no of position assign start -->
    <script type="text/javascript">
        $(document).ready(function() {
            var x;
            var y;
            $('#recruiter').change(function() {
                $("#exampleModal").modal("show");
                x = document.getElementById('recruiter').value;
                // alert(x);
                y = $('#recruiter option:selected')
                    .toArray().map(item => item.text);
            });

            $('#no_position').change(function() {
                var z = document.getElementById('no_position').value;
                $("#exampleModal").modal("hide");
                $("#recruiter_value").append(
                    '<div class="rctr_val alert alert-dismissible mr_3">' +
                    '<span id="' + y + '">' + y + - +z + '<i class="fa fa-trash delete_rctr" value="' + y + '" data="' + x + '" data-dismiss="alert" aria-hidden="true"></i></span>' +
                    '<input type="hidden"  id="' + y + '"  name="recruter[]" value="' + x + ',' + z + '">' +
                    '</div>'
                );

                $(this).val(0);
            });



        });
    </script>

    <!-- for recruiter and no of position assign end-->


    <script type="text/javascript">
        $(document).ready(function() {
            $('#crm_change').change(function() {
                var x = this.value;
                var y = $('#crm_change option:selected')
                    .toArray().map(item => item.text);

                var currentDate = document.getElementById('change_date').value;
                //alert(currentDate);
                $("#crm_change_date").html(
                    '<label for="">' + y + ':(From)</label><input type="text" class="form-control" name="new_crm_assign_date" value="' + currentDate + '" readonly>'
                );
            });
        });
    </script>
</x-admin-layout>