<x-admin-layout>
    <style>
        body.vertical-layout.vertical-menu-modern.menu-expanded .footer {
            margin-left: 0px;
        }
    </style>


    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">My plans</li>
                        <li class="breadcrumb-item active">Approve Work plan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="collapse show">
                <table class="table table-striped dataex-html5-selectors">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Session</th>
                            <th>Work Type</th>
                            <th>Work Description</th>
                            <th>Work Description2</th>
                            <th>CTC in (Lacs)</th>
                            <th>Created_by</th>
                            <th>Created</th>
                            <th>Approve status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student as $plan)
                        @php
                        $dta=date('Y-m-d', strtotime($plan->created_at));
                        $date = date('Y-m-d', time());
                        @endphp

                        @php
                        $level_id=App\Models\User::where('id',$plan->created_by)->get(['level_1','level_2']);
                        @endphp
                        @if($level_id[0]->level_1==session('USER_ID')||$level_id[0]->level_2==session('USER_ID'))

                        @if($dta==$date && $plan->approve_status==0)
                        <tr>
                            <td><span class="badge badge-default badge-danger">{{date('j F-Y', strtotime($plan->task_date))}}</span></td>
                            <td>{{$plan->day_work_name}}</td>
                            <td>{{$plan->work_plan_type}}</td>
                            @if(!$plan->client_name==null)
                            <td>{{$plan->plan2->client_name}}</td>
                            @else
                            <td>{{$plan->others_option}}</td>
                            @endif

                            @if(!$plan->position_id==null)
                            <td>{{$plan->plan->job_title}}</td>
                            @else
                            <td>{{$plan->subject}}</td>
                            @endif
                            <td>{{$plan->ctc}}</td>
                            <td>{{($plan->plan3)->fname}} {{($plan->plan3)->lname}}</td>
                            <td>{{date('j F-Y',strtotime($plan->created_at))}}</td>

                            @if ($plan->approve_status == 0)
                            <td><span class="badge badge-default badge-danger" style="background-color:#F5AA1A!important;">Approval Awaited</span></td>

                            @elseif($plan->approve_status == 1)
                            <td><span class="badge badge-default badge-success">Approved</span></td>
                            @elseif($plan->approve_status == 2)

                            <td><span class="badge badge-default badge-danger">Rejected</span></td>

                            @endif
                            <!--<td>{{$plan->remarks}}</td>-->
                            @if ($level_id[0]->level_1==session('USER_ID')||$level_id[0]->level_2==session('USER_ID'))
                            @if ($plan->approve_status==0)
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter{{$plan->id}}">
                                    Approve
                                </button>

                                <!-------------------------------------------Modal1--------------------------------------------------------->
                                <div class="modal fade" id="exampleModalCenter{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Approve Plan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{url('/plan_approve_remark',$plan->id)}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Remarks</th>
                                                                    <!-- // <td><textarea class="form-control"></textarea></td> -->
                                                                    <td><textarea name="remarks" class="form-control"></textarea></td>

                                                                    <input type="hidden" name="plan_id" value="{{$plan->created_by}}">
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter1{{$plan->id}}">
                                    Reject
                                </button>

                                <!-------------------------------------------Modal2--------------------------------------------------------->
                                <div class="modal fade" id="exampleModalCenter1{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Reject Plan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{url('/plan_reject_remark',$plan->id)}}" method="POST">
                                                    @csrf
                                                    <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Remarks</th>
                                                                    <!-- // <td><textarea class="form-control"></textarea></td> -->
                                                                    <td class="pd_0"><textarea name="remarks" class="form-control"></textarea></td>

                                                                    <input type="hidden" name="plan_id" value="{{$plan->created_by}}">
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @else
                            <td></td>
                            @endif
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @else
                        <tr></tr>
                        @endif
                        @else
                        <p></p>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt_btn">
                <a href="{{url('/plan_view')}}">
                    <button type="button" class="btn btn-primary">Back</button>
                </a>
            </div>
        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</x-admin-layout>