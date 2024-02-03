<x-admin-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style>
        .select2 {
            width: 100% !important;
        }


        div.stars {
            /* width: 270px;
            display: inline-block; */
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

        .cnt223 a {
            text-decoration: none;
        }

        .popup {
            margin: 0 auto;
            display: none;
            position: relative;
        }

        .cnt223 {
            min-width: 600px;
            width: 600px;
            background: white;
            padding: 15px 35px;
            border-radius: 5px;
            box-shadow: 0 2px 5px #000;
            position: absolute;
            left: 50%;
            z-index: 2;
            transform: translateX(-50%);
        }

        .cnt223 p {
            clear: both;
            color: #555555;
            /* text-align: justify; */
            font-size: 20px;
            font-family: sans-serif;
        }

        .cnt223 p a {
            color: #d91900;
            font-weight: bold;
        }

        .cnt223 .x {
            float: right;
            height: 35px;
            left: 22px;
            position: relative;
            top: -25px;
            width: 34px;
        }

        .cnt223 .x:hover {
            cursor: pointer;
        }
        #mceu_53{
            overflow: hidden;
            height: 300px;
        }
    </style>

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Resume</li>
                        <li class="breadcrumb-item active">Edit Resume</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <!-- <button class="btn btn-danger btn-glow px-2">Add Resume</button>
                <button class="btn btn-danger btn-glow px-2" id="reset">Reset</button>
                <button class="btn btn-danger btn-glow px-2" id="add">Add</button> -->
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="collapse show">
                <form class="form" action="{{url('resume_edit',$view->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home"><img src="../assets/resume/personal.png" class="hi8">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1"><img src="../assets/resume/reading.png" class="hi8">Education</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2"><img src="../assets/resume/experience.png" class="hi8">Experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu3"><img src="../assets/resume/operator.png" class="hi8">Consultant
                                    Assessment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu4"><img src="../assets/resume/addfile.png" class="hi8">Re-Upload Resume</a>
                            </li>
                        </ul>
                        <!--1st Tab form panes -->
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
                                                    <input type="text" class="form-control wd_58" name="position" value="{{($view->jobname)->job_title}}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Candidate Name*</label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" name="candidatename" value="{{$view->name}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Email*</label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" name="email" value="{{$view->email}}"readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Mobile*</label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" maxlength="10" id="mobile"  name="mobile" value="{{$view->mobile}}" readonly required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                    <!--<input type="text" class="form-control wd_58" name="mobile" value="{{$view->mobile}}" readonly>-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">DOB*</label>
                                                </th>
                                                <td>
                                                    <input type="date" class="form-control wd_58" name="dob" value="{{$view->dob}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Current Designation*</label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" name="designation" value="{{$view->current_designation}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Total Years of Exp*</label>
                                                </th>
                                                <td>
                                                    <div class="row wd_70">
                                                        <div class="col-md-6 p_right">
                                                            <select class="select2 form-control" name="year">
                                                                @php
                                                                    $i=0;
                                                                    for($i;$i<=50;$i++) { 
                                                                @endphp 
                                                                <option value="{{$i}}" {{$i == $view->year_experience ? 'selected':''}}>
                                                                    {{$i}} Years
                                                                </option>
                                                                @php
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 p_left">
                                                            <select class="select2 form-control" name="month">
                                                                @php
                                                                    $i=0;
                                                                    for($i;$i<=11;$i++) { 
                                                                @endphp 
                                                                <option value="{{$i}}" {{$i == $view->month_experience ? 'selected':''}}>
                                                                    {{$i}} Months
                                                                </option>
                                                                @php
                                                                    }
                                                                @endphp
                                                            </select>
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
                                                            <div class="">
                                                                @php
                                                                $salary_num=explode(" ",($view->ctc_min));
                                                                @endphp
                                                                <!--<input type="text" class="form-control" id="" name="min_salary" value="{{$salary_num[0]}}" placeholder="Present CTC">-->
                                                                <select class="select2 form-control" id="present_ctc" name="min_salary" required>
                                                                    <option value="0">Select</option>
                                                                    @for($i=0;$i<=15;$i++) 
                                                                        <option value="{{$i}}" {{$i == $salary_num[0] ? 'selected':''}}>{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 pd_0">
                                                            <div class="">
                                                                <select class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" name="salary_value">
                                                                    @php
                                                                    $salary_value=explode(" ",($view->ctc_min));

                                                                    @endphp
                                                                    <option>Select</option>
                                                                    <option value="Lacs" {{$salary_value[1] == "Lacs"  ? 'selected':''}}>Lacs</option>
                                                                    <option value="K" {{$salary_value[1] == "K"  ? 'selected':''}}>Thousand</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 pd_0">
                                                            <div class="">
                                                                @php
                                                                $salary_num_max=explode(" ",($view->ctc_max));
                                                                @endphp
                                                                <!--<input type="text" class="form-control" id="" name="max_salary" value="{{$salary_num_max[0]}}" placeholder="Expected CTC">-->
                                                                <select class="select2 form-control" id="expected_ctc" name="max_salary" required>
                                                                    <option value="0">Select</option>
                                                                    @for($i=0;$i<=15;$i++) 
                                                                        <option value="{{$i}}" {{$i == $salary_num_max[0]  ? 'selected':''}}>{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 p_left">
                                                            <div class="">
                                                                <select class="form-control select2" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="salary_value2">
                                                                    @php
                                                                    $salary_value_max=explode(" ",($view->ctc_max));

                                                                    @endphp
                                                                    <option>Select</option>
                                                                    <option value="Lacs" {{$salary_value_max[1] == "Lacs"  ? 'selected':''}}>Lacs</option>
                                                                    <option value="k" {{$salary_value_max[1] == "K"  ? 'selected':''}}>Thousand</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Notice Period*</label>
                                                </th>
                                                <td>
                                                    <div class="row wd_70">
                                                        <div class="col-md-6">
                                                            <select class="select2 form-control" id="notice_period" name="notice" required>
                                                                <option>Select</option>
                                                                <option {{$view->notice_period == "15 days"  ? 'selected':''}}>15 days</option>
                                                                <option {{$view->notice_period == "30 days"  ? 'selected':''}}>30 days</option>
                                                                <option {{$view->notice_period == "45 days"  ? 'selected':''}}>45 days</option>
                                                                <option {{$view->notice_period == "90 days"  ? 'selected':''}}>90 days</option>
                                                                <option {{$view->notice_period == "Immediate"  ? 'selected':''}}>Immediate</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @php
                                                            if($view->present_working==1){
                                                                $checkbox_data="checked";

                                                            }
                                                            else{
                                                                $checkbox_data="";
                                                            }


                                                            @endphp
                                                            <div class="skin skin-square">
                                                                <input type="checkbox" value="1" id="single_checkbox" name="present_working" {{$checkbox_data}} >
                                                                <label for="single_checkbox">Presently Working?
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th>
                                                    <label for="">Gender*</label>
                                                </th>
                                                <td>
                                                    <div class="controls">
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Male" name="gender1" id="male" {{ ($view->gender=="Male")? "checked" : "" }}>
                                                            <label>Male</label>
                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Female" name="gender1" id="female" {{ ($view->gender=="Female")? "checked" : "" }}>
                                                            <label>FeMale</label>
                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Others" name="gender1" id="others" {{ ($view->gender=="Others")? "checked" : "" }}>
                                                            <label>Others</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Marital Status*</label>
                                                </th>
                                                <td>
                                                    <div class="controls">
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Single" name="website2" id="Single" {{ ($view->marital_status=="Single")? "checked" : "" }}>
                                                            <label>Single</label>
                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Married" name="website2" id="Married" {{ ($view->marital_status=="Married")? "checked" : "" }}>
                                                            <label>Married</label>
                                                        </div>
                                                        <div class="skin skin-square d_iln_blk">
                                                            <input type="radio" value="Separated" name="website2" id="Separated" {{ ($view->marital_status=="Separated")? "checked" : "" }}>
                                                            <label>Separated</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Family (Dependents)*</label>
                                                </th>
                                                <td>
                                                    <textarea name="dependents" class="form-control wd_58">{{$view->family_dependent}}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Present Location*</label>
                                                </th>
                                                <td>
                                                    <input type="text" name="present" class="form-control wd_58" value="{{$view->present_location}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Native Location</label>
                                                </th>
                                                <td>
                                                    <input type="text" name="native" class="form-control wd_58" value="{{$view->native_location}}">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- 2nd tab  -->
                            <div id="menu1" class="tab-pane fade pd_0"><br>
                                <div class="form-group mb-2 file-repeater">
                                    <div data-repeater-list="data2">
                                        @foreach ($edit_result as $results )
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="col-6">
                                                    <table class="table wd_21">
                                                        <tr>
                                                            <th>
                                                                <label for="">Qualification*</label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" name="qualification">
                                                                    <option>Select</option>
                                                                    @foreach($qualification as $qul)
                                                                    <option value="{{$qul->id}}" {{$qul->id == $results[0] ? 'selected':''}}>
                                                                        {{$qul->qualification_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Degree*</label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" name="degree">
                                                                    <option>Select</option>
                                                                    @foreach ($degree as $degre)
                                                                    <option value="{{$degre->id}}" {{$degre->id == $results[1] ? 'selected':''}}>
                                                                        {{$degre->degree}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Specialization*</label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" name="specialization">
                                                                    <option>Select</option>
                                                                    @foreach ($specialization as $specializ)
                                                                    <option value="{{$specializ->id}}" {{$specializ->id == $results[2] ? 'selected':''}}>
                                                                        {{$specializ->specialization_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">College*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" name="college" value=" {{$results[3]}}">
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
                                                                        <input type="text" class="form-control" name="marks" value=" {{$results[4]}}">
                                                                    </div>
                                                                    <div class="col-md-6 p_left">
                                                                        <select class="form-control" name="coursetype">
                                                                            <option>Select</option>
                                                                            <option value="Regular" {{$results[5] == 'Regular' ? 'selected':''}}>Regular</option>
                                                                            <option value="Distance learning" {{$results[5] == 'Distance learning' ? 'selected':''}}>
                                                                                Distance learning</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Year of Passing*</label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control branchid wd_58" name="year">
                                                                    <option selected>select</option>
                                                                    @php
                                                                    $currentyear=date("Y")+1;
                                                                    $count=20;
                                                                    for($i=0;$i<$count;$i++) { $currentyear=$currentyear-1; @endphp<option value="{{$currentyear}}" {{$results[6] == $currentyear ? 'selected':''}}>{{$currentyear}}
                                                                        </option>
                                                                        @php
                                                                        }
                                                                        @endphp
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">University</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" name="university" value="{{$results[7]}}">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 pd_0" style="margin-bottom:10px">
                                                <button type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1"><i class="ft-x"></i></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-12 pd_0" style="margin-top:10px">
                                        <button type="button" data-repeater-create class="btn btn-primary mb-1">
                                            <i class="ft-plus"></i> Add
                                        </button>
                                    </div> 
                                </div>
                            </div>
                            <!-- 3rd tab form -->
                            <div id="menu2" class="tab-pane fade pd_0"><br>
                                <div class="form-group mb-2 file-repeater">
                                    <div data-repeater-list="data3">
                                        @foreach ($edit_res as $edit_result )
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="col-6">
                                                    <table class="table wd_21">
                                                        <tr>
                                                            <th>
                                                                <label for="">Company Name*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="c_name" value="{{$edit_result[0]}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Designation*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="designation" value="{{$edit_result[1]}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Employment Period*</label>
                                                            </th>
                                                            <td>
                                                                <div class='input-group'>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd_0">
                                                                        <label for="">From</label>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd_0">
                                                                        <label for="">To</label>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd_0">
                                                                        <input type='date' class="form-control" name="employmentperiod_from" value="{{$edit_result[2]}}">
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pd_0">
                                                                        <input type='date' class="form-control" name="employmentperiod_to" value="{{$edit_result[3]}}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Specialization/Expertise*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="specialization" value="{{$edit_result[4]}}">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-6">
                                                    <table class="table wd_16">
                                                        <tr>
                                                            <th>
                                                                <label for="">Project/ Certification Details</label>
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control" name="certification">{{$edit_result[5]}}</textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Location*</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="location" value="{{$edit_result[6]}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Other Vital Information(Position Specific)</label>
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control" name="vital_information"> {{$edit_result[7]}} </textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Reporting To</label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="reporting" value="{{$edit_result[8]}}">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 pd_0" style="margin-bottom:10px">
                                                <button type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1"><i class="ft-x"></i></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-12 pd_0" style="margin-top:10px">
                                        <button type="button" data-repeater-create class="btn btn-primary mb-1">
                                            <i class="ft-plus"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- 4th tab form -->
                            <div id="menu3" class="tab-pane fade pd_0"><br>
                                <div class="form-group mb-2">
                                    <div class="row mb-1">
                                        <div class="col-6">
                                            <table class="table wd_21">
                                                <tr>
                                                    <th>
                                                        <label for="">Rate Technical Skills*</label>
                                                    </th>
                                                    <td>
                                                        <div class="wd_73">
                                                            <div class="row">
                                                                @php
                                                                $tech_skills='';
                                                                $tech_skills=json_decode($view->technical_rating);

                                                                $count=count($tech_skills);
                                                                @endphp

                                                                @php
                                                                for($i=0;$i<$count;$i++){ @endphp <div class="col-md-8 p_right">
                                                                    <input type="text" class="form-control" name="technical[]" value="{{$tech_skills[$i]}}" aria-invalid="false" readonly>
                                                                </div>
                                                                <div class="col-md-4 p_left">
                                                                    <div class="stars">
                                                                        <!-- <form action=""> -->
                                                                        <input class="star star-5" id="star-5{{$i}}" type="radio" value="5" name="star_{{$i}}[]" @if(json_decode($view->technical_star_rating)[$i]==5)
                                                                        checked @endif
                                                                        />
                                                                        <label class="star star-5" for="star-5{{$i}}"></label>
                                                                        <input class="star star-4" id="star-4{{$i}}" type="radio" value="4" name="star_{{$i}}[]" @if(json_decode($view->technical_star_rating)[$i]==4)
                                                                        checked @endif />
                                                                        <label class="star star-4" for="star-4{{$i}}"></label>
                                                                        <input class="star star-3" id="star-3{{$i}}" type="radio" value="3" name="star_{{$i}}[]" @if(json_decode($view->technical_star_rating)[$i]==3)
                                                                        checked @endif />
                                                                        <label class="star star-3" for="star-3{{$i}}"></label>
                                                                        <input class="star star-2" id="star-2{{$i}}" type="radio" value="2" name="star_{{$i}}[]" @if(json_decode($view->technical_star_rating)[$i]==2)
                                                                        checked @endif/>
                                                                        <label class="star star-2" for="star-2{{$i}}"></label>
                                                                        <input class="star star-1" id="star-1{{$i}}" type="radio" value="1" name="star_{{$i}}[]" @if(json_decode($view->technical_star_rating)[$i]==1)
                                                                        checked @endif/>
                                                                        <label class="star star-1" for="star-1{{$i}}"></label>
                                                                        <!-- </form> -->
                                                                    </div>
                                                                </div>
                                                                @php
                                                                }
                                                                @endphp
                                                            </div>
                                                        </div>
                                        </td>
                                        </tr>
                                        <tr>
                                                <th>
                                                    <label for="">Rate Behavioural Skills*</label>
                                                </th>
                                                <td>
                                                    <div class="wd_73">
                                                        <div class="row">
                                                            @php
                                                            $beh_skills='';
                                                            $beh_skills=json_decode($view->behavioural_rating);
                                                            $count1=count($beh_skills);
                                                            @endphp

                                                            @php
                                                            for($j=0;$j<$count1;$j++){ @endphp 
                                                            <div class="col-md-8 p_right">
                                                                <input type="text" class="form-control" name="behavioural[]" value="{{$beh_skills[$j]}}" readonly>
                                                            </div>
                                                            <div class="col-md-4 p_left">
                                                                <div class="stars">
                                                                    <!-- <form action=""> -->
                                                                    <input class="star star-5" id="bstar-10{{$j}}" type="radio" value="5" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==5)
                                                                    checked @endif />
                                                                    <label class="star star-5" for="bstar-10{{$j}}">
                                                                    </label>
                                                                    <input class="star star-4" id="bstar-9{{$j}}" type="radio" value="4" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==4)
                                                                    checked @endif />
                                                                    <label class="star star-4" for="bstar-9{{$j}}"></label>
                                                                    <input class="star star-3" id="bstar-8{{$j}}" type="radio" value="3" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==3)
                                                                    checked @endif />
                                                                    <label class="star star-3" for="bstar-8{{$j}}"></label>
                                                                    <input class="star star-2" id="bstar-7{{$j}}" type="radio" value="2" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==2)
                                                                    checked @endif />
                                                                    <label class="star star-2" for="bstar-7{{$j}}"></label>
                                                                    <input class="star star-1" id="bstar-6{{$j}}" type="radio" value="1" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==1)
                                                                    checked @endif />
                                                                    <label class="star star-1" for="bstar-6{{$j}}"></label>
                                                                    <!-- </form> -->
                                                                </div>
                                                            </div>
                                                            @php
                                                            }
                                                            @endphp
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <tr>
                                            <th>
                                                <label for="">Any Other Inputs</label>
                                            </th>
                                            <td>
                                                <textarea class="form-control wd_73" name="other_input">{{$view->other_inputs}}</textarea>
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
                                                    <!--<textarea class="form-control wd_73" name="consul_assessment"> </textarea>-->
                                                     <textarea class="tinymce-classic" name="consul_assessment" id="mceu_53">{{$view->assessment}}</textarea>
                                                </td>
                                            </tr>
                                            
                                    <tr>
                                        <th>
                                            <label for="">Interview Availability*</label>
                                        </th>
                                        <td>
                                            <textarea class="form-control wd_73" name="interview_availability">{{$view->interview_availability}}</textarea>
                                        </td>
                                    </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 5th tab form -->
                    <div id="menu4" class="tab-pane fade pd_0"><br>
                        <table class="table wd_16 t_left">
                            <tr>
                                <th class="pd_410">
                                    Attachment*
                                </th>
                                <td class="pd_410"><input type="file" class="form-control" name="resume">
                                </td>
                            </tr>
                            <tr>
                                <th class="pd_410">Upload Resume
                                </th>
                                <td class="pd_410">
                                    <span><input type="button" class="btn btn-success" value="Upload"> {{$view->resume_file}}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>
            <div class="form-actions">
                <span><input type="button" class="btn btn-success" value="Draft"></span>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="button" name="cancel" class="btn btn-danger">Cancel</button>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>

    <div class="col-md-12 pd_0">
        <div class="collapse show">
            <h4>Candidate Resume</h4>
        </div>
    </div>


    <!-- Form wizard with icon tabs section end -->
    <form>
        <input type="hidden" value="{{session('showpopup')}}" id="session">
    </form>
    <div id="test" name="test"></div>

    <script>
        $('#reset').on('click', function() {
            $.ajax({
                url: "{{url('reset_resume')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}'
                },
            })
        })
    </script>


    <script>
        $(document).ready(function() {
            //fetch dist clients
            $('#clientname').on('change', function() {
                var client_id = this.value;
                $("#position_fetch").html('');
                $.ajax({
                    url: "{{url('fetch_position')}}",
                    type: "POST",
                    data: {
                        sta_id: client_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function(result) {
                        $('#position_fetch').html('<option value="">Select Position</option>');
                        $.each(result.position, function(key, value) {
                            $("#position_fetch").append('<option value="' + value
                                .position_id + '">' +
                                value.job_title + '</option>');
                        });
                    },
                });
            });

        });
    </script>
    <script type='text/javascript'>
        $(function() {
            var s_data = $('#session').val();
            if (s_data == 0) {
                var overlay = $('<div id="overlay"></div>');
                overlay.show();
                overlay.appendTo(document.body);
                $('.popup').show();
                $('.close').click(function() {

                    alert(s_data);
                    $('.popup').hide();

                    overlay.appendTo(document.body).remove();
                    return false;
                });
                $('.x').click(function() {
                    $('.popup').hide();
                    overlay.appendTo(document.body).remove();
                    return false;
                });
            }
        });
    </script>
    <script>
        var i = 1;
        $('#add').each(function() {
            $(this).on('click', function() {

                $('#test')
                console.log(i);
                i++;

            });
        })
    </script>

</x-admin-layout>