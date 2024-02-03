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
                        <li class="breadcrumb-item active">View Leave</li>
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
                            <th>Leave From</th>
                            <th>Leave To</th>
                            <th>Reason</th>
                            <th>Session</th>
                            <th>Leave Type</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($leave as $view)

                        @php
                        $level_id=App\Models\User::where('id',$view->user_id)->get(['level_1','level_2']);
                        @endphp

                        @if($level_id[0]->level_1==session('USER_ID')||$level_id[0]->level_2==session('USER_ID'))
                        @if ($view->status == 0)
                        <tr>
                            <td>{{date('j F-Y', strtotime($view->leave_from))}}</td>
                            <td>{{date('j F-Y', strtotime($view->leave_to))}}</td>
                            <td>{{$view->reason}}</td>
                            <td>{{$view->session}}</td>
                            <td>{{$view->leave_type}}</td>
                            @if ($view->status == 0)
                            <td><span class="badge badge-default badge-danger" style="background-color:#F5AA1A!important;">Approval Awaiting</span></td>
                            @elseif ($view->status == 1)
                            <td><span class="badge badge-default badge-success">Approved</span></td>
                            @elseif ($view->status == 2)
                            <td><span class="badge badge-default badge-danger">Rejected</span></td>
                            @elseif ($view->status == 3)
                            <td><span class="badge badge-default badge-secondary">Canceled</span></td>
                            @endif

                            <td>{{date('d-F-Y', strtotime($view->created_at))}}</td>
                            <td style="margin-left:7px;">
                                <a href="{{url('/leavedetails',$view->id)}}">
                                    <i class="ft-eye text-success"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endif
                        @if ($view->user_id==session('USER_ID'))
                        @if ($view->status == 1 || $view->status == 2 || $view->status == 3)
                        <tr>
                            <td>{{date('j F-Y', strtotime($view->leave_from))}}</td>
                            <td>{{date('j F-Y', strtotime($view->leave_to))}}</td>
                            <td>{{$view->reason}}</td>
                            <td>{{$view->session}}</td>
                            <td>{{$view->leave_type}}</td>
                            @if ($view->status == 0)
                            <td><span class="badge badge-default badge-danger" style="background-color:#F5AA1A!important;">Approval Awaiting</span></td>
                            @elseif ($view->status == 1)
                            <td><span class="badge badge-default badge-success">Approved</span></td>
                            @elseif ($view->status == 2)
                            <td><span class="badge badge-default badge-danger">Rejected</span></td>
                            @elseif ($view->status == 3)
                            <td><span class="badge badge-default badge-secondary">Canceled</span></td>
                            @endif

                            <td>{{date('d-F-Y', strtotime($view->created_at))}}</td>
                            <td style="margin-left:7px;">
                                <a href="{{url('/leavedetails',$view->id)}}">
                                    <i class="ft-eye text-success"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
</x-admin-layout>