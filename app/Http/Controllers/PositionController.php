<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\ClientContact;
use App\Models\CrmChange;
use App\Models\FunctionalArea;
use App\Models\Industry;
use App\Models\Resume;
use App\Models\Position;
use App\Models\Qualification;
use App\Models\User;
use App\Models\Position_update_remark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class PositionController extends Controller
{
    public function positionshow()
    {
        // dd(session('USER_ID'));
        $crmid = json_encode(session('USER_ID'));
        //dd($crmid);

        $client1 = client::whereJsonContains('crm_id', $crmid)
            ->where('is_approve', '=', 1)
            ->get();

        //where('is_approve', '=', 1)->get();
        // $client1 = client::all();
        //$c_contactname = ClientContact::all();
        $qualification1 = Qualification::all();
        $function_area1 = FunctionalArea::all();
        $industry1 = Industry::all();

        $requiter = user::where('role_id', '=', 6)
                            ->orwhere('role_id', '=', 7)
                            ->orwhere('role_id', '=', 8)
                            ->orwhere('role_id', '=', 10)
                            ->get();
                            //dd($requiter);
        $crm_position = User::where('role_id', '=', 1)
            ->orwhere('role_id', '=', 5)
            ->orwhere('role_id', '=', 6)
            ->orwhere('role_id', '=', 7)
            ->orwhere('role_id', '=', 9)
            ->where('status', '=', 1)->get();

        $jobcode = $this->jobcodeshow();
        $year = date("Y");

        return view('positions.position', compact('client1', 'qualification1', 'function_area1', 'industry1', 'requiter', 'crm_position', 'jobcode', 'year'));
    }

    public function jobcodeshow()
    {

        $year = date("Y");
        // $result1 = Position::whereYear('created_at', '=', $year)
        //     ->where('is_deleted', '=', 'N')
        //     ->distinct()
        //     ->get();
        $result1 = Position::select('job_code')
            ->whereYear('created_at', '=', $year)
            ->where('is_deleted', '=', 'N')

            ->distinct()
            ->get();

        $result = count($result1);
        // dd($result);
        $jobcode = sprintf("%02d", $result + 1);
        return $jobcode;
    }


    public function position_inserts(Request $request)
    {
        //dd($request->all());
        $crm = request('crmid');
        $crm_id = '["' . $crm . '"]';
        $count = count($request->recruter);
        //dd($count);
        for ($i = 0; $i < $count; $i++) {
            $data = explode(",", $request->recruter[$i]);
            $recuter_id[] = $data[0];
            $no_position[] = $data[1];
        }
        $data1 = explode(',', $request->technical[0]);
        $data2 = explode(',', $request->behavioural[0]);
        $position_id = Position::distinct('job_code')->count();
        $pos_id = ($position_id + 1);
        
         if ($request->hasfile('filetype'))
         {
            $file = rand() . '.' . $request->filetype->extension();
            $randfile = $request->filetype->move(('document/position/jd'), $file);

        }else{
            $file='';
        }
        
        

        for ($i = 0; $i < $count; $i++) {
            $role = new Position;
            $role->position_id = $pos_id;
            $role->client_name = request('fullname');
            $role->spoc_name = request('client_contanct_name');
            $role->job_title = request('jobname');
            $role->job_location = request('joblocation');
            $role->job_code = request('jobcode');
            $role->min_experience = request('min_experience');
            $role->max_experience = request('max_experience');
            $role->annual_ctc_min = request('min_salary') . " " . request('salary_value');
            $role->annual_ctc_max = request('max_salary') . " " . request('salary_value2');
            $role->qualification = request('qualification');
            $role->functional_area = request('functionarea');
            $role->industry = request('industryname');
            $role->age_min = request('min_age');
            $role->age_max = request('max_age');
            $role->technicalskils = json_encode($data1);
            $role->behaviour_skils = json_encode($data2);
            $role->total_opening = request('opening');
            $role->crm = $crm_id;
            $role->billable_value = request('bill_value');
            $role->total_billable = request('total_billvalue');
            $role->joining_date = request('joiningdate');
            $role->gender = request('basic_radio');
            $role->resume_contact = request('resume1');
            $role->resume_password = request('resume_password');
            $role->resume_type = request('resumetype1');
            $role->project_type = request('ptype1');
            $role->publish_website = request('website1');
            $role->job_description_ckediter = request('editor1');
            $role->file_attachment = $file;
            $role->created_by = session('USER_ID');
            $role->recruiters = $recuter_id[$i];
            $role->position_no_recruiter = $no_position[$i];
            $role->publish_web_responsibility = request('responsibility');
            $role->publish_web_industry = request('industry');
            $role->publish_web_competency = request('competency');
            $role->save();
        }
        $postion_id = Position::where('id', $role->position_id)->pluck('position_id');
        $recruiters = Position::where('position_id', $postion_id[0])->pluck('recruiters');
        $job_title = $role->job_title;
        $job_location = $role->job_location;
        $total_opening = $role->total_opening;
        $client_name = $role->client_name;
        $createdby = $role->created_by;
        $client_crm = client::where('id', '=', $request->fullname)->get('crm_id');
        $array = json_decode($client_crm[0]->crm_id);
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            $email = User::where('id', $array[$i])->get();
            $l1 = $email[0]->level_1;
            $create = client::where('id', $client_name)->get();
            $user1 = User::where('id', '=', $create[0]->created_by)->get();
            $data = ['created_by' => $createdby, 'job_title' => $job_title, 'job_location' => $job_location, 'total_opening' => $total_opening, 'recruiters' => $recruiters, 'client_name' => $client_name, 'level1' => $l1];
            $user['to'] = $email[0]->email;
            FacadesMail::send('mail.position_create', $data, function ($messages) use ($user, $user1) {
                $messages->to($user['to']);
                $messages->subject('CT Hiring - Position created by ' . $user1[0]->name);
            });
        }
        return redirect('/positionview')->with('msg', 'Position Inserted Successfully');
    }


    public function position_approve_page()
    {
        //$view = position::distinct('position_id')->get()->unique('position_id');
        $view = position::all();
        //dd($view);
        return view('positions.position_approve', compact('view'));
    }
    public function position_approve_delts($position_id, $id)
    {
        $requiter = user::where('role_id', '=', 8)->get();
        //dd($position_id);
        $view = position::findorfail($position_id);

        return view('positions.position_approvedetails', compact('view', 'requiter', 'id'));
    }

    public function approve_position(Request $request)
    {
        // dd($request->all());


        $id = $request->position_id;
        // dd($id);
        $role = position::where('id', $request->id)->update([
            'approved_by' => session('USER_ID'),
            'is_approve' => "1",
            'status' => "1",
            'remarks' => $request->remarks
        ]);
        $role = position::where('position_id', $id)->first();
        // dd($role,$id);
        // $role->remarks = request('remarks');
        // $role->is_approve = "1";
        // $role->status = "1";
        // $role->approved_by = session('USER_ID');
        // $role->save();
        //dd($role);
        ////Approve mail////
        // $postion_id=Position::where('id',$role->position_id)->pluck('position_id');
        $recruiters = Position::where('id', $request->id)->pluck('recruiters');

        //  dd($recruiters);
        $job_title = $role->job_title;
        $job_location = $role->job_location;
        $total_opening = $role->total_opening;
        $client_name = $role->client_name;
        $approved_by = session('USER_ID');
        $remarks = request('remarks');

        $client_crm = client::where('id', '=', $client_name)->get('crm_id');
        $array1 = json_decode($recruiters);
        $array = json_decode($client_crm[0]->crm_id);
        $data = array_merge($array1, $array);
        //  dd($data);

        // $count = count($data);
        // dd($data,$count);
        foreach ($data as $view) {

            $email = User::where('id', $view)->get();
            $user1 = User::where('id', '=', $approved_by)->get();

            // dd($email);

            $data = ['approved_by' => $approved_by, 'job_title' => $job_title, 'job_location' => $job_location, 'total_opening' => $total_opening, 'recruiters' => $recruiters, 'client_name' => $client_name, 'email' => $email];

            //  dd($data);

            $user['to'] = $email[0]->email;

            FacadesMail::send('mail.position_approve', $data, function ($messages) use ($user, $user1) {
                $messages->to($user['to']);

                $messages->subject('CT Hiring - Position Approved by ' . $user1[0]->name);
            });
        }
        return redirect('/position_approve')->with('msg', 'Position Approved Successfully');
    }

    public function reject_position(Request $request)
    {
        // dd($request->all());
        //$id = $request->position_id;
        // dd($id);
        $role = position::where('id', $request->id)->update([
            'remarks' => $request->remarks,
            'approved_by' => session('USER_ID'),
            'is_approve' => "2",
            'status' => "2"

        ]);

        // $id = $request->position_id;
        // $role = position::findorfail($id);
        // $role->remarks = request('remarks');
        // $role->is_approve = "2";
        // $role->save();
        return redirect('/position_approve');
    }


    public function position_viewpage()
    {
        // $view = position::distinct('client_name')->where('is_approve', 1)->get()->unique('position_id');
        return view('positions.position_view');
    }
    public function viewpositionshow_get(Request $request)
    {
        if ($request->ajax()) {
        // dd($request->all());
            $data = position::distinct('client_name')->get()->unique('position_id');
            // $data = position::select('*')->orderBy('id', 'ASC');
            // dd($data);
            return FacadesDataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == '1') {
                        return '<span class="badge badge-success">active</span>';
                    } else {
                        return '<span class="badge badge-danger">Inactive</span>';
                    }
                })

                ->addColumn('action', function ($row) {

                    $actionBtn = '<a href="/position_edit/' . $row->id . '" class="edit"><i class="ft-edit text-success"></i></a> ';
                    return $actionBtn;
                })

                ->addColumn('crm', function ($row) {
                    $crm_id = json_decode($row->crm);
                    $mcount = count($crm_id);
                    if ($mcount >= 1) {
                        for ($i = 0; $i < $mcount; $i++) {
                            $crm_name_id = User::where('id', $crm_id[$i])->first('name');
                            return $crm_name_id->name;
                        }
                    }
                })
                ->addColumn('recruiter', function ($row) {
                    $recruiter = Position::where('position_id', $row->position_id)->get('recruiters');
                    //   dd($recruiter[0]);
                    foreach($recruiter as $recruiter_name){
                        $recruiter_id = User::where('id', $recruiter_name->recruiters)->first('name');
                        $recruiter_name->name = $recruiter_id;
                        // $stock_datas[] = $recruiter_name;
                    return $recruiter_id->name;
                    };
                })
                ->addColumn('cv_sent', function ($row) {
                    $recruiter = Resume::where('position_id', $row->position_id)->get('id');
                    $cv_sent = count($recruiter);
                    return $cv_sent;
                })
                ->addColumn('joined', function ($row) {
                    $resume = Resume::where('position_id','=',$row->position_id)->where(function($query) {
                        $query -> where('cv_status','=','26')
                        -> orWhere('cv_status','=','29');
                        })->get();

                    $joined = count($resume);
                    return $joined;   
                })
                
                ->editColumn('created_at', function ($data) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-M-Y');
                    return $formatedDate;
                })
                ->editColumn('updated_at', function ($data) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d-M-Y');
                    return $formatedDate;
                })
                
                ->editColumn('client', function ($data) {
                    $client = client::where('id', $data->client_name)->first('client_name');
                    return $client->client_name;
                })
                ->editColumn('createdby', function ($data) {
                    $createdby = User::where('id', $data->created_by)->first('name');
                    return $createdby->name;
                })


                ->filter(function ($instance) use ($request) {
                    // dd($request->from_date,$request->to_date);
                    if ($request->get('status') == '1' || $request->get('status') == '0') {
                        $instance->where('status', $request->get('status'));
                    }
                    if ($request->get('approval') == '2' || $request->get('approval') == '1' || $request->get('approval') == '0') {
                        $instance->where('is_approve', $request->get('approval'));
                    }
                    if (!empty($request->get('from_date')) && !empty($request->get('to_date'))) {
                        $instance->whereBetween('created_at', array($request->from_date, $request->to_date))->get();
                    }



                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');

                            $w->orWhere('job_title', 'LIKE', "%$search%");
                            // ->orWhere('city', 'LIKE', "%$search%")
                            // ->orWhere('district', 'LIKE', "%$search%");

                        });
                    }
                })
                // ->rawColumns(['Status'])
                ->rawColumns(['status'], ['action'])
                ->make(true);
            // return $data;
            $data1=['$data , $recruiter_name'];
            return FacadesDataTables::of($data1)->make(true);
        }
    }
    public function position_view_delts($id)
    {
        //dd($id);
        
        $requiter = user::where('role_id', '=', 8)->get();
        $view = position::findorfail($id);

        $resume_delts = Resume::where('position_id', $view->position_id)->get();
        // $member = json_decode($view);
        $remarks = Position_update_remark::where('position_id', $view->position_id)->get();
        
        return view('positions.position_viewdetails', compact('view', 'resume_delts', 'requiter','remarks'));
    }

    public function editposition(Request $request, $id)
    {
        //dd($id);
        //dd($request);

        $view = position::where('position_id', $id)->get();
        $qualification1 = Qualification::all();
        $function_area1 = FunctionalArea::all();
        $industry1 = Industry::all();
        $client_contact = ClientContact::where('id', '=', $view[0]->spoc_name)->get();
        $client1 = client::all();
        $requiter = user::where('role_id', '=', 8)->get();
        $crm_position = User::where('role_id', '=', 1)
            ->orwhere('role_id', '=', 5)
            ->orwhere('role_id', '=', 6)
            ->orwhere('role_id', '=', 7)->get();

        $position_techskill_fetch[] = json_decode($view[0]->technicalskils);

        //*position techskill fetch*//
        $length = count($position_techskill_fetch[0]);

        for ($i = 0; $i < $length; $i++) {
            $temp = [];
            foreach ($position_techskill_fetch as $array) {
                $temp[] = $array[$i];
            }

            $edit_result[] = $temp;
        }

        $position_bevrlskill_fetch[] = json_decode($view[0]->behaviour_skils);

        //*position techskill fetch*//
        $length = count($position_bevrlskill_fetch[0]);

        for ($i = 0; $i < $length; $i++) {
            $temp = [];
            foreach ($position_bevrlskill_fetch as $array) {
                $temp[] = $array[$i];
            }

            $edit_bevrl[] = $temp;
        }
        return view('positions.position_edit', compact('view', 'client1', 'function_area1', 'industry1', 'client_contact', 'crm_position', 'requiter', 'edit_result', 'edit_bevrl', 'qualification1'));
    }
    public function updateposition(Request $request, $position_id)
    {
         //dd($request->all());
        $get_postion_details = Position::where('position_id', $position_id)->get();
        $jobcode = $get_postion_details[0]->job_code;
        $creted_at = $get_postion_details[0]->created_at;
        $crm_id = $get_postion_details[0]->crm;
        
        $remarks = new Position_update_remark;
        $remarks->position_id=$position_id;
        $remarks->remarks=$request->remarks;
        $remarks->save();

        Position::where('position_id', $position_id)->delete();

        if ($request->hasfile('file')) {
            $request->validate([
                'file' => 'mimes:pdf',
            ]);
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('document/position/jd/', $filename);
            $file_name = $filename;
        } else {
            $file_name = request('file_name');
        }

        $count = count($request->recruter);
        for ($i = 0; $i < $count; $i++) {
            $data = explode(",", $request->recruter[$i]);
            $recuter_id[] = $data[0];
            $no_position[] = $data[1];
        }
        $data1 = explode(',', $request->technical[0]);
        $data2 = explode(',', $request->behavioural[0]);
        // $file = rand() . '.' . $request->filetype->extension();
        // $randfile = $request->filetype->move(('document/position/jd'), $file);
        for ($i = 0; $i < $count; $i++) {
            $role = new Position;
            $role->position_id = $position_id;
            $role->client_name = request('fullname');
            $role->spoc_name = request('client_contanct_name');
            $role->job_title = request('jobname');
            $role->job_location = request('joblocation');
            $role->job_code = $jobcode;
            $role->min_experience = request('min_experience');
            $role->max_experience = request('max_experience');
            $role->annual_ctc_min = request('min_salary') . " " . request('salary_value');
            $role->annual_ctc_max = request('max_salary') . " " . request('salary_value2');
            $role->qualification = request('qualification');
            $role->functional_area = request('functionarea');
            $role->industry = request('industryname');
            $role->age_min = request('min_age');
            $role->age_max = request('max_age');
            $role->technicalskils = json_encode($data1);
            $role->behaviour_skils = json_encode($data2);
            $role->total_opening = request('opening');
            $role->crm = $crm_id;
            $role->billable_value = request('bill_value');
            $role->total_billable = request('total_billvalue');
            $role->joining_date = request('joiningdate');
            $role->gender = request('basic_radio');
            $role->resume_contact = request('resume1');
            $role->resume_type = request('resumetype1');
            $role->project_type = request('ptype1');
            $role->publish_website = request('website1');
            $role->job_description_ckediter = request('editor1');
            $role->file_attachment = $file_name;
            $role->created_by = session('USER_ID');
            $role->recruiters = $recuter_id[$i];
            $role->position_no_recruiter = $no_position[$i];
            $role->publish_web_responsibility = request('responsibility');
            $role->publish_web_industry = request('industry');
            $role->publish_web_competency = request('competency');
            $role->created_at = $creted_at;
            $role->save();
        }


        return redirect('/positionview')->with('msg', 'Position Updated Successfully.');
    }
    public function crm_change(Request $request, $id)
    {
        //dd($request->all());
        $crm = request('crm_change');
        $crm_id = '["' . $crm . '"]';
        $start_date = $request->crm_working_date_start;
        $end_date = $request->crm_working_date_end;
        $assign_date = $request->new_crm_assign_date;
        $remark = $request->crm_change_remark;
        $client_id = $request->client_id;
        $position_id = $request->position_id;
        $old_crm_id = $request->old_crm_id;

        $crm = Position::where('position_id', $id)->update([
            'crm_change_status' => "1",
            'crm' => $crm_id,
        ]);

        $crm_change = new CrmChange;
        $crm_change->client_id = $client_id;
        $crm_change->position_id = $position_id;
        $crm_change->old_crm_id = $old_crm_id;
        $crm_change->new_crm_id =  request('crm_change');
        $crm_change->from_work_date = $start_date;
        $crm_change->to_work_date = $end_date;
        $crm_change->remarks = $remark;
        $crm_change->new_crm_assign_date = $assign_date;
        $crm_change->save();

        return redirect()->back()->with('msg', 'CRM change goes for approval to the respective L1 of the previous crm');
    }
    public function crm_change_approval()
    {
        $crm = CrmChange::all();

        return view('positions.crm_change_approval', compact('crm'));
    }
    public function approve_status(Request $request)
    {
        //dd($request->all());
        $approve_status = $request->approve_status;
        $new_createdby = $request->new_createdby;
        $position = $request->position;

        $approve_position = Position::where('position_id', $position)->update([
            'created_by' => $new_createdby,
        ]);

        $crm_approve = CrmChange::where('position_id', $position)->update([
            'status' => $approve_status,
        ]);
        return response()->json();
    }
    public function reject_status(Request $request)
    {
        //dd($request->all());
        $approve_status = $request->approve_status;
        $new_createdby = $request->new_createdby;
        $position = $request->position;

        // $approve_position = Position::where('position_id',$position)->update([
        //         'created_by'=>$new_createdby,
        // ]);

        $crm_approve = CrmChange::where('position_id', $position)->update([
            'status' => $approve_status,
        ]);
        return response()->json();
    }
}
