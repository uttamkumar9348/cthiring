<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Positions</li>
                        <li class="breadcrumb-item active">CRM Change Approval</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="">
                <div class="collapse show ">
                    <div class="table-responsive">
                        <table class="table table-striped dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Client</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Modified Date</th>
                                    <th>Info</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($crm as $loc)

                                @php
                                $position = App\Models\Position::where('position_id',$loc->position_id)->where('crm_change_status','=','1')->get('job_title');
                                $client = App\Models\client::where('id',$loc->client_id)->get('client_name');
                                $user = App\Models\User::where('id',$loc->old_crm_id)->get();
                                $new_crm = App\Models\User::where('id',$loc->new_crm_id)->get();
                                @endphp
                                @if (session('USER_ID') == $user[0]->level_1)
                                    <tr>
                                    <td data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="click to view the details" style="text-align: left;"><a href="">{{$position[0]->job_title}}</a></td>
                                    <td>{{$client[0]->client_name}}</td>
                                    <td>
                                        @if ($loc->status == 1)
                                        <p>Approved ({{date('j F-Y',strtotime($loc->updated_at))}})</p>
                                        @elseif ($loc->status == 2)
                                        <p>Rejected ({{date('j F-Y',strtotime($loc->updated_at))}})</p>
                                        @endif
                                    </td>
                                    <td>{{$user[0]->fname}} {{$user[0]->lname}}</td>
                                    <td>
                                        @if ($loc->status == 0)
    
                                        @else
                                            {{date('j F-Y',strtotime($loc->updated_at))}}
                                        @endif</td>
                                    <td>
                                        <p style="margin-bottom:0px;">Old Created By : {{$user[0]->fname}}</p>
                                        <p>({{$loc->from_work_date}} - {{$loc->to_work_date}})</p>

                                        <p style="margin-bottom:0px;">New Created By : {{$new_crm[0]->fname}}</p>
                                        <p>({{$loc->new_crm_assign_date}})</p>
                                    </td>
                                    <td>{{$loc->remarks}}</td>
                                    <td>
                                        @if ($loc->status == 0)
                                        <select name="crm_approve_status" class="form-control" id="approve_status">
                                            <option value="">Select</option>
                                            <option value="1">Approve</option>
                                            <option value="2">Reject</option>
                                        </select>
                                        @else
                                        <select name="crm_approve_status" class="form-control" id="approve_status" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{$loc->status == 1 ? 'selected':''}}>Approve</option>
                                            <option value="2" {{$loc->status == 2 ? 'selected':''}}>Reject</option>
                                        </select>
                                        @endif

                                        <input type="hidden" value="{{$loc->new_crm_id}}" id="new_createdby">
                                        <input type="hidden" value="{{$loc->position_id}}" id="position_id">
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Client</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Modified Date</th>
                                    <th>Info</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
    <script>
        $(document).ready(function() {
            $('#approve_status').change(function() {
                var approve_status = this.value;
                var new_createdby = document.getElementById('new_createdby').value;
                var position = document.getElementById('position_id').value;
                // alert(new_createdby);
                if (approve_status == 1) {
                    $.ajax({
                        url: "{{url('approve_status')}}",
                        type: "POST",
                        data: {
                            approve_status: approve_status,
                            new_createdby: new_createdby,
                            position: position,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',

                        success: function(result) {
                            location.reload();
                        },
                    });
                } else {
                    $.ajax({
                        url: "{{url('reject_status')}}",
                        type: "POST",
                        data: {
                            approve_status: approve_status,
                            new_createdby: new_createdby,
                            position: position,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',

                        success: function(result) {
                            location.reload();
                        },
                    });
                }
            });
        });
    </script>
</x-admin-layout>