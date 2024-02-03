<x-admin-layout>
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
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Resume</li>
                        <li class="breadcrumb-item active">{{$view->name}}</li>
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
                                                            <table class="table wd_21">
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <td>{{$view->resume_code}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Candidate Name</th>
                                                                    <td>{{$view->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{$view->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Mobile</th>
                                                                    <td>{{$view->mobile}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>DOB</th>
                                                                    <td>{{ date('j-F-Y', strtotime($view->dob)) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Current Designation</th>
                                                                    <td>{{$view->current_designation}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total Years of Exp</th>
                                                                    <td>{{$view->year_experience}}
                                                                        {{$view->month_experience}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Notice Period</th>
                                                                    <td>{{$view->notice_period}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Current Status</th>
                                                                    <td>
                                                                        @if($view->cv_status == 0)
                                                                        <span class="badge badge-default badge-danger">CV not send</span>
                                                                        @elseif($view->cv_status == 1)
                                                                        <span class="badge badge-default badge-success">CV Sent</span>
                                                                        @elseif($view->cv_status == 2)
                                                                        <span class="badge badge-default badge-success">Shortlisted</span>
                                                                        @elseif($view->cv_status == 3)
                                                                        <span class="badge badge-default badge-danger">Rejected</span>
                                                                        @elseif($view->cv_status == 4)
                                                                        <span class="badge badge-default badge-success">First Interview Schedule</span>
                                                                        @elseif($view->cv_status == 5)
                                                                        <span class="badge badge-default badge-warning">First Reschedule</span>
                                                                        @elseif($view->cv_status == 6)
                                                                        <span class="badge badge-default badge-success">First Selected</span>
                                                                        @elseif($view->cv_status == 7)
                                                                        <span class="badge badge-default badge-danger">First Rejected</span>
                                                                        @elseif($view->cv_status == 8)
                                                                        <span class="badge badge-default badge-success">Second Interview Schedule</span>
                                                                        @elseif($view->cv_status == 9)
                                                                        <span class="badge badge-default badge-warning">Second Reschedule</span>
                                                                        @elseif($view->cv_status == 10)
                                                                        <span class="badge badge-default badge-success">Second Selected</span>
                                                                        @elseif($view->cv_status == 11)
                                                                        <span class="badge badge-default badge-danger">Second Rejected</span>
                                                                        @elseif($view->cv_status == 12)
                                                                        <span class="badge badge-default badge-success">Third Interview Schedule</span>
                                                                        @elseif($view->cv_status == 13)
                                                                        <span class="badge badge-default badge-warning">Third Reschedule</span>
                                                                        @elseif($view->cv_status == 14)
                                                                        <span class="badge badge-default badge-success">Third Selected</span>
                                                                        @elseif($view->cv_status == 15)
                                                                        <span class="badge badge-default badge-danger">Third Rejected</span>
                                                                        @elseif($view->cv_status == 16)
                                                                        <span class="badge badge-default badge-success">Fourth Interview Schedule</span>
                                                                        @elseif($view->cv_status == 17)
                                                                        <span class="badge badge-default badge-warning">Fourth Reschedule</span>
                                                                        @elseif($view->cv_status == 18)
                                                                        <span class="badge badge-default badge-success">Fourth Selected</span>
                                                                        @elseif($view->cv_status == 19)
                                                                        <span class="badge badge-default badge-danger">Fourth Rejected</span>
                                                                        @elseif($view->cv_status == 20)
                                                                        <span class="badge badge-default badge-success">Final Interview Schedule</span>
                                                                        @elseif($view->cv_status == 21)
                                                                        <span class="badge badge-default badge-warning">Final Reschedule</span>
                                                                        @elseif($view->cv_status == 22)
                                                                        <span class="badge badge-default badge-success">Final Selected</span>
                                                                        @elseif($view->cv_status == 23)
                                                                        <span class="badge badge-default badge-danger">Final Rejected</span>
                                                                        @elseif($view->cv_status == 24)
                                                                        <span class="badge badge-default badge-success">Offer Accepted</span>
                                                                        @elseif($view->cv_status == 25)
                                                                        <span class="badge badge-default badge-danger">Offer Rejected</span>
                                                                        @elseif($view->cv_status == 26)
                                                                        <span class="badge badge-default badge-success">Joined</span>
                                                                        @elseif($view->cv_status == 27)
                                                                        <span class="badge badge-default badge-warning">Not Joined</span>
                                                                        @elseif($view->cv_status == 28)
                                                                        <span class="badge badge-default badge-danger">Deferred</span>
                                                                        @elseif($view->cv_status == 29)
                                                                        <span class="badge badge-default badge-success">Billed</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Family (Dependants)</th>
                                                                    <td>{{$view->family_dependent}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            <table class="table wd_21">
                                                                <tr>
                                                                    <th>Gender</th>
                                                                    <td>{{$view->gender}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>CTC (Present & Expected)</th>
                                                                    <td>
                                                                        {{$view->ctc_min}} - {{$view->ctc_max}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td>{{$view->marital_status}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Present Location</th>
                                                                    <td>{{$view->present_location}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Native Location</th>
                                                                    <td>{{$view->native_location}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Resume</th>

                                                                    <td>
                                                                        <a href="{{url('/candidate_resume',$view->id)}}">Candidate Resume</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Snapshot</th>
                                                                    <td><a href="{{url('/pdfresume',$view->id)}}">Download Snapshot</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Created By</th>
                                                                    <td>{{optional($view->username_of_resume)->fname}} {{optional($view->username_of_resume)->lname}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Created</th>
                                                                    <td>{{ date('j-F-Y', strtotime($view->created_at)) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Modified</th>
                                                                    <td>{{ date('j-F-Y', strtotime($view->updated_at)) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>CV Password</th>
                                                                    <td>{{$view->rand_password_pdf}}</td>
                                                                </tr>
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
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            @foreach ($result as $results )
                                                            <table class="table wd_21">
                                                                <tr>
                                                                    <th>Qualification</th>
                                                                    @php
                                                                    $quali=App\Models\Qualification::where('id',$results[0])->get();
                                                                    @endphp
                                                                    @foreach ($quali as $qualis )
                                                                    <td>{{$qualis->qualification_name}}
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>

                                                                    @php
                                                                    $dregree=App\Models\Degree::where('id',$results[1])->get();
                                                                    @endphp
                                                                    @foreach ($dregree as $dregreesssss )
                                                                    <td>{{$dregreesssss->degree}}
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th>Specializations</th>
                                                                    @php
                                                                    $spec=App\Models\Specialization::where('id',$results[2])->get();
                                                                    @endphp
                                                                    @foreach ($spec as $specs )
                                                                    <td>{{$specs->specialization_name}}
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                            </table>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            @php
                                                            $count=count($result);
                                                            for($i=0;$i<$count;$i++) { @endphp <table class="table table-bordered wd_21">
                                                                <tr>
                                                                    <th>University</th>
                                                                    <td>
                                                                        {{$result[$i][3]}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>% of Marks / Grade</th>
                                                                    <td>{{$result[$i][4]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Course Type</th>
                                                                    <td> {{$result[$i][5]}} </td>
                                                                </tr>
                                                                </table>
                                                                @php
                                                                }
                                                                @endphp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade pd_0"><br>
                                    <div class="collapse show">
                                        <div class="pd_0">
                                            @php
                                            $count=count($res);
                                            for($i=0;$i<$count;$i++) { @endphp <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            <table class="table wd_21">
                                                                <tr>
                                                                    <th>Designation</th>
                                                                    <td>{{$res[$i][0]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Employment Period</th>
                                                                    <td>{{$res[$i][1]}} - {{$res[$i][2]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Location of work</th>
                                                                    <td>{{$res[$i][3]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Company Name</th>
                                                                    <td>{{$res[$i][4]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Project / Certification Details</th>
                                                                    <td>{{$res[$i][5]}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="table-responsive">
                                                            <table class="table wd_21">
                                                                <tr>
                                                                    <th>Specialization/Expertise</th>
                                                                    <td>{{$res[$i][6]}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Other Vital Information (Position Specific)
                                                                    </th>
                                                                    <td>{{$res[$i][7]}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        @php
                                        }
                                        @endphp
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade pd_0"><br>
                                <div class="collapse show">
                                    <div class="pd_0">
                                        <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="table-responsive">
                                                        <table class="table wd_21">
                                                            <tr>
                                                                <th>Technical Skills Rating</th>
                                                                <td>
                                                                    <div class="wd_73">
                                                                        <div class="row">
                                                                            @php
                                                                                $tech_skills='';
                                                                                $tech_skills=json_decode($view->technical_rating);
                                                                                $count2=count($tech_skills);
                                                                            @endphp
                
                                                                            @php
                                                                                for($k=0;$k<$count2;$k++){ 
                                                                            @endphp 
                                                                            <div class="col-md-8 p_right">
                                                                                <input type="text" class="form-control" name="technical[]" value="{{$tech_skills[$k]}}" readonly>
                                                                            </div>
                                                                            <div class="col-md-4 p_left">
                                                                                <div class="stars">
                                                                                    <input class="star star-5" id="star-5{{$k}}" type="radio" value="5" name="star_{{$k}}[]" @if(json_decode($view->technical_star_rating)[$k]==5)
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-5" for="star-5{{$k}}"></label>
                                                                                    <input class="star star-4" id="star-4{{$k}}" type="radio" value="4" name="star_{{$k}}[]" @if(json_decode($view->technical_star_rating)[$k]==4)
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-4" for="star-4{{$k}}"></label>
                                                                                    <input class="star star-3" id="star-3{{$k}}" type="radio" value="3" name="star_{{$k}}[]" @if(json_decode($view->technical_star_rating)[$k]==3)
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-3" for="star-3{{$k}}"></label>
                                                                                    <input class="star star-2" id="star-2{{$k}}" type="radio" value="2" name="star_{{$k}}[]" @if(json_decode($view->technical_star_rating)[$k]==2)
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-2" for="star-2{{$k}}"></label>
                                                                                    <input class="star star-1" id="star-1{{$k}}" type="radio" value="1" name="star_{{$k}}[]" @if(json_decode($view->technical_star_rating)[$k]==1)
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-1" for="star-1{{$k}}"></label>
                                                                                    
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
                                                                <th>Behavioural Skills Rating</th>
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
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-5" for="bstar-10{{$j}}">
                                                                                    </label>
                                                                                    <input class="star star-4" id="bstar-9{{$j}}" type="radio" value="4" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==4)
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-4" for="bstar-9{{$j}}"></label>
                                                                                    <input class="star star-3" id="bstar-8{{$j}}" type="radio" value="3" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==3)
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-3" for="bstar-8{{$j}}"></label>
                                                                                    <input class="star star-2" id="bstar-7{{$j}}" type="radio" value="2" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==2)
                                                                                    checked @endif disabled/>
                                                                                    <label class="star star-2" for="bstar-7{{$j}}"></label>
                                                                                    <input class="star star-1" id="bstar-6{{$j}}" type="radio" value="1" name="bstar_{{$j+50}}[]" @if(json_decode($view->behavioural_star_rating)[$j]==1)
                                                                                    checked @endif disabled/>
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
                                                                <th>Any Other Inputs</th>
                                                                <td>{{$view->other_inputs}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="table-responsive">
                                                        <table class="table wd_21">
                                                            <tr>
                                                                <th>Consultant Assessment</th>
                                                                <td>{!!$view->assessment!!}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Interview Availability</th>
                                                                <td>{{$view->interview_availability}}</td>
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
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home2">Position Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu4">Interview Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu5">Joining Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu6">Billing Details</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="home2" class="tab-pane pd_0 active"><br>
                            <table class="table wd_21">
                                <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Client</th>
                                        <th>Contact Person</th>
                                        <th>Contact Email</th>
                                        <th>Contact No.</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>{{optional($view->jobname)->job_title}}</td>
                                        <td>{{optional($view->view_nameofclient)->client_name}}</td>
                                        @php
                                        
                                        $spoc_name=App\Models\ClientContact::where('id',($view->jobname)->spoc_name)->get();
                                        
                                        @endphp
                                        <td>{{$spoc_name[0]->contact_name}}</td>
                                        <td>{{$spoc_name[0]->email}}</td>
                                        <td>{{$spoc_name[0]->mobile}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="menu4" class="tab-pane fade pd_0"><br>
                            <table class="table wd_21">
                                <thead>
                                    @php
                                        $interview_satge=App\Models\Interview::where('candidate_id',$view->id)->orderBy('id', 'DESC')->limit(1)->first();
                                        $inv_result=App\Models\InterviewStatus::where('candidate_id',$view->id)->get();
                                    @endphp
                                    <tr>
                                        <th>Interview Date</th>
                                        <th>Stage</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if(!empty ($interview_satge))


                                    @if(!empty ($inv_result))


                                    @foreach($inv_result as $interview_result)

                                    <tr>
                                        <td>
                                            {{date('j-F-Y', strtotime($interview_result->created_at))}}
                                        </td>
                                        <td>
                                            {{$interview_result->interview_stage}}
                                        </td>
                                        @php

                                        if($interview_result->interview_status==2)
                                        {
                                        $interview_status="Selected";
                                        $class="success";
                                        }

                                        elseif($interview_result->interview_status==3)
                                        {
                                        $interview_status=" Rejected";
                                        $class="danger";
                                        }
                                        @endphp
                                        <td>
                                            <span class="badge badge-default badge-{{$class}}">
                                                {{$interview_status}}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if($interview_satge->interview_status==0 || $interview_satge->interview_status==1)

                                    @if($interview_satge->interview_level !=null)
                                    <tr>
                                        <td>
                                            {{date('j-F-Y', strtotime($interview_satge->interview_date))}}
                                        </td>

                                        @php
                                        $interview_st_view='';
                                        if($interview_satge->interview_level==1)
                                        {
                                        $interview_st_view="First Interview";

                                        }
                                        elseif($interview_satge->interview_level==2)
                                        {
                                        $interview_st_view="Second Interview";
                                        }

                                        elseif($interview_satge->interview_level==3)
                                        {
                                        $interview_st_view="Third Interview";
                                        }
                                        elseif($interview_satge->interview_level==4)
                                        {
                                        $interview_st_view="Four Interview";
                                        }
                                        elseif($interview_satge->interview_level==5)
                                        {
                                        $interview_st_view="Final Interview";
                                        }
                                        @endphp

                                        <td>{{$interview_st_view}}</td>

                                        @php
                                        if($interview_satge->interview_status==0)
                                        {
                                        $interview_status="Schedule ";
                                        $class="warning";

                                        }
                                        elseif($interview_satge->interview_status==1)
                                        {
                                        $interview_status="Reschedule";
                                        $class="secondary";
                                        }

                                        elseif($interview_satge->interview_status==2)
                                        {
                                        $interview_status="Selected";
                                        $class="success";
                                        }

                                        elseif($interview_satge->interview_status==3)
                                        {
                                        $interview_status="Rejected";
                                        $class="danger";
                                        }

                                        @endphp

                                        <td><span class="badge badge-default badge-{{$class}}">{{$interview_status}}</span></td>
                                    </tr>
                                    @endif
                                    @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div id="menu5" class="tab-pane fade pd_0"><br>
                            <table class="table wd_21">
                                @php
                                    $offer = App\Models\JobOffer::where('candidate_id',$view->id)->get();
                                    $join_date = App\Models\JobOffer::where('candidate_id',$view->id)->orderBy('id', 'DESC')->limit(1)->first();
                                @endphp
                                <thead>
                                    <tr>
                                        <th>Offered Date</th>
                                        <th>Offerred CTC</th>
                                        <th>Joined Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if(count($offer) > 0)
                                        <td>{{date('j-F-Y',strtotime($offer[0]->job_offer_date))}}</td>
                                        <td>{{$offer[0]->offer_ctc}}</td>
                                        @endif
                                        @if($join_date !='')
                                        <td>{{date('j-F-Y',strtotime($join_date->job_joined_date))}}</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="menu6" class="tab-pane fade pd_0"><br>
                            <div class="">
                                <table class="table wd_21">
                                    <thead>
                                        @php
                                        $billing = App\Models\Billing::where('resume_id',$view->id)->get();
                                        @endphp
                                        <tr>
                                            <th>Billing Date</th>
                                            <th>Billing Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if(count($billing) > 0)
                                            <td>{{date('j-F-Y',strtotime($billing[0]->billing_date))}}</td>
                                            <td>{{$billing[0]->billing_amount}}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt_btn">
                    <a href="{{url('/resumeview')}}">
                        <button type="button" class="btn btn-primary">Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Form wizard with icon tabs section end -->
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