<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\JobOffer;
use App\Models\client;
use App\Models\Position;
use App\Models\Billing;
use App\Models\User;
use Carbon\Carbon;


use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function show_billing($id)
    {
        $resume_id = Resume::where('id', $id)->get();
        $resu_id = $resume_id[0]->id;
        //dd($resume_id[0]->name);
        $candidate_name = $resume_id[0]->name;
        $position_id = $resume_id[0]->position_id;
        $client_id = $resume_id[0]->client_id;

        $position_name = Position::where('position_id', $position_id)->first('job_title');
        $client_name = client::where('id', $client_id)->first('client_name');


        $job_offers_joined = JobOffer::where('candidate_id', $id)->get();
        // dd($job_offers_joined);
        //$job_joined=
        // $count = count($job_offers_joined);
        //dd($job_offers_joined[0]->job_joined_date,$count);




        // $job_offers_joined = JobOffer::where('candidate_id' , $id)->pluck('job_joined_date')->toArray();
        // //dd($job_offers_joined);

        // $colorsNoEmptyOrNull = array_filter($job_offers_joined, function($v){
        // return !is_null($v) && $v !== '';
        // });

        // $date=$colorsNoEmptyOrNull;



        //dd($date);


        return view('performance.add_billing', compact('candidate_name', 'position_name', 'client_name', 'job_offers_joined', 'position_id', 'client_id', 'resu_id'));
        //return view('performance.add_billing');
    }

    public function insert_billing_candidate(Request $request)
    {
        // dd($request->all());
        $cv_send = Resume::find($request->resume_id);
        $cv_send->cv_status = 29;
        $cv_send->save();

        $role = new Billing;
        $role->position_id = request('position_id');
        $role->client_id = request('client_id');
        $role->resume_id = request('resume_id');
        $role->candidate_name = request('candidate_name');
        $role->position_name = request('position_name');
        $role->information_person_name = request('information_person_name');
        $role->joining_date = request('joining_date');
        $role->ctc_offer = request('ctc_offer');
        $role->designation_offer = request('designation_offer');
        $role->bill_percentage = request('bill_percentage');
        $role->billing_amount = request('billing_amount');
        $role->billing_date = request('billing_date');
        $role->sur_name = request('sur_name');
        $role->designation = request('designation');
        $role->add_doorno = request('add_doorno');
        $role->address_1 = request('address_1');
        $role->address_2 = request('address_2');
        $role->state = request('state');
        $role->city = request('city');
        $role->pincode = request('pincode');
        $role->door_name_courier = request('door_name_courier');
        $role->address_1_courier = request('address_1_courier');
        $role->address_2_courier = request('address_2_courier');
        $role->state_courire = request('state_courire');
        $role->city_courier = request('city_courier');
        $role->pincode_courier = request('pincode_courier');
        $role->gstn_courier = request('gstn_courier');
        $role->remarks = request('remarks');
        $role->created_by = session('USER_ID');

        $role->save();
        //return redirect('/View_billing')->with('message', 'Bill Added Successfully');
        return redirect('resume_viewdetails/' . $request->resume_id);
        //dd($request->all());

    }

    public function approve_billing()
    {
        $approve_billing_data = Billing::all();
        //dd($approve_billing_data);
        return view('performance.approve_billing', compact('approve_billing_data'));
    }

    public function View_Billing()
    {
        $view = Billing::all();
        return view('performance.view_billing', compact('view'));
    }

    public function View_Billing_details($id)
    {
        $view_bil_details = Billing::findorfail($id);
        return view('performance.view_billing_details', compact('view_bil_details'));
    }





    public function approve_billing_details($id)
    {
        $approve_bil_details = Billing::findorfail($id);

        return view('performance.approve_billing_details', compact('approve_bil_details'));
    }

    public function approv_bill(Request $request)
    {

        //$login_user_id = session('USER_ID');
        $id = $request->billing_id;
        $crm_created = Billing::where('id', $id)->first('created_by');
        $crm_l1 = User::where('id', $crm_created->created_by)->first(['level_1', 'level_2']);

        if ($crm_l1->level_1 == session('USER_ID')) {
            $test = Billing::findorfail($id);
            $test->approved_by_L1 = 1;
            $test->approve_billing_remarks = $request->approve_billing_remarks;
            $test->approve_reject_L1_time = Carbon::now();

            $test->update();
        } elseif ($crm_l1->level_2 == session('USER_ID')) {
            $test = Billing::findorfail($id);
            $test->approved_by_L2 = 1;
            $test->approve_billing_remarks = $request->approve_billing_remarks;
            $test->approve_reject_L2_time = Carbon::now();
            $test->update();
        }
        return redirect('/approve_billing');
    }
    public function reject_bill(Request $request)
    {

        $id = $request->billing_id;
        $crm_created = Billing::where('id', $id)->first('created_by');
        $crm_l1 = User::where('id', $crm_created->created_by)->first(['level_1', 'level_2']);

        if ($crm_l1->level_1 == session('USER_ID')) {
            $test = Billing::findorfail($id);
            $test->approved_by_L1 = 2;
            $test->reject_billing_remarks = $request->reject_billing_remarks;
            $test->approve_reject_L1_time = Carbon::now();

            $test->update();
        } elseif ($crm_l1->level_2 == session('USER_ID')) {
            $test = Billing::findorfail($id);
            $test->approved_by_L2 = 2;
            $test->reject_billing_remarks = $request->reject_billing_remarks;
            $test->approve_reject_L2_time = Carbon::now();
            $test->update();
        }
        return redirect('View_billing/');
    }
}