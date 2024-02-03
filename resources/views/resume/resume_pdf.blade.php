<!DOCTYPE html>
<html lang="en">

<head>
	<title>Snapshot Resume1</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<style>
		@font-face {
			font-family: 'calibri';
			font-weight: normal;
			font-style: normal;
			font-variant: normal;
			src: url("http://127.0.0.1:8000/vendor/dompdf/dompdf/lib/fonts/calibri.ttf") format("truetype");
		}
		@font-face {
			font-family: 'Cambria';
			font-weight: normal;
			font-style: normal;
			font-variant: normal;
			src: url("http://127.0.0.1:8000/vendor/dompdf/dompdf/lib/fonts/Cambria.ttf") format("truetype");
		}
		@font-face {
			font-family: 'ARIAL';
			font-weight: normal;
			font-style: normal;
			font-variant: normal;
			src: url("http://127.0.0.1:8000/vendor/dompdf/dompdf/lib/fonts/ARIAL.TTF") format("truetype");
		}
		
        .fnt_a {
            font-family: 'ARIAL'!important;
            
        }
		.wd_100p {
			width: 100%;
		}

		.logo {
			margin-bottom: 60px;
		}

		.profileof {
			font-size: 16px;
			margin-bottom: 0px;
			font-variant: small-caps;
			font-family: calibri!important;
		}

		.namem {
			font-weight: 600;
			font-size: 22px;
			margin-bottom: 0px;
			font-family: Cambria!important;
			color: #4f4f4f;
			text-transform: capitalize;
		}

		.bdr {
			height: 3px;
			width: 100%;
			border-top: 4px solid #626262;
			margin-top: 44px;
			border-radius: 34px;
			margin-bottom: 5px;
		}

		.confid {
			color: #7a7878;
			font-size: 15px;
			font-family: Cambria!important;
		}

		.candidate {
			font-size: 24px;
			margin-bottom: 0px;
			margin-top: 10px;
			color: rgb(255 165 0);
			font-style: italic;
			font-family: Cambria!important;
			font-weight: 600;
		}

		.webd {
			font-size: 15px;
			margin-bottom: 16px;
			margin-top: 0px;
			font-weight: 800;
			color: #8e55af;
			font-family: Arial!important;
			text-transform: capitalize;
		}

		.coname {
			font-size: 15px;
			font-weight: 600;
			margin-bottom: 0px;
			font-family: calibri!important;
		}

		.datet {
			font-size: 15px;
			margin-bottom: 16px;
			font-weight: 800;
			color: #8e55af;
			font-family: Arial!important;
			margin-top: 20px;
		}

		.mh18 {
			font-size: 14px;
			margin-bottom: 0px;
			font-weight: 600;
			color: #727272;
			font-family: Arial!important;
		}

		.lastline {
			margin-top: 140px;
			text-align: justify;
			color: #7a7878;
			font-family: Arial!important;
		}

		.bdr1 {
			height: 4px;
			width: 100%;
			border-top: 4px solid #626262;
			border-radius: 34px;
		}

		.cht {
			margin-top: 10px;
			text-align: justify;
			color: #5c5c5c;
			font-family: verdana;
			font-weight: 600;
			margin-bottom: 10px;
		}

		.tele {
			color: #373636;
			font-family: verdana;
			font-size: 12px;
		}

		.email {
			color: #373636;
			font-family: verdana;
			font-size: 12px;
			margin-top: 0px;
			margin-bottom: 0px;
		}

		.mb_89 {
			margin-bottom: 100px;
		}

		.mb_120 {
			margin-bottom: 180px;
		}

		.candipro {
			color: #836386;
			font-size: 21px;
			font-family: Arial!important;
			margin-bottom:0px;
		}

		.cvtop_logo {
			max-width: 161px;
		}

		.bg_pur {
			background-color: #826386;
		}

		.mb_12 {
			margin-bottom: 12px;
		}

		.mb_0 {
			margin-bottom: 0px;
		}

		.cl_w {
			color: white;
		}

		.pd_8 {
			padding: 3px;
		}

		.bdr_b1 {
			border-top: 1px solid #e9e9e9;
		}

		.pl_0 {
			padding-left: 0px;
		}

		.tech {
			padding: 0px;
			list-style-type: none;
			margin-left: 8px;
			margin-bottom: 0px;
			margin-top: 7px;
		}

		.tech li {
			display: inline-block;
			margin-right: 14px;
		}

		.tech li i {
			color: #ffa500;
			font-size: 11px;
			display: inline-block;
			margin-right: 4px;
		}

		.mt_22 {
			margin-top: 15px;
		}

		.cv_img {
			max-width: 123px;
			margin-left: auto;
			display: block;
		}

		.cvhding {
			margin-top: 43px;
			padding-left: 17px;
			margin-bottom: 12px;
			text-align: center;
			font-size: 25px;
		}

		.wh_fnt {
			font-family: auto;
			font-style: italic;
		}

		.cvnam {
			font-weight: 600;
			font-family: auto;
			margin-bottom: 0px;
		}

		.fw_600 {
			font-weight: 600;
		}

		.mb_10 {
			margin-bottom: 10px;
		}

		.gry_bg_txt {
			background-color: #cccccc;
			text-align: center;
			padding: 8px 0px;
			font-size: 26px;
			font-family: Arial!important;
			font-weight: 400;
		}

		.mt_12 {
			margin-top: 12px;
		}

		.mt_42 {
			margin-top: 30px;
		}

		.mx_202 {
			max-width: 202px;
		}

		.p_r {
			position: relative;
		}

		.rotatelogo {
			position: absolute;
			top: 50%;
			left: 35%;
			transform: rotate(-45deg);
			z-index: 1;
			opacity: 0.3;
		}

		.otl_1_p {
			outline: 1px solid #826386;
		}

		.mt_10 {
			margin-top: 10px;
		}

		.table-bordered {
			border: 1px solid #dee2e6;
		}

		.table {
			width: 100%;
			margin-bottom: 1rem;
			color: #212529;
		}

		table {
			border-collapse: collapse;
		}

		.table-bordered td,
		.table-bordered th {
			border: 1px solid #dee2e6;
		}

		.table td,
		.table th {
			padding: 8px;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}

		.mb_7 {
			margin-bottom: 5px;
		}
		.ml_10{
			margin-left:10px;
		}
		.table td{
			border: 1px solid #dee2e6;
		}
		ul{
		    padding-left: 16px;
            margin-top: 2px;
            margin-bottom: 2px;
		    }
		.skils{
		    list-style-type:none;
		    padding-left: 0px!important;
            margin-top: 2px;
            margin-bottom: 2px;
		    }
	    .table td, .table th {
            padding: 6px!important;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
	</style>
	<script type="text/javascript">
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>
</head>

<body>
	<div id="printableArea">
		<table style="width:100%;">
			<tr>
				<td><img src="{{ public_path('cthringlogo.png') }}" class="logo"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td style="text-align: center;">
					<p class="profileof" style="margin-top:40px;">Profile Of</p>
					<p class="namem" style="margin-top:0px;">{{$view->name}}</p>
					<p class="confid">(Confidential)</p>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<p class="bdr"></p>
					<p class="candidate ml_10">Candidate for</p>
					<p class="webd ml_10 fnt_a">{{optional($view->jobname)->job_title}}</p>
					<p class="coname ml_10">{{optional($view->view_nameofclient)->client_name}}</p>
					@php
					$client_cityname = App\Models\city::where('id', ($view->view_nameofclient)->city_id)->get('name');


					$client_statename = App\Models\State::where('state_id',
					($view->view_nameofclient)->state_id)->get('state_title');
					@endphp
					<p class="coname ml_10" style="margin-top:0px;">{{$client_cityname[0]->name}},
						{{$client_statename[0]->state_title}}
					</p>
					<p class="bdr"></p>
					<p class="candidate ml_10">Submitted by</p>
					<p class="webd ml_10">{{optional($view->username_of_resume)->fname}} {{optional($view->username_of_resume)->lname}}</p>
					<p class="coname ml_10">CareerTree HR Solutions</p>
					@php

					$user_loc_name=App\Models\client_location::where('id',($view->username_of_resume)->location_id)->get('location');


					@endphp
					<p class="coname ml_10" style="margin-top:0px;">{{$user_loc_name[0]->location}},
						India</p>
					<p class="bdr"></p>
					<p class="datet ml_10">{{ date('j-F-Y', strtotime($view->created_at))}}</p>
					<p class="mh18 ml_10">{{$view->resume_code}}</p>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p class="lastline">
						The Information in this report is strictly private and confident and is based on information provided by the candidate. Its use
						should be restricted to only those members of the company's management group who are directly involved with the selection of a candidate for the
						position concerned.
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p class="bdr1"></p>
				</td>
			</tr>
		</table>
		<table style="width:100%;">
			<tr>
				<td style="width: 40%;">
					<p class="cht">
						CareerTree HR Solutions
					</p>
					<!-- <p class="tele">
						T: +91-44-49004900
					</p> -->
				</td>
				<td style="width: 40%;">
					<p class="email ml_10">
						Email: hiring@career-tree.in
					</p>
				</td>
				<td>
					<p class="email" style="text-align:right;">
						Website: www.career-tree.in
					</p>
				</td>
			</tr>
		</table>
		<table class="table" style="width:100%;font-family:Arial;text-transform: capitalize;">
			<tr>
				<td colspan="3" style="border:unset;">
					<h1 class="candipro">CANDIDATE PROFILE SNAPSHOT
						<img src="{{ public_path('cthringlogo.png') }}" class="cvtop_logo" style="float:right;">
					</h1>
				</td>
			</tr>
			<tr class="bg_pur">
				<td class="mb_0 cl_w pd_8 otl_1_p" style="width:4%; font-family:verdana;">S.No</td>
				<td class="mb_0 cl_w pd_8 otl_1_p" style="width:35%;">Criteria</td>
				<td class="mb_0 cl_w pd_8 otl_1_p">Candidate Credentials</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">1</td>
				<td class="mb_0 pd_8 bdr_b1">Profile for the Position of</td>
				<td class="mb_0 pd_8 bdr_b1">{{($view->jobname)->job_title}}</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">2</td>

				<td class="mb_0 pd_8 bdr_b1">Name of the Candidate</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->name}}</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">3</td>

				<td class="mb_0 pd_8 bdr_b1">Gender</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->gender}}</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">4</td>

				<td class="mb_0 pd_8 bdr_b1">Qualification</td>

				<td class="mb_0 pd_8 bdr_b1">@php
					$count=count($result_pdf);
					for($i=0;$i<$count;$i++) { @endphp <p class="mb_0 pd_8" style="margin-top:0px;">
						{{$result_pdf[$i][0]}},

						@php
						$resm_deg=App\Models\Degree::where('id',$result_pdf[$i][1])->get();
						$resm_specialization = App\Models\Specialization::where('id', $result_pdf[$i][2])->get();

						@endphp
						@foreach ($resm_deg as $resum_degree)
						{{$resum_degree->degree}},
						@endforeach


						@foreach ($resm_specialization as $resm_speciali)
						{{$resm_speciali->specialization_name}},
						@endforeach

						{{$result_pdf[$i][3]}},
						{{$result_pdf[$i][4]}}%,


						</p>

						@php }
						@endphp</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">5</td>

				<td class="mb_0 pd_8 bdr_b1">Career Graph</td>

				<td class="mb_0 pd_8 bdr_b1"> @php
					$count=count($result_pdf_car);
					for($i=0;$i<$count;$i++) { @endphp <p class="mb_0 pd_8" style="margin-top:0px;">
						{{date('F Y', strtotime($result_pdf_car[$i][0]))}} To
						{{date('F Y', strtotime($result_pdf_car[$i][1]))}},


						{{$result_pdf_car[$i][2]}},
						{{$result_pdf_car[$i][3]}},
						{{$result_pdf_car[$i][4]}}




						</p>
						@php }
						@endphp</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">6</td>

				<td class="mb_0 pd_8 bdr_b1">Areas of Expertise</td>

				<td class="mb_0 pd_8 bdr_b1"> 
					@php
						$count=count($result_pdf_car);
						for($i=0;$i<$count;$i++) { 
					@endphp {{$res_pdf[$i][0]}} 
					@php 
						} 
					@endphp
				</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">7</td>

				<td class="mb_0 pd_8 bdr_b1">Total Years of Experience</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->year_experience}} Years {{$view->month_experience}} Months</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">8</td>

				<td class="mb_0 pd_8 bdr_b1">Current Location of Work</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->present_location}}</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">9</td>

				<td class="mb_0 pd_8 bdr_b1">Native Location of Work</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->native_location}}</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">10</td>

				<td class="mb_0 pd_8 bdr_b1">Current CTC</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->ctc_min}} Per Annum</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">11</td>

				<td class="mb_0 pd_8 bdr_b1">Expected CTC</td>

				<td class="mb_0 pd_8 bdr_b1">{{ $view->ctc_max}} Per Annum</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">12</td>

				<td class="mb_0 pd_8 bdr_b1">Notice Period</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->notice_period}}</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">13</td>

				<td class="mb_0 pd_8 bdr_b1">Date of Birth / Age</td>
                @php
                    $bday = new DateTime($view->dob); // Your date of birth
                    $today = new Datetime(date('y-m-d'));
                    $diff = $today->diff($bday);
                @endphp
				<td class="mb_0 pd_8 bdr_b1">{{ date('j-F-Y', strtotime($view->dob)) }} / {{$diff->y}} Yrs</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">14</td>

				<td class="mb_0 pd_8 bdr_b1">Marital Status</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->marital_status}}</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">15</td>

				<td class="mb_0 pd_8 bdr_b1">Family (Dependents)</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->family_dependent}}</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">16</td>

				<td class="mb_0 pd_8 bdr_b1"><strong>Technical Skills</strong></td>

				<td class="mb_0 pd_8 bdr_b1">
					<ul class="skils">
						@php
						$count=count(json_decode($view->technical_rating));
						@endphp

						@for($i=0;$i<$count;$i++) <li>
							{{json_decode($view->technical_rating)[$i]}}
							@for($j=0;$j<json_decode($view->technical_star_rating)[$i];$j++)
								<img src="{{ public_path('dummy.png') }}" alt="" style="width: 10px; height: 10px">
								@endfor
								</li>
								@endfor
					</ul>
				</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">17</td>

				<td class="mb_0 pd_8 bdr_b1"><strong>Behavioral Skills</strong></td>

				<td class="mb_0 pd_8 bdr_b1">
					<ul class="skils">
						@php
						$count=count(json_decode($view->behavioural_rating));
						@endphp
						@for($i=0;$i<$count;$i++) <li>
							{{json_decode($view->behavioural_rating)[$i]}}
							@for($j=0;$j<json_decode($view->behavioural_star_rating)[$i];$j++)
								<img src="{{ public_path('dummy.png') }}" alt="" style="width: 10px; height: 10px">
								@endfor
								</li>
								@endfor
					</ul>
				</td>
			</tr>
			<tr>
				<td class="mb_0 pd_8 bdr_b1">18</td>

				<td class="mb_0 pd_8 bdr_b1">Consultant Assessment</td>

				<td class="mb_0 pd_8 bdr_b1">{!!$view->assessment!!}</td>

			</tr>
			<tr>

				<td class="mb_0 pd_8 bdr_b1">19</td>

				<td class="mb_0 pd_8 bdr_b1">Other Inputs</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->other_inputs}}</td>

			</tr>

			<tr>
				<td class="mb_0 pd_8 bdr_b1">20</td>

				<td class="mb_0 pd_8 bdr_b1">Interview Availability</td>

				<td class="mb_0 pd_8 bdr_b1">{{$view->interview_availability}}</td>
			</tr>
			<tr>
				<td colspan="3" style="border: unset;">
					<p class="mb_0 mt_22" style="text-align:center;">Created by <span style="color:#836386;font-weight: 600;">CareerTree HR Solutions.</span></p>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>