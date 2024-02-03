<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\client;
use App\Models\ClientContact;
use App\Models\client_location;
use App\Models\District;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use App\Models\Position;
use App\Models\client_designation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class clientController extends Controller
{
    public function clientshow(Request $request)
    {

        $role_id = role::where('is_crm', '1')->pluck('id')->all();
        $crm_user = User::whereIn('role_id', $role_id)
            ->where('is_deleted', '=', 'N')
            ->get();
        $state_name = State::all();
        $district = District::all();
        $city = city::all();
        $client_branch = client_location::all();

        return view('client.client', compact('crm_user', 'state_name', 'client_branch', 'district', 'city'));
    }

    public function client_insertpage2(Request $request)
    {
        // dd($request->all());
        if ($request->client_logo != '') {
            $imageName = time() . '.' . $request->client_logo->extension();
            $randimg =  $request->client_logo->move(('clients/'), $imageName);
        } else {
            $imageName = null;
        }

        $role = new client;
        $role->client_name =  $request->clientname;
        $role->mobile = $request->phone;
        $role->door_no = $request->doorno;
        $role->street_name = $request->streetname;
        $role->area_name =  $request->area;
        $role->city_id = $request->cityname;
        $role->district_id = $request->districtname;
        $role->state_id = $request->State;
        $role->pincode = $request->pincode;
        $role->crm_id = json_encode($request->crm);
        $role->status =  $request->status;
        $role->logo = $imageName;
        $role->created_by = session('USER_ID');
        //dd($role);
        $role->save();

        $LastInsertId = $role->id;
        $count = count($request->contactname);

        for ($i = 0; $i < $count; $i++) {

            $role1 = new ClientContact;
            $role1->client_id = $LastInsertId;
            $role1->contact_name = $request->contactname[$i];
            $role1->mobile = $request->contactphone[$i];
            $role1->landline_number = $request->contactlandline[$i];
            $role1->email = $request->contactmail[$i];
            $role1->designation = $request->designation[$i];
            $role1->client_branch = $request->contactbranch[$i];
            $role1->door_no = $request->contactdoorno[$i];
            $role1->street_name = $request->contactstreetname[$i];
            $role1->area_name = $request->contactarea[$i];
            $role1->state_id = $request->contactstate[$i];
            $role1->district_id = $request->contactdistrictname[$i];
            $role1->city_id = $request->contactcityname[$i];
            $role1->pincode = $request->contactpincode[$i];
            $role1->status = $request->contactstatus[$i];
            $role1->created_by = session('USER_ID');
            if (!empty($request->checkbox[$i])) {
                $role1->corporate_address_check = $request->checkbox[$i];
            } else {
                $role1->corporate_address_check = 0;
            }
            $role1->save();
        }
        $this->mail_send($role1->created_by, $role->client_name, $role1->city_id, $role->crm_id, $LastInsertId);

        $request->session()->forget('client');
        return redirect('/approveclient')->with('msg', 'Client Inserted successfully.');
    }

    public function mail_send($created, $client_name, $city_id, $crm_id, $LastInsertId)
    {

        $user = User::where('role_id', '2')->get();

        $count = count($user);
        for ($i = 0; $i < $count; $i++) {

            $data = ['createby' => $created, 'nameclient' => $client_name, 'cityname' => $city_id, 'crmid' => $crm_id, 'fname' => $user[$i]->fname, 'lname' => $user[$i]->lname];
            $create = client::where('id', $LastInsertId)->get();
            $user1 = User::where('id', '=', $create[0]->created_by)->get();
            $clientmail['to'] = $user[$i]->email;

            FacadesMail::send('mail.approvalclientmail', $data, function ($messages) use ($clientmail, $user1) {
                $messages->to($clientmail['to']);

                $messages->subject('CT Hiring - Client created by ' . $user1[0]->name);
            });
        }
    }

    //viewclient page

    public function viewclientshow()
    {
        // $view = client::all();
        $city = city::all();
        return view('client.viewclient', compact('city'));
    }
    public function viewclientshow_get(Request $request)
    {
        if ($request->ajax()) {

            $data = client::select('*')->orderBy('id', 'ASC');
            // return $data;


            return FacadesDataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == '1') {
                        return '<span class="badge badge-success">active</span>';
                    } else {
                        return '<span class="badge badge-danger">Inactive</span>';
                    }
                })

                ->addColumn('crm', function ($row) {
                    $crm_id = json_decode($row->crm_id);
                    $mcount = count($crm_id);
                    // $crm_data='';
                    // dd($mcount);
                    if ($mcount >= 1) {

                        // foreach($crm_id as $value){
                        //     $crm_name_id = User::where('id',$value)->first('name');
                        //     return $crm_name_id->name;
                        // }
                        for ($i = 0; $i < $mcount; $i++) {
                            $crm_name_id = User::where('id', $crm_id[$i])->first('name');
                            return $crm_name_id->name;
                        }
                    }
                    // for($i=0;$i<$count;$i++){
                    // $crm_name = client::where('id')->get();
                    // return $crm_name->name;
                    // $crm_data ='<span class="badge badge-primary">'.$crm_name->name.'</span>';
                    // }

                })

                ->addColumn('action', function ($row) {

                    $actionBtn = '<a href="/edit_client/' . $row->id . '" class="edit"><i class="ft-edit text-success"></i></a> ';
                    
                    return $actionBtn;
                })
                ->editColumn('created_at', function ($data) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-M-Y');
                    return $formatedDate;
                })
                ->editColumn('updated_at', function ($data) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d-M-Y');
                    return $formatedDate;
                })
                ->editColumn('contact', function ($data) {
                    $contact = ClientContact::where('client_id', $data->id)->count();
                    return $contact;
                })
                ->editColumn('position', function ($data) {
                    $position = Position::where('client_name', $data->id)->count();
                    return $position;
                })
                ->editColumn('createdby', function ($data) {
                    $createdby = User::where('id', $data->created_by)->first('name');
                    return $createdby->name;
                })
                ->editColumn('city', function ($data) {
                    $city = city::where('id', $data->city_id)->first('name');
                    return $city->name;
                })
                ->editColumn('district', function ($data) {
                    $dist = District::where('id', $data->district_id)->first('district_title');
                    return $dist->district_title;
                })

                ->filter(function ($instance) use ($request) {
                    // dd($request->from_date,$request->to_date);
                    if ($request->get('status') == '1' || $request->get('status') == '0') {
                        $instance->where('status', $request->get('status'));
                    }
                    if ($request->get('approval') == '2' || $request->get('approval') == '1' || $request->get('approval') == '0') {
                        $instance->where('is_approve', $request->get('approval'));
                    }
                    if (!empty($request->get('city'))) {
                        $instance->where('city_id', $request->get('city'));
                    }
                    if (!empty($request->get('from_date')) && !empty($request->get('to_date'))) {
                        $instance->whereBetween('created_at', array($request->from_date, $request->to_date))->get();
                    }



                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');

                            $w->orWhere('client_name', 'LIKE', "%$search%");
                            // ->orWhere('city', 'LIKE', "%$search%")
                            // ->orWhere('district', 'LIKE', "%$search%");

                        });
                    }
                })
                // ->rawColumns(['Status'])
                ->rawColumns(['status'], ['action'], ['serial'])
                ->make(true);
            return $data;
            return FacadesDataTables::of($data)->make(true);
        }
    }
    public function view_approv_client()
    {

        $view = client::all();

        return view('client.client_approve', compact('view'));
    }

    public function viewclientshow_details($id)
    {
        //dd('hello');
        $view = client::findorfail($id);
        // dd($view);
        $view2 = ClientContact::where('client_id', '=', $id)->get();
        //dd($view2);

        return view('client.viewclient_details', compact('view', 'view2'));
        //return view('viewclient_details');
    }

    public function approveclient_details($id)
    {
        //dd('hello');
        $view = client::findorfail($id);
        $view2 = ClientContact::where('client_id', '=', $id)->get();

        return view('client.client_approvedetails', compact('view', 'view2'));
    }

    public function appr_clt(Request $request)
    {

        // dd($request->all());
        $id = $request->c_id;
        $role = client::findorfail($id);
        $role->remarks = request('remarks');
        $role->approved_by = session('USER_ID');
        $role->is_approve = "1";
        $role->save();

        $role = client::where('id', "=", $request->c_id)->get();
        $array = json_decode($role[0]->crm_id);
        $client_createdby = $role[0]->created_by;
        array_push($array, $client_createdby);
        // dd($client_createdby);
        $client_name = $role[0]->client_name;
        $city_id = $role[0]->city_id;
        $remarks = $role[0]->remarks;
        $approved_by = $role[0]->approved_by;

        //dd($role[0]->created_by,json_decode($role[0]->crm_id),$array);

        $user_mail = User::whereIn('id', $array)->pluck('email')->toArray();
        $username = User::whereIn('id', $array)->pluck('name')->toarray();
        // dd($username);
        $count = count($user_mail);
        // dd($user_mail);
        for ($i = 0; $i < $count; $i++) {
            $create = client::where('id', $id)->get();
            //dd($create[$i]->approved_by);
            $user1 = User::where('id', '=', $create[0]->approved_by)->get();
            //dd($user1[0]->name);
            $data = ['created_by' => $client_createdby, 'client_name' => $client_name, 'city_id' => $city_id, 'crm_id' => $array[$i], 'remarks' => $remarks, 'approved_by' => $user1[0]->name, 'username' => $username[$i]];
            FacadesMail::send('mail.afterapproval_client', $data, function ($messages) use ($user_mail, $user1) {
                $messages->to($user_mail);

                $messages->subject('CT Hiring - Client approved by ' . $user1[0]->name);
            });
        }
        return redirect('/approveclient');
    }

    public function reject_clt(Request $request)
    {

        //dd($request->all());
        $id = $request->c_id;
        $role = client::findorfail($id);
        $role->remarks = request('remarks');
        $role->is_approve = "2";
        $role->save();
        return redirect('/approveclient');
    }

    public function client_edit(Request $request, $id)
    {
        $view = client::findorfail($id);
        // $view2 = ClientContact::findorfail($id);
        $view2 = ClientContact::where('client_id', '=', $id)->get();
        // dd($view2);

        $state_name = State::all();
        $district = District::all();
        $city = city::all();
        $location = client_location::all();
        $role_id = role::where('is_crm', '1')->pluck('id')->all();
        //dd($role_id);
        $crm_user = User::whereIn('role_id', $role_id)->get();
        // dd($crm_user);
        //dd($view);
        return view('client.editclient', compact('view', 'state_name', 'crm_user', 'view2', 'district', 'city', 'location'));
    }

    public function client_update(Request $request, $id)
    {
        // dd($request->all());
        $role = client::findorfail($id);
        $role->client_name = $request->client_name;
        $role->mobile = $request->phone;
        $role->door_no = $request->doorno;
        $role->street_name = $request->streetname;
        $role->area_name = $request->area;
        $role->city_id = $request->cityname;
        $role->district_id = $request->districtname;
        $role->state_id = $request->State;
        $role->pincode = $request->pincode;
        $role->crm_id = json_encode($request->crm);
        $role->status = $request->status;
        $role->edit_remark = $request->edit_remarks;
        $role->created_by = session('USER_ID');
        $role->is_approve = 0;
        if ($request->hasfile('client_logo')) {
            $destination = 'clients/' . $role->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('client_logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('clients/', $filename);
            $role->logo = $filename;
        }
        $role->save();

        $role1 = ClientContact::where('client_id', $id)->get();

        $count_contact = count($role1);
        $contact_array = array();
        for ($i = 0; $i < $count_contact; $i++) {
            $c_contact_id = $role1[$i]['id'];

            $c_array = array_push($contact_array, $c_contact_id);
        }
        $c_c_id = $request->client_contact_id;

        //dd($c_c_id);
        $result = array_diff($contact_array, $c_c_id);

        //dd($result);

        if (!empty($result)) {

            for ($i = 0; $i < $count_contact; $i++) {
                if (!empty($result[$i])) {
                    $x = $result[$i];
                    // dd($x);
                    $find = ClientContact::findorfail($x);
                    $find->is_deleted = "Y";
                    $find->update();
                }
            }
        }
        if ($count_contact > 0) {
            foreach ($role1 as $rol) {
                $created_at = $rol->created_at;
                $contact_id = $rol->id;
            }
        } else {
            $created_at = date('Y-m-d H:i:s');
        }
        // $LastInsertId = $id;

        //$role1 = ClientContact::where('client_id',$LastInsertId)->delete();

        $count = count($request->contactname);
        //dd($count);

        //dd($role1);
        for ($i = 0; $i < $count; $i++) {

            if (!empty($role1[$i])) {
                // if(count($role1) > 0){
                //dd('hloo');
                $contact = ClientContact::findorfail($contact_id);
                $contact->client_id = $id;
                $contact->contact_name = $request->contactname[$i];
                $contact->mobile = $request->contactphone[$i];
                $contact->landline_number = $request->contactlandline[$i];
                $contact->email = $request->contactmail[$i];
                $contact->designation = $request->designation[$i];
                $contact->client_branch = $request->contactbranch[$i];
                $contact->door_no = $request->contactdoorno[$i];
                $contact->street_name = $request->contactstreetname[$i];
                $contact->area_name = $request->contactarea[$i];
                $contact->state_id = $request->contactstate[$i];
                $contact->district_id = $request->contactdistrictname[$i];
                $contact->city_id = $request->contactcityname[$i];
                $contact->pincode = $request->contactpincode[$i];
                //dd($request->checkbox[$i]);
                if (!empty($request->checkbox[$i])) {
                    $contact->corporate_address_check = $request->checkbox[$i];
                } else {
                    $contact->corporate_address_check = 0;
                }
                $contact->status = $request->contactstatus[$i];
                $contact->created_by = session('USER_ID');
                $contact->created_at = $created_at;
                //dd($contact);
                $contact->update();
            } else {

                $role1 = new ClientContact;
                $role1->client_id = $id;
                $role1->contact_name = $request->contactname[$i];
                $role1->mobile = $request->contactphone[$i];
                $role1->landline_number = $request->contactlandline[$i];
                $role1->email = $request->contactmail[$i];
                $role1->designation = $request->designation[$i];
                $role1->client_branch = $request->contactbranch[$i];
                $role1->door_no = $request->contactdoorno[$i];
                $role1->street_name = $request->contactstreetname[$i];
                $role1->area_name = $request->contactarea[$i];
                $role1->state_id = $request->contactstate[$i];
                $role1->district_id = $request->contactdistrictname[$i];
                $role1->city_id = $request->contactcityname[$i];
                $role1->pincode = $request->contactpincode[$i];
                //dd($request->checkbox[$i]);
                if (!empty($request->checkbox[$i])) {
                    $role1->corporate_address_check = $request->checkbox[$i];
                } else {
                    $role1->corporate_address_check = 0;
                }
                $role1->status = $request->contactstatus[$i];
                $role1->created_by = session('USER_ID');
                $role1->created_at = $created_at;
                //dd($role1);
                $role1->save();
            }
        }
        return redirect('/viewclient')->with('msg', 'Client Updated successfully.');
    }
    public function fetchdesignation(Request $request)
    {
        // dd($request->all());
        // $designation = client_designation::where('client_designation','LIKE',$request->desg.'%')->get();
        // return response()->json($designation);

        $output = '';
        $designation = client_designation::where('client_designation', 'LIKE', $request->desg . '%')->get();
        $output = '<ul class="list-unstyled unlist wd_58">';
        // echo $designation;
        $count = count($designation);
        // echo $count;
        // die;
        if ($count > 0) {
            foreach ($designation as $desg) {
                $output .= '<li class="pd_12" id="desg_li">' . $desg->client_designation . '</li>';
            }
        } else {
            $output .= '<li class="pd_12">Designation Not Found</li>';
        }
        $output .= '</ul>';

        return response()->json($output);
    }
    public function add_state(Request $request)
    {

        //$find = State::where('state_title',$request->state)->first();
        //dd($find);
        $state = new State;
        $state->state_title = $request->state;
        $state->save();
        // $msg = 'State Inserted Successfully';
        return response()->json(200);
    }
    public function add_district(Request $request)
    {
        // dd($request->dist);
        $district = new District;
        $district->district_title = $request->dist;
        $district->state_id = $request->id;
        $district->save();
        return response()->json();
    }
    public function add_city(Request $request)
    {
        //dd($request->all());
        $city = new city;
        $city->name = $request->city_name;
        $city->districtid = $request->dist_id;
        $city->state_id = $request->state_id;
        $city->save();
        return redirect()->back();
    }

    public function clientfilter(Request $request)
    {
        //dd($request->all());
        $employee = $request->employee;

        $location = $request->location;
        $status = $request->status;
        $approval_status = $request->approval_status;

        $view = DB::table('clients')
            ->where('created_at', '>=', $request->from_date)
            ->where('created_at', '<=', $request->to_date)
            ->when($status, function ($query, $status) {
                $query->where('status', 0);
            })
            ->when($location, function ($query, $location) {
                $query->where('city_id', $location);
            })
            ->when($approval_status, function ($query, $approval_status) {
                $query->where('is_approval', 0);
            })
            ->get();

        //dd($view);

        return view('client.viewclient', compact('view'));
    }
    public function fetch_data(Request $request)
    {
        // dd($request->all());
        $pincode = $request->zip;
        $response = Http::get('https://api.postalpincode.in/pincode/' . $pincode . '');

        $data = $response->json();
        $state = $data[0]['PostOffice'][0]['State'];
        $district = $data[0]['PostOffice'][0]['District'];
        $city = $data[0]['PostOffice'][0]['Block'];

        $s_id = State::where('state_title', $state)->first();

        if (!empty($s_id)) {

            $st_id = $s_id->state_id;
        } else {
            $st = new State;
            $st->state_title = $state;
            $st->save();
            $st_id = $st->state_id;
        }

        $d_id = District::where('district_title', $district)->first();

        if (!empty($d_id)) {

            $dist_id = $d_id->id;
        } else {
            $dt = new District;
            $dt->district_title = $district;
            $dt->state_id = $st_id;
            $dt->save();
            $dist_id = $dt->id;
        }

        $c_id = city::where('name', $city)->first();

        if (!empty($c_id)) {

            $ct_id = $c_id->id;
        } else {

            $ct = new city;
            $ct->name = $city;
            $ct->districtid = $dist_id;
            $ct->state_id = $st_id;
            $ct->save();
            $ct_id = $ct->id;
        }
        return response()->json([$st_id, $dist_id, $ct_id]);
    }
}
