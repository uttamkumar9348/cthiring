<x-admin-layout>

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Performance</li>
                        <li class="breadcrumb-item active">View Billing</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('roleinster'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('roleinster')}}
    </div>
    @endif
    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="collapse show">
                <table class="table table-striped dataex-html5-selectors">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Candidate Name</th>
                            <th>Position</th>
                            <th>Client Name</th>
                            <th>Billing Amount</th>
                            <th>Billing Date</th>
                            <th>Recruiter</th>
                            <th>CRM</th>
                            <th>Created Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    @php
                    $j=1;
                    @endphp

                    @foreach($view as $view_billing)
                    @if($view_billing->approved_by_L1==1 && $view_billing->approved_by_L2==1)

                    @php
                    $approve_by=App\Models\User::where('id',$view_billing->created_by)->first(['level_1','level_2']);
                    @endphp
                    @php
                    $recruiter=App\Models\Resume::where('id',$view_billing->resume_id)->first('created_by');
                    $recruiter_name=App\Models\User::where('id',$recruiter->created_by)->first('name');

                    @endphp


                    @if($view_billing->created_by==session('USER_ID'))


                    <tbody>
                        <tr>
                            <td>{{$j}}</td>
                            <td><a href="{{url('/View_billing_details',$view_billing->id)}}">{{$view_billing->candidate_name}}</a></td>
                            <td>{{$view_billing->position_name}}</td>
                            <td>{{optional($view_billing->client_name)->client_name}}</td>
                            <td>{{$view_billing->billing_amount}}</td>
                            <td>{{date('j-F-Y',strtotime($view_billing->billing_date))}}</td>
                            <td>{{$recruiter_name->name}}</td>
                            <td>{{optional ($view_billing->user_name)->name}}</td>
                            <td>{{date('j-F-Y H:i a',strtotime($view_billing->created_at))}}</td>
                            <td class="pd_0" style="vertical-align: middle;">
                                @if($view_billing->approved_by_L1==1)
                                <span class="p_d" data-toggle="popover" data-trigger="hover" data-content="{{optional ($approve_by->user)->name}} ({{date('j-F-Y H:i a',strtotime($view_billing->approve_reject_L1_time))}} Approved)" data-placement="top">L1 - A</span>
                                @endif
                                @if($view_billing->approved_by_L2==1)
                                <span class="p_d" data-toggle="popover" data-trigger="hover" data-content="{{optional ($approve_by->user2)->name}} ({{date('j-F-Y H:i a',strtotime($view_billing->approve_reject_L2_time))}} Approved)" data-placement="top">L2 - A</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>

                    @php
                    $j++;
                    @endphp

                    @endif
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });
    </script>

</x-admin-layout>