<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .border {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <div style="border-radius: 4px;background-image: linear-gradient(0deg, #0072ac24, transparent);">
        <table style="position: relative; top: -4px; padding-bottom: 8px; width: 100%" class="border">


            @php
            $spoc_id=App\Models\Position::where('position_id',$view->position_id)->first('crm');
            $crm_name=json_decode($spoc_id->crm);
            $user_details=App\Models\User::where('id',$crm_name)->first(['name','signature']);
            @endphp

            <tr>
                <td style="width: 100%">

                    <p style="font-family: verdana;
                text-align: left;
                margin: 0px;
                color: #484546;
                line-height: 140%;
                word-wrap: break-word;
                padding-top: 6px;
                text-decoration: capitalize;">



                        <b>Dear Mr. {{($view->pos_client_cont)->contact_name}} ,</br> </b>
                    </p>

                    @php
                    $crm_name=App\Models\User::where('id',session('USER_ID'))->get(['fname','lname']);
                    @endphp
                    <p style="

                font-family: verdana;
                text-align: left;
                margin: 0px;
                color: #484546;
                line-height: 140%;
                word-wrap: break-word;
                padding-top: 6px;
                text-decoration: capitalize;
              ">
                        Greetings from <mark>{{$crm_name[0]->fname}} {{$crm_name[0]->lname}}</mark>,
                    </p>
                    <p style="

                font-family: verdana;
                text-align: left;
                margin: 0px;
                color: #484546;
                line-height: 140%;
                word-wrap: break-word;
                padding-top: 6px;
              ">
                        Based on the Job Specification shared / revised on <mark>{{ date('j F-Y', strtotime($view->updated_at)) }} </mark> for <br>this position, I have sourced the following CVs and the same is attached herewith for your review.
                    </p>
                    <p style="

            font-family: verdana;
            text-align: left;
            margin: 0px;
            color: #484546;
            line-height: 140%;
            word-wrap: break-word;
            padding-top: 6px;
          ">
                        Kindly go through the CVs and share the details of shortlisted CVs for their interview line-up.
                        {{$res_show ->name}}</br>
                    </p>
                </td>


            </tr>
        </table>
        <table style="width: 100%;border: 1px solid #000;border-collapse: collapse;margin-bottom:15px;">
            <tr>
                <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">S. No</th>
                <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">Candidate Name</th>
                <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">Present Company</th>
                <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">Present Designation</th>
                <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">Cv Password</th>

            </tr>
            <tr>
                <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">1</td>
                <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">{{$res_show ->name}}</td>
                @php
                $resume_company = json_decode($res_show ->companyname);
                $count=count($resume_company);
                @endphp


                <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">
                    @for($i=0;$i<$count;$i++) {{$resume_company[$i]}} <br>
                        @endfor
                </td>


                <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">{{$res_show ->current_designation}}</td>
                <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">{{$res_show ->rand_password_pdf}}</td>

            </tr>

        </table>
        <table style="width: 100%;">

            <tr>
                <td>
                    <p style="

                font-family: verdana;
                text-align: left;
                margin: 0px;
                color: #484546;
                line-height: 140%;
                word-wrap: break-word;
                padding-top: 6px;
              ">
                        Trust you find these candidates suitable. Please do let me know if there requires any further <br>information about the candidate(s) which are not available in the CVs.
                    </p>


                    <p style="

                font-family: verdana;
                text-align: left;
                margin: 0px;
                color: #484546;
                line-height: 140%;
                word-wrap: break-word;
                padding-top: 6px;
              ">
                        <!-- {{$user_details->name}} -->
                    </p>


                </td>
            </tr>
        </table>

        <div class="" style="overflow-x: auto;">
            <p style="font-family: verdana;
                    text-align: left;
                    margin: 0px;
                    color: #484546;
                    line-height: 140%;
                    padding-top: 6px;">

                {!! $user_details->signature !!}
            </p>
            
        </div>

        @php
        $resume_status_send_client= App\Models\Resume::where('cv_status','>=',1)
        ->where('position_id','=',$res_show ->position_id)
        ->get();
        @endphp



        @if(count($resume_status_send_client) > 0)


        <div class="" style="overflow-x: auto;">
            <p style="

                font-family: verdana;
                text-align: left;
                margin: 0px;
                color: #484546;
                line-height: 140%;
                word-wrap: break-word;
                padding-top: 6px;
                ">
                For your reference, I am also sharing the details of CVs shared earlier for this position and its current status.
            </p>
            <table style="width: 100%;border: 1px solid #000;border-collapse: collapse;margin-bottom:15px;">
                <tr>
                    <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">S. No</th>
                    <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">Candidate Name</th>
                    <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">Present Company</th>
                    <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">Present Designation</th>
                    <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">CV Submitted on</th>
                    <th style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">Present Status</th>
                </tr>
                @foreach ($resume_status_send_client as $key => $resume_status_send )

                @php
                $present_resume_company = json_decode($resume_status_send ->companyname);
                $count=count($present_resume_company);
                @endphp


                <tr>
                    <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">{{$key + 1}}</td>
                    <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">{{$resume_status_send ->name}}</td>
                    <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">
                        @for($i=0;$i<$count;$i++) {{$present_resume_company[$i]}} <br>
                            @endfor
                    </td>
                    <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">{{$resume_status_send ->current_designation}}</td>
                    <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">{{date('j-F-Y', strtotime($resume_status_send ->created_at))}}</td>
                    @php
                    $cv_stage='';
                    if($resume_status_send->cv_status == 0){
                    $cv_stage="CV not send";
                    }

                    elseif($resume_status_send->cv_status == 1){
                    $cv_stage="CV Sent";
                    }

                    elseif($resume_status_send->cv_status == 2){
                    $cv_stage="Shortlisted";
                    }

                    elseif($resume_status_send->cv_status == 3){
                    $cv_stage="Rejected";
                    }

                    elseif($resume_status_send->cv_status == 4){
                    $cv_stage="First Interview Schedule";
                    }

                    elseif($resume_status_send->cv_status == 5){
                    $cv_stage="First Reschedule";
                    }

                    elseif($resume_status_send->cv_status == 6){
                    $cv_stage="First Selected";
                    }

                    elseif($resume_status_send->cv_status == 7){
                    $cv_stage="First Rejected";
                    }

                    elseif($resume_status_send->cv_status == 8){
                    $cv_stage="Second Interview Schedule";
                    }

                    elseif($resume_status_send->cv_status == 9){
                    $cv_stage="Second Reschedule";
                    }

                    elseif($resume_status_send->cv_status == 10){
                    $cv_stage="Second Selected";
                    }

                    elseif($resume_status_send->cv_status == 11){
                    $cv_stage="Second Rejected";
                    }

                    elseif($resume_status_send->cv_status == 12){
                    $cv_stage="Third Interview Schedule";
                    }

                    elseif($resume_status_send->cv_status == 13){
                    $cv_stage="Third Reschedule";
                    }

                    elseif($resume_status_send->cv_status == 14){
                    $cv_stage="Third Selected";
                    }

                    elseif($resume_status_send->cv_status == 15){
                    $cv_stage="Third Rejected";
                    }

                    elseif($resume_status_send->cv_status == 16){
                    $cv_stage="Fourth Interview Schedule";
                    }

                    elseif($resume_status_send->cv_status == 17){
                    $cv_stage="Fourth Reschedule";
                    }

                    elseif($resume_status_send->cv_status == 18){
                    $cv_stage="Fourth Selected";
                    }

                    elseif($resume_status_send->cv_status == 19){
                    $cv_stage="Fourth Rejected";
                    }

                    elseif($resume_status_send->cv_status == 20){
                    $cv_stage="Final Interview Schedule";
                    }

                    elseif($resume_status_send->cv_status == 21){
                    $cv_stage="Final Reschedule";
                    }

                    elseif($resume_status_send->cv_status == 22){
                    $cv_stage="Final Selected";
                    }

                    elseif($resume_status_send->cv_status == 23){
                    $cv_stage="Final Rejected";
                    }

                    elseif($resume_status_send->cv_status == 24){
                    $cv_stage="Offer Accepted";
                    }

                    elseif($resume_status_send->cv_status == 25){
                    $cv_stage="Offer Rejected";
                    }

                    elseif($resume_status_send->cv_status == 26){
                    $cv_stage="Joined";
                    }

                    elseif($resume_status_send->cv_status == 27){
                    $cv_stage="Not Joined";
                    }

                    elseif($resume_status_send->cv_status == 28){
                    $cv_stage="Deferred";
                    }

                    elseif($resume_status_send->cv_status == 29){
                    $cv_stage="Billed";
                    }


                    @endphp
                    <td style="border-bottom: 1px solid #000;border-collapse: collapse;border-right: 1px solid #000;">{{$cv_stage}}</td>

                </tr>
                @endforeach
            </table>
        </div>

        @endif
    </div>
</body>

</html>