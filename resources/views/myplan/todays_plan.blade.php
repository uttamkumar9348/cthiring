<x-admin-layout>
	<style>
		.select2 {
			width: 100% !important;
		}

		.pd_0 {
			padding: 0px;
		}

		/* .flx_wrp {
			display: flex;
			flex-wrap: wrap;
			padding-left: 0px;
			padding-right: 0px;
		} */

		.flx_wrp {
			display: table-row;
			padding-left: 0px;
			padding-right: 0px;
		}

		.hide {
			display: none;
		}
	</style>
	<div class="content-header row head_bdr">
		<div class="content-header-left col-md-12 col-12 breadcrumb-new">
			<div class="row breadcrumbs-top d-inline-block">
				<div class="breadcrumb-wrapper col-12">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
						<li class="breadcrumb-item">My plan</li>
						<li class="breadcrumb-item active">Add Task plan</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<div class="row match-height">
		<div class="col-md-12 pd_0">
			<form action="{{url('/todays_plan_insert')}}" method="POST">
				@csrf
				<!-- Form wizard with icon tabs section start -->
				<div class="row" style="margin-left:0px;margin-right:0px;">
					<div class="col-md-6 p_left">
						<table class="table wd_21">
							<tr>
								<th>
									<label for="">Work Plan<span class="text-danger">*</span></label>
								</th>
								<td>
									@php
									    $ldate = date('Y-m-d');
    									$yesterday = date("Y-m-d", strtotime( '-1 days' ) );
    									$day_before_yesterday = date("Y-m-d", strtotime( '-2 days' ) );
    									$user = App\Models\User::where('id',session('USER_ID'))->first();
    									
    									$myplan = App\Models\myplan::orderBy('task_date', 'desc')->where('task_date',$ldate)->where('created_by',session('USER_ID'))
                                            ->where('work_plan_type','Sourcing')->get();
            	                        $myplan1 = App\Models\myplan::orderBy('task_date', 'desc')->where('task_date', $yesterday)->where('created_by',session('USER_ID'))->first();
            	
    									$leave = App\Models\Leave::where('user_id',$user->id)->orderBy('id', 'DESC')->first();
                                        
                                        $new_user =  date('Y-m-d',strtotime($user->created_at));
    									
    									if(count($myplan) > 0)
                                        {
                        				    $task = $myplan[0]->task_date;
                        				}
                        				elseif($myplan1 != null)
                        				{
                            			    $task = $myplan1->task_date;
                            			}
                            			else
                            			{
                                		    $myplan2 = App\Models\myplan::orderBy('task_date', 'desc')->where('created_by',session('USER_ID'))->first();
                                		    if(!empty($myplan2)){
                                		        $task = $myplan2->task_date;
                                		    }else{
                                		        
                                                $task = $new_user;
                                                
                                            }
                            			}
                    				    $create = date('Y-m-d',strtotime($task));
                    				    
    									if($leave != null){
    									    $leaves = $leave->leave_to;
    									}else{
    									    $leaves = $ldate;
    									}
									@endphp 
									
	                                @if ($myplan != null || $leaves == $yesterday || $new_user == $ldate)
	                                
    									@if ($create == $yesterday || $leaves == $yesterday || $create == $ldate || $new_user == $ldate)
    									    <input type="radio" id="input-radio-1" name="day_plan" value="1">
    									@else
    									    <input type="radio" id="input-radio-1" name="day_plan" value="1" disabled>
    									@endif
    									
									@else
									    <input type="radio" id="input-radio-1" name="day_plan" value="1" disabled>
									@endif
									    <label for="input-radio-11">Current Day Plan</label>

									@if ($create == $yesterday || $leaves == $yesterday || $new_user == $ldate || $create < $day_before_yesterday && $leaves != $day_before_yesterday)
									    <input type="radio" id="input-radio-2" name="day_plan" value="2" disabled>
									@else
									    <input type="radio" id="input-radio-2" name="day_plan" value="2">
									@endif

    									<label for="input-radio-11">Previous Day Plan</label>
    									
    									<input type="radio" id="input-radio-3" name="day_plan" value="3">
    									<label for="input-radio-11">Long Leave</label>
								</td>
							</tr>
							<tr id="taskdate">
								<th>
									<label for="">Task Date<span class="text-danger">*</span></label>
								</th>
								<td>
									<div class="row wd_58">
										<div class="col-md-6">
											<h6>From</h6>
											<div class="input-group">
												<input type="date" name="from_date" class="form-control" />
											</div>
										</div>
										<div class="col-md-6">
											<h6>To</h6>
											<div class="input-group">
												<input type="date" name="to_date" class="form-control" />
											</div>
										</div>
									</div>
								</td>
							</tr>
							
							<tr class="hide flx_wrp session">
								<th>
									<label for="">Task Date<span class="text-danger">*</span></label>
								</th>
								<td>
									
									@if ($myplan != NULL || $leaves == $yesterday || $new_user == $ldate)
									
    									@if ($create == $yesterday || $leaves != $yesterday || $create == $ldate || $new_user == $ldate)
    									    <input type="date" id="demo" name="date" class="form-control wd_30">
    									@else
    									    <input type="date" id="demo1" name="date" class="form-control wd_30">
    									@endif
									@else
									    <input type="date" id="demo1" name="date" class="form-control wd_30">
									@endif
								</td>
							</tr>
							<tr class="session">
								<th>
									<label for="">Session<span class="text-danger">*</span></label>
								</th>
								<td>
									<label class="checkbox-inline">
										<input type="checkbox" class="mr_5" id="fullday" name="work_time_period" value="Fullday">Fullday
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" class="mr_5" id="forenoon" name="work_time_period1" value="Forenoon">Forenoon
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" class="mr_5" id="afternoon" name="work_time_period2" value="Afternoon">Afternoon
									</label>
								</td>
							</tr>
							<tr id="session_type">
								<th>
									<label for="">Work Plan Type<span class="text-danger">*</span></label>
								</th>
								<td>
									@if ($myplan != NULL || $leaves == $yesterday || $new_user == $ldate)
    									@if ($create == $yesterday || $leaves != $yesterday || $create == $ldate || $new_user == $ldate)
    									    <input type="radio" id="input-radio-6" name="plantype" value="Sourcing">
    									@else
    									    <input type="radio" id="input-radio-6" name="plantype" value="Sourcing" disabled>
    									@endif
									@else
									    <input type="radio" id="input-radio-6" name="plantype" value="Sourcing" disabled>
									@endif
    									<label for="input-radio-11">Sourcing</label>
    									<input type="radio" id="input-radio-7" name="plantype" value="Others">
    									<label for="input-radio-11">Others</label>
								</td>
							</tr>
							<tr id="session_type1">
								<th>
									<label for="">Work Plan Type(Forenoon)<span class="text-danger">*</span></label>
								</th>
								<td>
									@if ($myplan != NULL || $leaves == $yesterday || $new_user == $yesterday)
    									@if ($create == $yesterday || $leaves == $yesterday || $create == $ldate)
    									    <input type="radio" id="input-radio-8" name="plantype1" value="Sourcing">
    									@else
    									    <input type="radio" id="input-radio-8" name="plantype1" value="Sourcing" disabled>
    									@endif
									@else
									    <input type="radio" id="input-radio-8" name="plantype1" value="Sourcing" disabled>
									@endif
    									<label for="input-radio-11">Sourcing</label>
    									<input type="radio" id="input-radio-9" name="plantype1" value="Others">
    									<label for="input-radio-11">Others</label>
								</td>
							</tr>
							<tr class="div3">
								<th>
									<label for="">Client Name<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" id="client_name" name="clientname1">
										<option value="">Select</option>
										@foreach ($client1 as $client2)
										<option value="{{$client2->id}}">{{$client2->client_name}}</option>
										@endforeach
									</select>
								</td>
							</tr>
							<tr class="div3">
								<th>
									<label for="">Position<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" id="position_name" name="positionname1">

									</select>
								</td>
							</tr>
							<tr class="div4">
								<th>
									<label for="">Options<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" name="option1">
										<option value="">Select</option>
										<option value="Client Meeting">Client Meeting</option>
										<option value="Internal Meeting">Internal Meeting</option>
										<option value="Internal Review">Internal Review</option>
										<option value="Internal Training">Internal Training</option>
										<option value="External Training">External Training</option>
										<option value="Events / Celebration">Events / Celebration</option>
										<option value="On Special Assignment">On Special Assignment</option>
										<option value="Unwell at Office">Unwell at Office</option>
										<option value="On Leave">On Leave</option>
										<option value="Holiday">Holiday</option>
										<option value="Weekly Off">Weekly Off</option>
										<option value="Others">Others</option>
									</select>
								</td>
							</tr>
							<tr class="div4">
								<th>
									<label for="">Subject<span class="text-danger">*</span></label>
								</th>
								<td>
									<input type="text" class="form-control wd_58" name="subject1" aria-invalid="false">
								</td>
							</tr>
						</table>
					</div>

					<div class="col-md-6 p_right">
						<table class="table wd_21">
							<tr id="session_type2">
								<th>
									<label for="">Work Plan Type(Afternoon)<span class="text-danger">*</span></label>
								</th>
								<td>
									@if ($myplan != NULL || $leaves == $yesterday || $new_user == $yesterday)
									
    									@if ($create == $yesterday || $leaves == $yesterday || $create == $ldate)
    									    <input type="radio" id="input-radio-10" name="plantype2" value="Sourcing">
    									@else
    									    <input type="radio" id="input-radio-10" name="plantype2" value="Sourcing" disabled>
    									@endif
    									
									@else
									    <input type="radio" id="input-radio-10" name="plantype2" value="Sourcing" disabled>
									@endif
    									<label for="input-radio-11">Sourcing</label>
    									<input type="radio" id="input-radio-11" name="plantype2" value="Others">
    									<label for="input-radio-11">Others</label>
								</td>
							</tr>
							<tr class="div5">
								<th>
									<label for="">Client Name<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" id="client_name1" name="clientname2">
										<option value="">Select</option>
										@foreach ($client1 as $client2)
										<option value="{{$client2->id}}">{{$client2->client_name}}</option>
										@endforeach
									</select>
								</td>
							</tr>
							<tr class="div5">
								<th>
									<label for="">Position<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" id="position_name1" name="positionname2">

									</select>
								</td>
							</tr>
							<tr class="div6">
								<th>
									<label for="">Options<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" name="option2">
										<option value="">Select</option>
										<option value="Client Meeting">Client Meeting</option>
										<option value="Internal Meeting">Internal Meeting</option>
										<option value="Internal Review">Internal Review</option>
										<option value="Internal Training">Internal Training</option>
										<option value="External Training">External Training</option>
										<option value="Events / Celebration">Events / Celebration</option>
										<option value="On Special Assignment">On Special Assignment</option>
										<option value="Unwell at Office">Unwell at Office</option>
										<option value="On Leave">On Leave</option>
										<option value="Holiday">Holiday</option>
										<option value="Weekly Off">Weekly Off</option>
										<option value="Others">Others</option>
									</select>
								</td>
							</tr>
							<tr class="div6">
								<th>
									<label for="">Subject<span class="text-danger">*</span></label>
								</th>
								<td>
									<input type="text" class="form-control wd_58" name="subject2" aria-invalid="false">
								</td>
							</tr>
							<tr class="div1">
								<th>
									<label for="">Client Name<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" id="client_name2" name="clientname">
										<option value="">Select</option>
										@foreach ($client1 as $client2)
										<option value="{{$client2->id}}">{{$client2->client_name}}</option>
										@endforeach
									</select>
								</td>
							</tr>
							<tr class="div1">
								<th>
									<label for="">Position<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" id="position_name2" name="positionname">

									</select>
								</td>
							</tr>
							<tr class="div2">
								<th>
									<label for="">Options<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" name="option">
										<option value="">Select</option>
										<option value="Client Meeting">Client Meeting</option>
										<option value="Internal Meeting">Internal Meeting</option>
										<option value="Internal Review">Internal Review</option>
										<option value="Internal Training">Internal Training</option>
										<option value="External Training">External Training</option>
										<option value="Events / Celebration">Events / Celebration</option>
										<option value="On Special Assignment">On Special Assignment</option>
										<option value="Unwell at Office">Unwell at Office</option>
										<option value="On Leave">On Leave</option>
										<option value="Holiday">Holiday</option>
										<option value="Weekly Off">Weekly Off</option>
										<option value="Others">Others</option>
									</select>
								</td>
							</tr>
							<tr class="div2">
								<th>
									<label for="">Subject<span class="text-danger">*</span></label>
								</th>
								<td>
									<input type="text" class="form-control wd_58" name="subject" aria-invalid="false">
								</td>
							</tr>
							<tr class="taskdate1">
								<th>
									<label for="">Leave Type<span class="text-danger">*</span></label>
								</th>
								<td>
									<select class="form-control wd_58" name="leavetype">
										<option value="">Select</option>
										<option value="Need Based Leave">Need Based Leave</option>
										<option value="privileged Leave">privileged Leave</option>
										<option value="On Duty">On Duty</option>
										<option value="Loss of Pay">Loss of Pay</option>
										<option value="Maternity Leave">Maternity Leave</option>
										<option value="Paternity Leave">Paternity Leave</option>
									</select>
								</td>
							</tr>
							<tr class="taskdate1">
								<th>
									<label for="">Reason<span class="text-danger">*</span></label>
								</th>
								<td>
									<textarea class="form-control wd_58" name="reason"></textarea>
									<input type="hidden" id="input-radio-1" name="session" value="Full Day">
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
						 Cancel
					</button>
					<button type="submit" class="btn btn-primary">
						 Save
					</button>
				</div>
			</form>
		</div>
	</div>
	<!-- full day check box -->
	<script>
		$('#fullday').on('click', function() {
			if (this.checked) {
				$('#forenoon').prop("disabled", true);
				$('#afternoon').prop("disabled", true);
				$('#session_type').show();
			} else {
				$('#forenoon').prop("disabled", false);
				$('#afternoon').prop("disabled", false);
				$('#session_type').hide();
				$(".div1").hide();
				$(".div2").hide();
				$('.div3').hide();
				$('.div4').hide();
				$('.div5').hide();
				$('.div6').hide();
			}
		});
		$('#forenoon').on('click', function() {
			if (this.checked) {
				$('#fullday').prop("disabled", true);
				$('#session_type1').show();

			} else {
				$('#fullday').prop("disabled", false);
				$('#session_type1').hide();
				$(".div1").hide();
				$(".div2").hide();
				$('.div3').hide();
				$('.div4').hide();
			}
		});
		$('#afternoon').on('click', function() {
			if (this.checked) {
				$('#fullday').prop("disabled", true);
				$('#session_type2').show();

			} else {
				$('#fullday').prop("disabled", false);
				$('#session_type2').hide();
				$(".div1").hide();
				$(".div2").hide();
				$('.div5').hide();
				$('.div6').hide();
			}
		});

		$('#input-radio-6').on('click', function() {
			$(".div1").show();
			$(".div2").hide();
		});
		$('#input-radio-7').on('click', function() {
			$(".div1").hide();
			$(".div2").show();
		});
		$('#input-radio-8').on('click', function() {
			$(".div3").show();
			$(".div4").hide();
		});
		$('#input-radio-9').on('click', function() {
			$(".div3").hide();
			$(".div4").show();
		});
		$('#input-radio-10').on('click', function() {
			$(".div5").show();
			$(".div6").hide();
		});
		$('#input-radio-11').on('click', function() {
			$(".div5").hide();
			$(".div6").show();
		});
	</script>

	<!-- current calender date disable -->
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

		$("#demo").attr("min", minDate);

		console.log(minDate);
	</script>
	<!-- current calender date disable -->

	<!-- previous calender date disable -->
	<script>
		var todayDate = new Date();

		var month = todayDate.getMonth() + 1; // current month

		var year = todayDate.getUTCFullYear(); //current year

		var tdate = todayDate.getDate() - 1; //current date 

		if (month < 10) {

			month = "0" + month //'0' + 4 = 04

		}

		if (tdate < 10) {

			tdate = "0" + tdate;

		}

		var maxDate = year + "-" + month + "-" + tdate;

		$("#demo1").attr("max", maxDate);

		console.log(maxDate);
	</script>
	<!-- previous calender date disable -->
	<script>
		$(document).ready(function() {
			//initialize the show hide functuion
			$('#taskdate').hide();
			$('.taskdate1').hide();
			$('.session').hide();
			$('#session_type').hide();
			$('#session_type1').hide();
			$('#session_type2').hide();
			$('#sourcing').hide();
			$(".div1").hide();
			$(".div2").hide();
			$('.div3').hide();
			$('.div4').hide();
			$('.div5').hide();
			$('.div6').hide();


			// for long leave        
			$('#input-radio-3').on('click', function() {
				$('#taskdate').show();
				$('.taskdate1').show();
				$('.session').hide();
				$('#session_type').hide();
				$('#session_type1').hide();
				$('#session_type2').hide();
				$('#forenoon').prop("checked", false);
				$('#afternoon').prop("checked", false);
				$('#fullday').prop("checked", false);
				$(".div1").hide();
				$(".div2").hide();
				$('.div3').hide();
				$('.div4').hide();
				$('.div5').hide();
				$('.div6').hide();
			})

			//current day plan
			$('#input-radio-1').on('click', function() {
				$('#taskdate').hide();
				$('.taskdate1').hide();
				$('.session').show();
				$('#session_type').hide();
				$('#session_type1').hide();
				$('#session_type2').hide();
			})


			//previous day plan
			$('#input-radio-2').on('click', function() {
				$('#taskdate').hide();
				$('.taskdate1').hide();
				$('.session').show();
				$('#session_type').hide();
				$('#session_type1').hide();
				$('#session_type2').hide();
				$(".div1").hide();
				$(".div2").hide();
				$('.div3').hide();
				$('.div4').hide();
				$('.div5').hide();
				$('.div6').hide();
				$('#fullday').prop("checked", false);
				$('#forenoon').prop("checked", false);
				$('#afternoon').prop("checked", false);
				$('#fullday').prop("disabled", false);
				$('#forenoon').prop("disabled", false);
				$('#afternoon').prop("disabled", false);
			})

			function calculContoEco() {
				$i = 0;
				console.log($i);
				$i++;
			}
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#client_name').on('change', function() {
				var client_name = this.value;
				$('#position_name').html('');
				$.ajax({
					url: "{{url('position_fetch_plan')}}",
					type: "POST",
					data: {
						client_name: client_name,
						_token: '{{csrf_token()}}'
					},
					dataType: 'json',
					success: function(result) {
						$('#position_name').html('<option value="">Select Position</option>');
						$.each(result.positionname, function(key, value) {
							$("#position_name").append('<option value="' + value
								.position_id + '">' +
								value.job_title + '</option>');
						});
					}

				});

			});

		});

		$(document).ready(function() {
			$('#client_name1').on('change', function() {
				var client_name = this.value;
				$('#position_name1').html('');
				$.ajax({
					url: "{{url('position_fetch_plan')}}",
					type: "POST",
					data: {
						client_name: client_name,
						_token: '{{csrf_token()}}'
					},
					dataType: 'json',
					success: function(result) {
						$('#position_name1').html('<option value="">Select Position</option>');
						$.each(result.positionname, function(key, value) {
							$("#position_name1").append('<option value="' + value
								.position_id + '">' +
								value.job_title + '</option>');
						});
					}

				});

			});

		});

		$(document).ready(function() {
			$('#client_name2').on('change', function() {
				var client_name = this.value;
				$('#position_name2').html('');
				$.ajax({
					url: "{{url('position_fetch_plan')}}",
					type: "POST",
					data: {
						client_name: client_name,
						_token: '{{csrf_token()}}'
					},
					dataType: 'json',
					success: function(result) {
						$('#position_name2').html('<option value="">Select Position</option>');
						$.each(result.positionname, function(key, value) {
							$("#position_name2").append('<option value="' + value
								.position_id + '">' +
								value.job_title + '</option>');
						});
					}

				});

			});

		});
	</script>

</x-admin-layout>