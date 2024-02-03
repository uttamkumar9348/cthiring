<?php

namespace App\Http\Controllers;

use App\Models\myplan;
use App\Models\client;
use App\Models\User;
use App\Models\tempmyplans;
use App\Models\Position;
use App\Models\Leave;
use Illuminate\Http\Request;

class MyplanController extends Controller
{
    public function approved()
    {
        $student = myplan::all();
        $pos = session('USER_ID');
        //dd($pos);
        $pos_req = Position::where('recruiters', '=', $pos)->get()->unique('client_name');

        return view('myplan.approved_plan', compact('student'));
    }

    public function approve_plan(Request $request, $id)
    {
        $role = myplan::find($id);
        $role->remarks = $request->remarks;
        $role->approve_status = "1";
        $role->status = "1";
        $role->save();

        return redirect()->back()->with('message', 'Plan Approved Successfully');
    }

    public function reject_plan(Request $request, $id)
    {

        //dd($request->all());
        $role = myplan::find($id);
        $role->remarks = request('remarks');
        $role->approve_status = "2";
        $role->save();
        return redirect()->back()->with('message', 'Plan Rejected Successfully');
    }

    public function plan_viewpage()
    {

        $student = myplan::all();
        $pos = session('USER_ID');
        // dd($student);
        $pos_req = Position::where('recruiters', '=', $pos)->get()->unique('client_name');
        $leave = Leave::where('user_id', '=', $pos)->get();
        // dd($leave);
        return view('myplan.view_work_plan', compact('pos_req', 'student', 'leave'));
    }
    public function myplan_todays()
    {
        $student = myplan::all();
        //  dd($student->created_at->format('Y-m-d') );
        $client1 = client::all();
        //dd($client1);
        $position1 = Position::all();
        $pos = session('USER_ID');
        $pos_req = Position::where('recruiters', '=', $pos)->get()->unique('client_name');
        return view('myplan.todays_plan', compact('pos_req', 'student', 'client1'));
    }


    public function position_fetch_ajax_plan(Request $request)
    {
        $position_myplan['positionname'] = Position::where('client_name', $request->client_name)->get()->unique('position_id');
        // dd($position_myplan);
        return response()->json($position_myplan);
    }

    public function insert_todaysplan(Request $request)
    {
        //dd($request->all());
        if ($request->day_plan == 1) {
            $myplan = new myplan;
            $myplan->user_id = session('USER_ID');
            $myplan->created_by = session('USER_ID');
            // $myplan->ctc = NA;
            $myplan->work_plan = request('day_plan');
            $myplan->task_date = request('date');
            
            if($request->work_time_period != ''){
                $myplan->day_work_name = request('work_time_period');
            }elseif($request->work_time_period1 != ''){
                $myplan->day_work_name = request('work_time_period1');
            }
            
            if($request->plantype != ''){
                $myplan->work_plan_type = request('plantype');
            }elseif($request->plantype1 != ''){
                $myplan->work_plan_type = request('plantype1');
            }
            
            if($request->clientname != ''){
                $myplan->client_name = request('clientname');
            }elseif($request->clientname1 != ''){
                $myplan->client_name = request('clientname1');
            }
            
            if($request->positionname !=''){
                $myplan->position_id = request('positionname');
            }elseif($request->positionname1 !=''){
                $myplan->position_id = request('positionname1');
            }
            // dd($myplan->position_id);
            if($request->option !=''){
                $myplan->others_option = request('option');
            }elseif($request->option1 !=''){
                $myplan->others_option = request('option1');
            }
            
            if($request->subject !=''){
                $myplan->subject = request('subject');
            }elseif($request->subject1 !=''){
                $myplan->subject = request('subject1');
            }
            
             //dd($myplan);

            $myplan->save();
            
            if($request->work_time_period2 !=''){
            $myplan = new myplan;
            $myplan->user_id = session('USER_ID');
            $myplan->created_by = session('USER_ID');
            // $myplan->ctc = NA;
            $myplan->work_plan = request('day_plan');
            $myplan->task_date = request('date');
            
            $myplan->day_work_name = request('work_time_period2');
            
            $myplan->work_plan_type = request('plantype2');
            
            $myplan->client_name = request('clientname2');
            
            $myplan->position_id = request('positionname2');
            
            $myplan->others_option = request('option2');
            
            $myplan->subject = request('subject2');
            
            $myplan->save();
            }
            return redirect('/plan_view')->with('message', 'Plan Added Successfully, It will be visible after approved by your respective L1');
        }
        
        if ($request->day_plan == 2) {
            $myplan = new myplan;
            $myplan->user_id = session('USER_ID');
            $myplan->created_by = session('USER_ID');
            // $myplan->ctc = NA;
            $myplan->work_plan = request('day_plan');
            $myplan->task_date = request('date');
            if($request->work_time_period == "Fullday"){
                $myplan->day_work_name = request('work_time_period');
            }elseif($request->work_time_period1 == "Forenoon"){
                $myplan->day_work_name = request('work_time_period1');
            }elseif($request->work_time_period2 == "Afternoon"){
                $myplan->day_work_name = request('work_time_period2');
            }
            $myplan->work_plan_type = request('plantype');
            $myplan->client_name = request('clientname');
            $myplan->position_id = request('positionname');
            $myplan->others_option = request('option');
            $myplan->subject = request('subject');
            // dd($myplan);

            $myplan->save();
            return redirect('/plan_view')->with('message', 'Plan Added Successfully, It will be visible after approved by your respective L1');
        }

        if ($request->day_plan == 3) {

            $leave_data = Leave::all();
            //dd($leave_data);
            if ($leave_data->isEmpty()) {
                $date = Leave::where('user_id', session('USER_ID'))->orderBy('id', 'DESC')->first();
                   //dd($date,$request);
            
                    $from_date = $date->leave_from;
                    $to_date = $date->leave_to;
                    $from_date1 = $request->from_date;
                    $to_date1 = $request->to_date;


                    // check for special cases
                    if ($from_date >= $from_date1 && $to_date <= $to_date1) 
                    {
                        return redirect('/todays_plan')->with('error', 'You have already applied for this date');
                    } 
                    elseif ($from_date1 >= $from_date && $to_date1 <= $to_date)
                    {
                        return redirect('/todays_plan')->with('error', 'You have already applied for this date');
                    } 
                    elseif ($from_date <= $to_date1 && $from_date1 <= $to_date)
                    {
                        return redirect('/todays_plan')->with('error', 'You have already applied for this date');
                    } 
                    else 
                    {
                        $leave = new Leave;
                        $leave->user_id = session('USER_ID');
                        $leave->leave_from = request('from_date');
                        $leave->leave_to = request('to_date');
                        $leave->leave_type = request('leavetype');
                        $leave->reason = request('reason');
                        $leave->session = request('session');
                        $leave->save();
                        return redirect('/viewleave')->with('message', 'Leave Added Successfully, It will be visible after approved by your respective L1');
                    }
                
            } else {
                $leave = new Leave;
                $leave->user_id = session('USER_ID');
                $leave->leave_from = request('from_date');
                $leave->leave_to = request('to_date');
                $leave->leave_type = request('leavetype');
                $leave->reason = request('reason');
                $leave->session = request('session');
                $leave->save();
                return redirect('/viewleave')->with('message', 'Leave Added Successfully, It will be visible after approved by your respective L1');
            }
        }
    }
    public function view_leave()
    {
        // $pos = session('USER_ID');
        $leave = Leave::orderBy('id', 'ASC')->get();
        return view('myplan.view_leave', compact('leave'));
    }

    public function view_leave_details($id)
    {
        $leave = Leave::where('id', '=', $id)->get();
        // dd($leave);
        return view('myplan.view_leave_details', compact('leave'));
    }
    public function leave_approve_plan(Request $request, $id)
    {
        $role = Leave::find($id);
        $role->approve_remarks = $request->remarks;
        $role->status = "1";
        $role->save();

        return redirect('/viewleave')->with('message', 'Leave Approved Successfully');
    }

    public function leave_reject_plan(Request $request, $id)
    {

        //dd($request->all());
        $role = Leave::find($id);
        $role->reject_remarks = $request->remarks;
        $role->status = "2";
        $role->save();
        return redirect('/viewleave')->with('error', 'Leave Rejected Successfully');
    }
    public function cancel_leave(Request $request, $id)
    {

        //dd($request->all());
        $role = Leave::find($id);
        $role->cancel_remarks = $request->remarks;
        $role->status = "3";
        $role->save();
        return redirect('/viewleave')->with('error', 'Leave Canceled Successfully');
    }
    public function edit_plan(Request $request, $id)
    {
        $plan = myplan::where('id', $id)->get();
        $client1 = client::all();
        $position1 = Position::all();
        $pos = session('USER_ID');
        $pos_req = Position::where('recruiters', '=', $pos)->get()->unique('client_name');
        return view('myplan.edit_plan', compact('pos_req', 'client1', 'plan'));
    }
}
