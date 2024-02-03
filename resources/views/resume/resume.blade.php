<x-admin-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style>
        .select2 {
            width: 100% !important;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 0px 1px;
            font-size: 25px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked~label.star:before {
            color: #FE7;
            /* text-shadow: 0 0 20px #952; */
        }

        input.star-1:checked~label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
    </style>
    <style>
        label {
            margin: 0;
        }

        .star-container {
            display: flex;
            flex-direction: row-reverse;
            align-items: flex-start;
            justify-content: flex-end;
        }

        .star-check {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            -o-appearance: none !important;
            -ms-appearance: none !important;
            appearance: none !important;
            width: 24px;
            height: 24px;
            background-image: url('../assets/star.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: right 0;
            cursor: pointer;
            outline: 0;
        }

        .star-check:checked,
        .star-check:checked~input {
            background-position: left 0;
        }
        #mceu_53{
            overflow: hidden;
            height: 300px;
        }
    </style>
    @include('sweetalert::alert')
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Resumes</li>
                        <li class="breadcrumb-item active">Add Resume</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <button class="btn btn-danger btn-glow px-2" id="reset">Reset</button>
                <!-- <button class="btn btn-danger btn-glow px-2" id="add">Add</button> -->
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="collapse show">
                <form class="form" action="{{url('insert_resume')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body" id="mytabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" id="personal" href="#home">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" id="education" href="#menu1">Education</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" id="experience" href="#menu2">Experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" id="consultant" href="#menu3">Consultant
                                    Assessment</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="tab-pane active pd_0"><br>
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table wd_21">
                                            <tr>
                                                <th>
                                                    <label for="">Position For*</label>
                                                </th>
                                                <td>
                                                    @if (session()->has('job_name'))
                                                    <input type="text" class="form-control wd_58" id="position" name="position" value="{{session('job_name')}}" readonly>
                                                    @endif 
                                                    <span class="error" id="er_position"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Candidate Name*</label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" id="candidate" name="candidatename" placeholder="Candidate Name" required>
                                                    <span class="error" id="er_candidate"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Email*</label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" id="email" name="email" value=" @if (session()->has('resume_mail_found')){{session('resume_mail_found')}} @endif">
                                                    <span class="error" id="er_email"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Mobile*</label>
                                                </th>
                                                <td>
                                                    @php
                                                    $var='';
                                                    $data='';
                                                    if (session()->has('resume_mobile_no_found')){
                                                    $var="readonly";
                                                    $data=session('resume_mobile_no_found');
                                                    }
                                                    @endphp
                                                    <input type="text" class="form-control wd_58" id="mobile" name="mobile"  maxlength="10" value="{{$data}}"  {{$var}} required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                    <span class="error" id="er_mobile"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">DOB*</label>
                                                </th>
                                                <td>
                                                    <input type="date" class="form-control wd_58" id="dob" name="dob" required>
                                                    <span class="error" id="er_dob"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Current Designation*</label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" id="designation" name="designation" placeholder="Current Designation" required>
                                                    <span class="error" id="er_designation"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Total Years of Exp*</label>
                                                </th>
                                                <td>
                                                    <div class="row wd_70">
                                                        <div class="col-md-6 p_right">
                                                            <select class="select2 form-control" id="year" name="year" required>
                                                                <option value="0">Year</option>
                                                                @for($i=0;$i<=50;$i++) 
                                                                <option value="{{$i}}">{{$i}} Years</option>
                                                                @endfor
                                                            </select>
                                                            <span class="error" id="er_year"></span>
                                                        </div>
                                                        <div class="col-md-6 p_left">
                                                            <select class="select2 form-control" id="month" name="month" required>
                                                                <option value="0">Month</option>
                                                                @for($i=0;$i<=11;$i++) 
                                                                <option value="{{$i}}">{{$i}} Months</option>
                                                                @endfor
                                                            </select>
                                                            <span class="error" id="er_month"></span>
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
                                                    <label for="">CTC*</label>
                                                </th>
                                                <td>
                                                    <div class="row wd_70">
                                                        <div class="col-md-3 p_right">
                                                            <!--<input type="text" class="form-control" id="present_ctc" name="min_salary" value="" placeholder="Present" required>-->
                                                            <select class="select2 form-control" id="present_ctc" name="min_salary" value="" required>
                                                                <option value="0">Select</option>
                                                                @for($i=0;$i<=15;$i++) 
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="col-md-3 pd_0">
                                                            <select class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" name="salary_value">
                                                                <option selected>Select</option>
                                                                <option value="Lacs">Lacs</option>
                                                                <option value="K">Thousand</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 pd_0">
                                                            <!--<input type="text" class="form-control" id="expected_ctc" name="max_salary" value="" placeholder="Expected" required>-->
                                                            <select class="select2 form-control" id="expected_ctc" name="max_salary" value="" required>
                                                                <option value="0">Select</option>
                                                                @for($i=0;$i<=15;$i++) 
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 p_left">
                                                            <select class="form-control select2" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="salary_value2">
                                                                <option selected>Select</option>
                                                                <option value="Lacs">Lacs</option>
                                                                <option value="k">Thousand</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="error" id="er_present_ctc"></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="error" id="er_expected_ctc"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Notice Period*</label>
                                                </th>
                                                <td>
                                                    <div class="row wd_58">
                                                        <div class="col-md-6">
                                                            <select class="select2 form-control" id="notice_period" name="notice" required>
                                                                <option value="0">Select</option>
                                                                <option>15 days</option>
                                                                <option>30 days</option>
                                                                <option>45 days</option>
                                                                <option>90 days</option>
                                                                <option>Immediate</option>
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="skin skin-square">
                                                                <input type="checkbox" value="1" id="single_checkbox" name="present_working">
                                                                <label for="single_checkbox">Presently Working?
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <span class="error" id="er_notice_period"></span>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Gender*</label>
                                                </th>
                                                <td>
                                                    <div class="col-md-12 pd_0">
                                                        <div class="controls">
                                                            <div class="skin skin-square d_iln_blk p_left">
                                                                <input type="radio" value="Male" name="gender1" id="male">
                                                                <label>Male</label>
                                                            </div>
                                                            <div class="skin skin-square d_iln_blk">
                                                                <input type="radio" value="Female" name="gender1" id="female">
                                                                <label>Female</label>
                                                            </div>
                                                            <div class="skin skin-square d_iln_blk">
                                                                <input type="radio" value="Others" name="gender1" id="others">
                                                                <label>Others</label>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    
                                                    <div class="col-md-12 pd_0" style="float:left;">
                                                        <span class="error" id="er_gender"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Marital Status</label>
                                                </th>
                                                <td>
                                                    <div class="controls">
                                                        <div class="skin skin-square d_iln_blk p_left">
                                                            <input type="radio" value="Single" name="website2" id="Single">
                                                            <label>Single</label>
                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Married" name="website2" id="Married">
                                                            <label>Married</label>
                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Separated" name="website2" id="Separated">
                                                            <label>Separated</label>
                                                        </div>
                                                    </div><br>
                                                    <div class="col-md-12 pd_0" style="float:left;">
                                                        <span class="error" id="er_marital_status"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Family (Dependents)*</label>
                                                </th>
                                                <td>
                                                    <textarea name="dependents" id="family_dependents" class="form-control wd_58" required></textarea>
                                                    <span class="error" id="er_family_dependents"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Present Location*</label>
                                                </th>
                                                <td>
                                                    <!--<input type="text" name="present" id="present_location" class="form-control wd_58" required></textarea>-->
                                                    
                                                        <select class="select2 form-control" name="present" id="present_location" required>
                                                            <option value="0">Select</option>
                                                        @foreach($city as $cities)    
                                                            <option>{{$cities->name}}</option>
                                                        @endforeach    
                                                        </select>
                                                    
                                                    <span class="error" id="er_present_location"></span>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th>
                                                    <label for="">Native Location</label>
                                                </th>
                                                <td>
                                                    <input type="text" name="native" class="form-control wd_58" placeholder="Native Location"></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary f_right" onclick="show1();">Next</button>
                            </div>
                            <div id="menu1" class="tab-pane fade pd_0"><br>
                                <div class="form-group mb-2 file-repeater">
                                    <div data-repeater-list="data">
                                        <div data-repeater-item>
                                            <div class="row mb-1">
                                                <div class="col-6">
                                                    <table class="table wd_21">
                                                        <tr>
                                                            <th>
                                                                <label for="">Qualification*</label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" id="qualification" name="qualification" required>
                                                                    <option value="0">Select</option>
                                                                    @foreach($qualification as $qul)
                                                                    <option value="{{$qul->id}}">
                                                                        {{$qul->qualification_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="error" id="er_qualification"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Degree*</label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" id="degree" name="degree" required>
                                                                    <option value="0">Select</option>
                                                                    @foreach($degree->sortBy('degree') as $deg)
                                                                    <option value="{{$deg->id}}">{{$deg->degree}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="error" id="er_degree"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Specialization*</label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" id="specialization" name="specialization" required>
                                                                    <option value="0">Select</option>
                                                                    @foreach($specialization->sortBy('id')
                                                                    as $spec)
                                                                    <option value="{{$spec->id}}">
                                                                        {{$spec->specialization_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="error" id="er_specialization"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">College*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="college" name="college" placeholder="College" required>
                                                                <span class="error" id="er_college"></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-6">
                                                    <table class="table wd_16">
                                                        <tr>
                                                            <th>
                                                                <label for="">% of Marks / Grades</label>
                                                            </th>
                                                            <td>
                                                                <div class="row wd_70">
                                                                    <div class="col-md-6 p_right">
                                                                        <input type="text" class="form-control" id="marks" name="marks" placeholder="Marks / Grades" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                                                    </div>
                                                                    <div class="col-md-6 p_left">
                                                                        <select class="form-control" name="coursetype">
                                                                            <option selected>Select</option>
                                                                            <option>Regular</option>
                                                                            <option>Distance learning</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <span class="error" id="er_marks"></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Year of Passing*</label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control branchid wd_58" id="passing_year" name="year" required>
                                                                    <option value="0">Select</option>
                                                                    @php
                                                                    $currentyear=date("Y")+1;
                                                                    $count=20;
                                                                    for($i=0;$i<$count;$i++) { $currentyear=$currentyear-1; @endphp<option value="{{$currentyear}}">{{$currentyear}}
                                                                        </option>
                                                                        @php
                                                                        }
                                                                        @endphp
                                                                </select>
                                                                <span class="error" id="er_passing_year"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">University</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" name="university" placeholder="University" required>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 mb_15 pd_0">
                                                <button type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1"><i class="ft-x"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" data-repeater-create class="btn btn-primary">
                                     Add
                                    </button>
                                </div>
                                <button type="button" class="btn btn-warning f_left" onclick="prev_tab1();">Previous</button>
                                <button type="button" class="btn btn-primary f_right" onclick="show3();">Next</button>
                            </div>
                            <div id="menu2" class="tab-pane fade pd_0"><br>
                                <div class="form-group mb-2 file-repeater">
                                    <div data-repeater-list="data1">
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="col-6">
                                                    <table class="table wd_21">
                                                        <tr>
                                                            <th>
                                                                <label for="">Company Name*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="company_name" name="c_name" placeholder="Company Name" required>
                                                                <span class="error" id="er_company_name"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Designation*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="designation1" name="designation" placeholder="Designation" required>
                                                                <span class="error" id="er_designation1"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Employment Period*</label>
                                                            </th>
                                                            <td>
                                                                <div class='input-group wd_58'>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd_0">
                                                                        <label for="">From</label>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd_0">
                                                                        <label for="">To</label>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd_0">
                                                                        <input type='date' class="form-control" id="from_date" name="employmentperiod_from" required/>
                                                                        <span class="error" id="er_from_date"></span>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd_0">
                                                                        <input type='date' class="form-control" id="to_date" name="employmentperiod_to" required/>
                                                                        <span class="error" id="er_to_date"></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Specialization/Expertise*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="specialization1" name="specialization" placeholder="Specialization / Expertise" required>
                                                                <span class="error" id="er_specialization1"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Project/ Certification Details
                                                                    (optional)</label>
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control wd_58" name="certification" placeholder="Project"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-6">
                                                    <table class="table wd_16">
                                                        <tr>
                                                            <th>
                                                                <label for="">Location*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="location" name="location" placeholder="Location" required>
                                                                <span class="error" id="er_location"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Other Vital Information(Position
                                                                    Specific)</label>
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control wd_58" name="vital_information" placeholder="Other Vital Information"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Reporting To</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" name="reporting" placeholder="Reporting To">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 mb_15 pd_0">
                                                <button type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1"><i class="ft-x"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" data-repeater-create class="btn btn-primary">
                                     Add
                                    </button>
                                </div>
                                <button type="button" class="btn btn-warning f_left" onclick="prev_tab2();">Previous</button>
                                <button type="button" class="btn btn-primary f_right" onclick="show5();">Next</button>
                            </div>
                            <div id="menu3" class="tab-pane fade pd_0"><br>
                                <div class="">
                                    <div class="row">
                                        <div class="col-6">
                                            <table class="table">
                                                <tr>
                                                    <th>
                                                        <label for="">Rate Technical Skills*</label>
                                                    </th>
                                                    <td>
                                                        <div class="wd_73">
                                                            @if (session()->has('position_tech'))
                                                            <div class="row">

                                                                @php
                                                                    $tech_skills='';
                                                                    $tech_skills=json_decode(session('position_tech'));
                                                                    $count=count($tech_skills);
                                                                @endphp

                                                                @php
                                                                    for($i=0;$i<$count;$i++){ 
                                                                @endphp 
                                                                <div class="col-md-8 p_right">
                                                                    <input type="text" class="form-control" name="technical[]" value="{{$tech_skills[$i]}}" aria-invalid="false">
                                                                </div>
                                                                <div class="col-md-4 p_left">
                                                                    <div class="stars">
                                                                        <!-- <form action=""> -->
                                                                        <input class="star star-5" id="star-5{{$i}}" type="radio" value="5" name="star_{{$i}}[]" />
                                                                        <label class="star star-5" for="star-5{{$i}}"></label>
                                                                        <input class="star star-4" id="star-4{{$i}}" type="radio" value="4" name="star_{{$i}}[]" />
                                                                        <label class="star star-4" for="star-4{{$i}}"></label>
                                                                        <input class="star star-3" id="star-3{{$i}}" type="radio" value="3" name="star_{{$i}}[]" />
                                                                        <label class="star star-3" for="star-3{{$i}}"></label>
                                                                        <input class="star star-2" id="star-2{{$i}}" type="radio" value="2" name="star_{{$i}}[]" />
                                                                        <label class="star star-2" for="star-2{{$i}}"></label>
                                                                        <input class="star star-1" id="star-1{{$i}}" type="radio" value="1" name="star_{{$i}}[]" required/>
                                                                        <label class="star star-1" for="star-1{{$i}}"></label>
                                                                        <!-- </form> -->
                                                                    </div>
                                                                </div>
                                                                <span class="error" id="er_stars"></span>
                                                                @php
                                                                    }
                                                                @endphp
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <label for="">Rate Behavioural Skills*</label>
                                                    </th>
                                                    <td>
                                                        <div class="wd_73">
                                                            @if (session()->has('position_behaviour'))
                                                            <div class="row">

                                                                @php
                                                                $beh_skills='';
                                                                $beh_skills=json_decode(session('position_behaviour'));
                                                                $count1=count($beh_skills);
                                                                @endphp

                                                                @php
                                                                for($j=0;$j<$count1;$j++){ @endphp 
                                                                <div class="col-md-8 p_right">
                                                                    <input type="text" class="form-control" name="behavioural[]" value="{{$beh_skills[$j]}}">
                                                                </div>
                                                                <div class="col-md-4 p_left">
                                                                    <div class="stars">
                                                                        <!-- <form action=""> -->
                                                                        <input class="star star-5" id="bstar-10{{$j}}" type="radio" value="5" name="bstar_{{$j+50}}[]" />
                                                                        <label class="star star-5" for="bstar-10{{$j}}"></label>
                                                                        <input class="star star-4" id="bstar-9{{$j}}" type="radio" value="4" name="bstar_{{$j+50}}[]" />
                                                                        <label class="star star-4" for="bstar-9{{$j}}"></label>
                                                                        <input class="star star-3" id="bstar-8{{$j}}" type="radio" value="3" name="bstar_{{$j+50}}[]" />
                                                                        <label class="star star-3" for="bstar-8{{$j}}"></label>
                                                                        <input class="star star-2" id="bstar-7{{$j}}" type="radio" value="2" name="bstar_{{$j+50}}[]" />
                                                                        <label class="star star-2" for="bstar-7{{$j}}"></label>
                                                                        <input class="star star-1" id="bstar-6{{$j}}" type="radio" value="1" name="bstar_{{$j+50}}[]" required/>
                                                                        <label class="star star-1" for="bstar-6{{$j}}"></label>
                                                                        <!-- </form> -->
                                                                    </div>
                                                                </div>
                                                                @php
                                                                }
                                                                @endphp
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <label for="">Any Other Inputs</label>
                                                    </th>
                                                    <td>
                                                        <textarea class="form-control wd_73" name="other_input" placeholder="Any Other Input"></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <table class="table wd_16">
                                                <tr>
                                                    <th>
                                                        <label for="">Consultant Assessment*</label>
                                                    </th>
                                                    <td>
                                                        <!--<textarea class="form-control wd_73" name="consul_assessment" required></textarea>-->
                                                         <textarea class="tinymce-classic" name="consul_assessment" id="mceu_53"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <label for="">Interview Availability*</label>
                                                    </th>
                                                    <td>
                                                        <textarea class="form-control wd_73" name="interview_availability"  placeholder="Interview Availability" required></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="button" class="btn btn-warning f_left" onclick="prev_tab3();">Previous</button>
                                <div class="form-actions">
                                    <span><input type="button" class="btn btn-success" value="Draft"></span>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>    
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 pd_0">
        <div class="collapse show">
            <h4>Candidate Resume</h4>
             @if (session()->has('resume_all_text'))
            <textarea rows="100" cols="200" class="form-control">{{session('resume_all_text')}}</textarea>
             @endif

        </div>
    </div>
    </div>


    <div id="test" name="test"></div>
    </div>
    <script>
        // $('#degree').on('change',function(){
        //   var id = $(this).val();
        //     $.ajax({
        //             url: "{{url('/specialization_fetch')}}",
        //             type: "POST",
        //             data: {
        //                 id: id,
        //                 _token: '{{csrf_token()}}'
        //             },
        //             dataType: 'json',
        //             success: function(data) {
        //                 console.log(data);
        //                 $('#specialization').html('<option value="">Select</option>');
                        
        //                 $.each(data, function(key, value) {
        //                         $("#specialization").append('<option value="' + value.id +'">' + value.specialization_name + '</option>');
        //                     });
        //             },
        //         });
        // });
    </script>
    <script>
        $('#reset').on('click', function() {
            $.ajax({
                url: "{{url('reset_resume')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: function(html) {
                    location.reload();
                }
            })
        })
    </script>
    <script>
        function show1() {

            var position = $('#position').val().length;
            var candidate = $('#candidate').val();
            var email = $('#email').val();
            var mobile = $('#mobile').val();
            var dob = $('#dob').val();
            var designation = $('#designation').val();
            var year = $('#year').val();
            var month = $('#month').val();
            var present_ctc = $('#present_ctc').val();
            var expected_ctc = $('#expected_ctc').val();
            var notice_period = $('#notice_period').val();
            var gender = $("input[name=gender1]:checked").val();
            var marital_status = $("input[name=website2]:checked").val();
            var family_dependents = $('#family_dependents').val();
            var present_location = $('#present_location').val();
            //alert(pincode);
            var x = [];
            if (position == 0) {
                $('#er_position').text('Please Enter position Name');
                x.push(1);
            }
            if (candidate == 0) {
                $('#er_candidate').text('Please Enter Candidate');
                x.push(1);
            }
            if (email == 0) {
                $('#er_email').text('Please Enter Email');
                x.push(1);

            }
            if (mobile == 0) {
                $('#er_mobile').text('Please Enter Mobile');
                x.push(1);

            }
            if (dob == 0) {
                $('#er_dob').text('Please Enter DOB');
                x.push(1);

            }
            if (designation == 0) {
                $('#er_designation').text('Please Enter Designation');
                x.push(1);

            }
            if (year == 0) {
                $('#er_year').text('Please Enter Year');
                x.push(1);

            }
            if (month == 0) {
                $('#er_month').text('Please Enter Month');
                x.push(1);

            }
            if (present_ctc == 0) {
                $('#er_present_ctc').text('Please Enter Present CTC');
                x.push(1);

            }
            if (expected_ctc == 0) {
                $('#er_expected_ctc').text('Please Enter Expected CTC');
                x.push(1);

            }
            if (notice_period == 0) {
                $('#er_notice_period').text('Please Enter Notice Period');
                x.push(1);

            }
            
            if (gender == null) {
                $('#er_gender').text('Please Enter Gender');
                x.push(1);

            }
            if (marital_status == null) {
                $('#er_marital_status').text('Please Enter Marital Status');
                x.push(1);

            }
            if (family_dependents == 0) {
                $('#er_family_dependents').text('Please Enter Family Dependents');
                x.push(1);

            }
            if (present_location == 0) {
                $('#er_present_location').text('Please Enter Present Location');
                x.push(1);

            }
            if (x.length == 0) {
                next_tab1();
            }


        }
    </script>
    <script>
        function show3() {

            var qualification = $('#qualification').val();
            var degree = $('#degree').val();
            var specialization = $('#specialization').val();
            var college = $('#college').val();
            var marks = $('#marks').val();
            var passing_year = $('#passing_year').val();
            //alert(qualification);
            var x = [];
            if (qualification == 0) {
                $('#er_qualification').text('Please Enter Qualification');
                x.push(1);
            }
            if (degree == 0) {
                $('#er_degree').text('Please Enter Degree');
                x.push(1);
            }
            if (specialization == 0) {
                $('#er_specialization').text('Please Enter Specialization');
                x.push(1);

            }
            if (college == 0) {
                $('#er_college').text('Please Enter College');
                x.push(1);

            }
            if (marks == 0) {
                $('#er_marks').text('Please Enter Marks');
                x.push(1);

            }
            if (passing_year == 0) {
                $('#er_passing_year').text('Please Enter Year Of Passing');
                x.push(1);

            }
            if (x.length == 0) {
                next_tab2();
            }


        }
    </script>
    <script>
        function show5() {

            var company_name = $('#company_name').val().length;
            var designation1 = $('#designation1').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var specialization1 = $('#specialization1').val();
            var location = $('#location').val();
            //alert(pincode);
            var x = [];
            if (company_name == 0) {
                $('#er_company_name').text('Please Enter Company Name');
                x.push(1);
            }
            if (designation1 == 0) {
                $('#er_designation1').text('Please Enter Designation');
                x.push(1);
            }
            if (from_date == 0) {
                $('#er_from_date').text('Please Enter From Date');
                x.push(1);

            }
            if (to_date == 0) {
                $('#er_to_date').text('Please Enter To Date');
                x.push(1);

            }
            if (specialization1 == 0) {
                $('#er_specialization1').text('Please Enter Specialization');
                x.push(1);

            }
            if (location == 0) {
                $('#er_location').text('Please Enter Location');
                x.push(1);

            }
            
            if (x.length == 0) {
                next_tab3();
            }
        }
</script>
    <script>
        function show6() {

            var company_name = $('#company_name').val().length;
            var designation1 = $('#designation1').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var specialization1 = $('#specialization1').val();
            var location = $('#location').val();
            //alert(pincode);
            var x = [];
            if (company_name == 0) {
                $('#er_company_name').text('Please Enter Company Name');
                x.push(1);
            }
            if (designation1 == 0) {
                $('#er_designation1').text('Please Enter Designation');
                x.push(1);
            }
            if (from_date == 0) {
                $('#er_from_date').text('Please Enter From Date');
                x.push(1);

            }
            if (to_date == 0) {
                $('#er_to_date').text('Please Enter To Date');
                x.push(1);

            }
            if (specialization1 == 0) {
                $('#er_specialization1').text('Please Enter Specialization');
                x.push(1);

            }
            if (location == 0) {
                $('#er_location').text('Please Enter Location');
                x.push(1);

            }
            
            if (x.length == 0) {
                next_tab3();
            }
        }
</script>
    <script>
        function next_tab1() {
            $('#mytabs a[href="#menu1"]').tab('show');
            var add = document.getElementById("education");
            add.classList.add("active");
            var remove = document.getElementById("personal");
            remove.classList.remove("active");
        }
        function next_tab2() {
            $('#mytabs a[href="#menu2"]').tab('show');
            var add = document.getElementById("experience");
            add.classList.add("active");
            var remove = document.getElementById("education");
            remove.classList.remove("active");
        }
        function next_tab3() {
            $('#mytabs a[href="#menu3"]').tab('show');
            var add = document.getElementById("consultant");
            add.classList.add("active");
            var remove = document.getElementById("experience");
            remove.classList.remove("active");
        }

        function prev_tab1() {
            $('#mytabs a[href="#home"]').tab('show');
            var element = document.getElementById("personal");
            element.classList.add("active");
            var element = document.getElementById("education");
            element.classList.remove("active");
        }
        function prev_tab2() {
            $('#mytabs a[href="#menu1"]').tab('show');
            var element = document.getElementById("education");
            element.classList.add("active");
            var element = document.getElementById("experience");
            element.classList.remove("active");
        }
        function prev_tab3() {
            $('#mytabs a[href="#menu2"]').tab('show');
            var element = document.getElementById("experience");
            element.classList.add("active");
            var element = document.getElementById("consultant");
            element.classList.remove("active");
        }
    </script>
</x-admin-layout>