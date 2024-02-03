<x-admin-layout>
    <script src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
    <link rel="stylesheet" href="{{ asset('app-assets/position_css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/validation/form-validation.css') }}">-->


    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Positions</li>
                        <li class="breadcrumb-item active">Add Position</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <!-- FORM START -->
            <form class="form" action="position_inserts" method="post" enctype="multipart/form-data" novalidate>
                @csrf

                <div id="mytabs">
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
                        <div id="home" class="tab-pane active"><br>
                            <div class="row">
                                <div class="col-6">
                                    <table class="table wd_21">
                                        <tr>
                                            <th>
                                                <label>Client Name*</label>
                                            </th>
                                            <td>
                                                <select class="select form-control wd_58" name="fullname" id="fullname" required>
                                                    <option value="0">select</option>
                                                    @foreach ($client1 as $client2)
                                                    <option value="{{$client2->id}}">
                                                        {{$client2->client_name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                
                                                <span class="error" id="er_fullname"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>SPOC Name*</label>
                                            </th>
                                            <td>
                                                <select class="select form-control wd_58" name="client_contanct_name" id="client_contanct_name">

                                                </select>
                                               
                                                <span class="error" id="er_client_contanct_name"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Job Title*</label>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control wd_58" id="jobname" name="jobname" placeholder="Job Title" required data-validation-required-message="This field is required">
                                                
                                                <span class="error" id="er_jobname"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Job Location*</label>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control wd_58" id="joblocation" name="joblocation" placeholder="Job Location">
                                                
                                                <span class="error" id="er_joblocation"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Job Code*</label>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control wd_58" id="jobcode" name="jobcode" value="CT/{{$jobcode}}/{{$year}}" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Experience*</label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4 pd_r0">
                                                        <div class="">

                                                            <select class="form-control" name="min_experience" id="min_experience">
                                                                <option value="0">Min.</option>

                                                                @php
                                                                $i=1;
                                                                for($i;$i<=50;$i++) { @endphp <option value="{{$i}}">{{$i}} years
                                                                    </option>
                                                                    @php
                                                                    }
                                                                    @endphp

                                                            </select>
                                                            
                                                            <span class="error" id="er_min_experience"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pd_l0">
                                                        <div class="">
                                                            <select class="form-control" name="max_experience" id="max_experience">
                                                                <option value="0">Max.</option>

                                                                @php
                                                                $i=1;
                                                                for($i;$i<=50;$i++) { @endphp <option value="{{$i}}">{{$i}} years
                                                                    </option>
                                                                    @php
                                                                    }
                                                                    @endphp

                                                            </select>
                                                            
                                                            <span class="error" id="er_max_experience"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Annual CTC*</label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-2 pd_r0">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="min_salary" name="min_salary" placeholder="Min. CTC" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                                        </div>
                                                        <!-- <span class="error" id="er_min_salary"></span> -->
                                                    </div>
                                                    <div class="col-md-2 pd_r0 pd_l0">
                                                        <div class="">
                                                            <select class="form-control" name="salary_value">
                                                                <option selected>Select</option>
                                                                <option value="Lacs">Lacs</option>
                                                                <option value="K">Thousand</option>
                                                            </select>

                                                            <!-- <span class="error" id="er_min_salary"></span> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 pd_r0 pd_l0">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="max_salary" name="max_salary" placeholder="max. CTC" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 pd_l0">
                                                        <div class="">
                                                            <select class="form-control" name="salary_value2">
                                                                <option selected>Select</option>
                                                                <option value="Lacs">Lacs</option>
                                                                <option value="k">Thousand</option>
                                                            </select>

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="error" id="er_min_salary"></span>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="error" id="er_max_salary"></span>
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Qualification*</label>
                                            </th>
                                            <td>
                                                <select class="form-control wd_58" name="qualification" id="qualification">
                                                    <option value="0">Select</option>
                                                    @foreach ($qualification1 as $qualifi2)
                                                    <option value="{{$qualifi2->id}}">
                                                        {{$qualifi2->qualification_name}}
                                                    </option>
                                                    @endforeach


                                                </select>
                                                <span class="error" id="er_qualification"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Functional Area*</label>
                                            </th>
                                            <td>
                                                <select class="form-control wd_58" name="functionarea" id="areaid">
                                                    <option value="0">select</option>
                                                    @foreach ($function_area1 as $function_area2)

                                                    <option value="{{$function_area2->id}}">
                                                        {{$function_area2->function}}

                                                    </option>

                                                    @endforeach
                                                </select>

                                                <span class="error" id="er_areaid"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Industry* </label>
                                            </th>
                                            <td>
                                                <select class="form-control wd_58" name="industryname" id="industryname">
                                                    <option value="0">Select</option>
                                                    @foreach ($industry1 as $industry2)
                                                    <option value="{{$industry2->id}}">
                                                        {{$industry2->industryfunction}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                <span class="error" id="er_industryname"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Age*</label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4 pd_r0">
                                                        <div class="">
                                                            <select class="form-control" name="min_age" id="min_age">
                                                                <option value="0">Min.</option>
                                                                @php
                                                                $i=18;
                                                                for($i;$i<=70;$i++) { @endphp <option value="{{$i}}">{{$i}} years
                                                                    </option>
                                                                    @php
                                                                    }
                                                                    @endphp
                                                            </select>
                                                            
                                                            <span class="error" id="er_min_age"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pd_l0">
                                                        <div class="">
                                                            <select class="form-control" name="max_age" id="max_age">
                                                                <option value="0">Max.</option>
                                                                @php
                                                                $i=18;
                                                                for($i;$i<=70;$i++) { @endphp <option value="{{$i}}">{{$i}} years
                                                                    </option>
                                                                    @php
                                                                    }
                                                                    @endphp
                                                            </select>
                                                            
                                                            <span class="error" id="er_max_age"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Gender*</label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="hidden" value="" name="basic_radio" id="gender">
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Male" name="basic_radio" id="radio1">
                                                            <label for="radio1">Male</label>

                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Female" name="basic_radio" id="radio2">
                                                            <label for="radio2">Female</label>

                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Other" name="basic_radio" id="radio3">
                                                            <label for="radio3">Other</label>


                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <span class="error" id="er_radio1"></span>
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
                                                <label for="tags">Technical Skills* </label>
                                            </th>
                                            <td>
                                                <div class="skills wd_58">
                                                    <input id="tags" type="text" class="form-control techskill wd_58" name="technical[]" placeholder="Enter skills separated by comma">
                                                </div>

                                                <span class="error" id="er_tags"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Behavioural Skills*</label>
                                            </th>
                                            <td>
                                                <div class="skills wd_58">
                                                    <input id="tags1" type="text" class="form-control techskill wd_58" name="behavioural[]" placeholder="Enter skills separated by comma">
                                                </div>

                                                <span class="error" id="er_tags1"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Total Openings*</label>
                                            </th>
                                            <td>
                                                <select class="form-control wd_58" name="opening" id="total_opening">
                                                    <option value="0">select</option>
                                                    @php
                                                    $i=1;
                                                    for($i;$i<=50;$i++) { @endphp <option value="{{$i}}">{{$i}}</option>
                                                        @php
                                                        }
                                                        @endphp
                                                </select>

                                                <span class="error" id="er_total_opening"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Recruiters*</label>
                                            </th>
                                            <td>
                                                <select class="form-control wd_58" name="recruitername" id="recruiter">

                                                    <option value="0">Please Select</option>
                                                    @foreach($requiter as $requiter1)
                                                    <option value="{{$requiter1->id}}">
                                                        {{$requiter1->fname}} {{$requiter1->lname}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                <span class="error" id="er_recruiter"></span>
                                                <div class="rctr_dsn_div pd_0" id="recruiter_value"></div>

                                            </td>
                                        </tr>

                                        <tr>
                                            <th>
                                                <label>CRM*</label>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control wd_58" value="{{Auth::user()->name}}" readonly>
                                                <input type="hidden" name="crmid" value="{{Auth::id()}}">
                                                <!--<select class="form-control wd_58" name="crmid" id="crmid">-->

                                                <!--    <option value="0">Please Select-->
                                                <!--    </option>-->
                                                <!--    @foreach($crm_position as $requiter1)-->
                                                <!--    <option value="{{$requiter1->id}}">-->
                                                <!--        {{$requiter1->fname}}{{$requiter1->lname}}-->
                                                <!--    </option>-->

                                                <!--    @endforeach-->
                                                <!--</select>-->

                                                <!--<span class="error" id="er_crmid"></span>-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Billable value*</label>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control wd_58" id="count_bill_value" name="bill_value"  placeholder="Billable Value" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >

                                                <span class="error" id="er_count_bill_value"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Total Billable Value*</label>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control wd_58" id="count_total_billvalue" name="total_billvalue" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Expected Joining Date*</label>
                                            </th>
                                            <td>
                                                <!--<input type="text" class="form-control input-lg wd_58" id="animate" placeholder="DD/MM/YY" name="joiningdate">-->
                                                <input type="date" class="form-control wd_58" name="joiningdate" id="animate">

                                                <span class="error" id="er_animate"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Hide Resume Contacts* </label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Yes" name="resume1" id="resum1">
                                                            <label for="radio4">Yes</label>
                                                        </div>

                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="No" name="resume1" id="resum2">
                                                            <label for="radio5">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <span class="error" id="er_resum1"></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Resume Password* </label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Yes" name="resume_password">
                                                            <label>Yes</label>
                                                        </div>

                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="No" name="resume_password">
                                                            <label>No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="error" id="er_resume_password"></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Resume Type*</label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Snapshot" name="resumetype1" id="resumtype1">
                                                            <label for="radio6">Snapshot</label>
                                                        </div>

                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Fully Formatted Resume" name="resumetype1" id="resumtype2">
                                                            <label for="radio7">Fully Formatted Resume</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <span class="error" id="er_resumetype1"></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>
                                                <label>Project Type*</label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="RPO" name="ptype1" id="project_type1">
                                                            <label>RPO</label>

                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="NON_RPO" name="ptype1" id="project_type2">
                                                            <label>NON_RPO</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="error" id="er_project_type1"></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Publish In Website*</label>
                                            </th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="container_rdo d_iln_blk">Yes
                                                            <input type="radio" class="btn_r" value="Yes" name="website1" id="publish_website1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="container_rdo d_iln_blk">No
                                                            <input type="radio" class="btn_r" value="No" name="website1" id="publish_website2">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="error" id="er_publish_website1"></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                            </div>
                            
                                <button type="button" class="btn btn-primary f_right" onclick="position_next();">Next</button>
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
                                                <textarea class="tinymce" name="responsibility"></textarea>
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

                        <!-- TAB FORM START -->

                        <div id="menu1" class="tab-pane fade"><br>
                            <table class="table wd_7">
                                <tr>
                                    <th>
                                        <label>Job Description <span class="text-danger">*</span></label>
                                    </th>
                                    <td>
                                        <textarea class="tinymce" name="editor1"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Attachment</label>
                                    </th>
                                    <td>
                                        <input type="file" class="form-control" name="filetype">
                                    </td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-1">
                                    <a data-toggle="tab" href="#home">
                                        <button type="button" class="btn btn-warning f_left" onclick="show2();">Previous</button>
                                    </a>
                                </div>
                                <div class="col-11">
                                    <div class="">
                                        <button type="submit" name="submit" class="btn btn-primary f_right">Save</button>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- TAB FORM END -->
                    </div>
                </div>
            </form>
            <!-- FORM END -->
        </div>
        <!-- Form wizard with icon tabs section end -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="transform: translate(0, 100px);">
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
        <!-- //fetch client contact for responding client// -->
        <script>
            $(document).ready(function() {
                $('#fullname').on('change', function() {
                    var client_id = this.value;
                    $("#client_contanct_name").html('');
                    $.ajax({
                        url: "{{url('fetchclientconct')}}",
                        type: "POST",
                        data: {
                            spoc_id: client_id,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',

                        success: function(result) {

                            console.log(result[1]);
                            $('#client_contanct_name').html(
                                '<option value="">Select SPOC</option>');
                            $.each(result[0].spoc_name, function(key, value) {
                                $("#client_contanct_name").append('<option value="' + value
                                    .id +
                                    '">' +
                                    value.contact_name + '</option>');
                            });
                            $.each(crm, function(key, value) {
                                $('#crm').html(
                                    '<td class="badge badge-primary">' + result[1] + '</td>'
                                );
                            });
                        },
                    });
                });
            });
        </script>
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
                $('#total_opening').on("change", function() {
                    calculatePrice();
                });
                $('#count_bill_value').keyup(function() {
                    calculatePrice();
                });

                function calculatePrice() {
                    var quantity = $('#total_opening').val();
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
            $(document).ready(function(){
                $('#publish_website1').on('click',function(){
                    $('#div1').show();
                })
                $('#publish_website2').on('click',function(){
                    $('#div1').hide();
                })
            })
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
                        '<span class="rctr_val alert alert-dismissible mr_3" id="' + y + '">' + y + - +z + '<i class="fa fa-trash delete_rctr" value="' + y + '" data="' + x + '" data-dismiss="alert" aria-hidden="true"></i></span>' +
                        '<input type="hidden" name="recruter[]" value="' + x + ',' + z + '">'
                    );

                    $(this).val(0);
                });

            });
        </script>
        <script src="{{ asset('app-assets/js/scripts/forms/validation/form-validation.js') }}" type="text/javascript"></script>
        <!-- for recruiter and no of position assign end-->
        <script>
		var todayDate = new Date();

		var month = todayDate.getMonth() + 1; // current month

		var year = todayDate.getUTCFullYear(); //current year

		var tdate = todayDate.getDate(); //current date 

		if (month < 10) {

			month = "0" + month //'0' + 4 = 04

		}

		if (tdate < 10) {

			tdate = "0" + tdate;

		}

		var minDate = year + "-" + month + "-" + tdate;

		document.getElementById("animate").setAttribute("min", minDate);

		console.log(minDate);
	</script>
	    <script>
            function position_next() {
                //  alert('hyy');
                var fullname = $('#fullname').val();
                var client_contanct_name = $('#client_contanct_name').val();
                var jobname = $('#jobname').val();
                var joblocation = $('#joblocation').val();
                var min_experience = $('#min_experience').val();
                var max_experiencee = $('#max_experience').val();
                var min_salary = $('#min_salary').val();
                var max_salary = $('#max_salary').val();
                var qualification = $('#qualification').val();
                var functionarea = $('#areaid').val();
                var industryname = $('#industryname').val();
                var min_age = $('#min_age').val();
                var max_age = $('#max_age').val();
                
                var technial = $('#tags').val();
                var behavioural = $('#tags1').val();
                var opening = $('#total_opening').val();
                var recruiter = $('#recruiter').val();
                var crmid = $('#crmid').val();
                var count_bill_value = $('#count_bill_value').val();
                var animate = $('#animate').val();
                
                var gender = $("input[name=basic_radio]:checked").val();
                var hide_resume = $("input[name=resume1]:checked").val();
                var resume_password = $("input[name=resume_password]:checked").val();
                var resumetype1 = $("input[name=resumetype1]:checked").val();
                var project_type1 =$("input[name=ptype1]:checked").val();
                var publish_website1 =  $("input[name=website1]:checked").val();

                var x = [];
                if (fullname == 0) {
                    $('#er_fullname').text('Please Enter  Name');
                    x.push(1);
                }
                if (client_contanct_name == 0) {
                    $('#er_client_contanct_name').text('Please Enter spoc  name');
                    x.push(1);
                }

                if (jobname == 0) {
                    $('#er_jobname').text('Please Enter job name');
                    x.push(1);
                }
                if (joblocation == 0) {
                    $('#er_joblocation').text('Please Enter job locatione');
                    x.push(1);
                }
                if (min_experience == 0) {
                    $('#er_min_experience').text('Please Enter Min Experience');
                    x.push(1);
                }

                if (max_experiencee == 0) {
                    $('#er_max_experience').text('Please Enter Max Experiencee');
                    x.push(1);
                }
                if (min_salary == 0) {
                    $('#er_min_salary').text('Please Enter Min Salary');
                    x.push(1);
                }
                if (max_salary == 0) {
                    $('#er_max_salary').text('Please Enter Max Salary');
                    x.push(1);
                }
                if (qualification == 0) {
                    $('#er_qualification').text('Please Enter qualification');
                    x.push(1);
                }
                if (functionarea == 0) {
                    $('#er_areaid').text('Please Enter functionarea');
                    x.push(1);
                }
                if (industryname == 0) {
                    $('#er_industryname').text('Please Enter industryname');
                    x.push(1);
                }
                if (min_age == 0) {
                    $('#er_min_age').text('Please Enter min_age');
                    x.push(1);
                }
                if (max_age == 0) {
                    $('#er_max_age').text('Please Enter max_age');
                    x.push(1);
                }
                if (gender == null) {
                    $('#er_radio1').text('Please select any one');
                    x.push(1);
                }
                if (technial == 0) {
                    $('#er_tags').text('Please Enter technial skill');
                    x.push(1);
                }
                if (behavioural == 0) {
                    $('#er_tags1').text('Please Enter Behavioural Skills');
                    x.push(1);
                }
                if (opening == 0) {
                    $('#er_total_opening').text('Please Enter Total opening');
                    x.push(1);
                }
                if (recruiter == 0) {
                    $('#er_recruiter').text('Please Enter recruiter');
                    x.push(1);
                }
                if (crmid == 0) {
                    $('#er_crmid').text('Please Enter crmid');
                    x.push(1);
                }
                if (count_bill_value == 0) {
                    $('#er_count_bill_value').text('Please Enter  Billable Value*');
                    x.push(1);
                }
                if (animate == 0) {
                    $('#er_animate').text('Please Enter Expected Joining Date');
                    x.push(1);
                }
                if (hide_resume == null) {
                    $('#er_resum1').text('Please select any one');
                    x.push(1);
                }
                if (resume_password == null) {
                    $('#er_resume_password').text('Please select any one');
                    x.push(1);
                }
                if (resumetype1 == null) {
                    $('#er_resumetype1').text('Please select any one');
                    x.push(1);
                }
                if (project_type1 == null) {
                    $('#er_project_type1').text('Please select any one');
                    x.push(1);
                }
                if (publish_website1 == null) {
                    $('#er_publish_website1').text('Please select any one');
                    x.push(1);
                }

                if (x.length == 0) {
                    next_tab();
                }
            }
            function next_tab() {
                $('#mytabs a[href="#menu1"]').tab('show');
                var add = document.getElementById("position_2nd_tab");
                add.classList.add("active");
                var remove = document.getElementById("position_1st_tab");
                remove.classList.remove("active");
            }

            function show2() {
                // document.getElementById('client_contact').style.display = 'none';
                var element = document.getElementById("position_1st_tab");
                element.classList.add("active");
                var element = document.getElementById("position_2nd_tab");
                element.classList.remove("active");
            }
        </script>

</x-admin-layout>