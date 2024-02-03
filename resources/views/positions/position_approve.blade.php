<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Positions</li>
                        <li class="breadcrumb-item active">Approve Position</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

     @if(session()->has('msg'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('msg')}}
    </div>
    @endif
     <!--Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="">
                <div class="collapse show">
                    <div class="table-responsive">
                        <table class="table table-striped dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Client</th>
                                    <th>Total Openings</th>
                                    <th>CRM</th>
                                    <th>Recruiters</th>
                                    <th>Status</th>
                                    <th>Pending</th>
                                    <th>Created By</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @if(!empty($view[0]))
                            <tbody>

                                @php
                                $i=1;
                                @endphp
                                @foreach($view as $loc)

                                @php
                                if($loc->is_approve==0){
                                @endphp
                              @php
                            $level_id=App\Models\User::where('id',$loc->recruiters)->get();
                            @endphp
                           
                                @php
                                if($level_id[0]->level_1 == session('USER_ID')){
                                @endphp

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="click to view the details" style="text-align: left;"><a href="{{url('/position_approve_details',[$loc->position_id,$loc->id])}}">{{$loc->job_title}}</a>
                                    </td>
                                    <td style="text-align: left;">{{optional ($loc->client_na)->client_name }}</td>
                                    <td style="text-align: left;">{{$loc->total_opening}}</td>
                                    <td style="text-align: left;">
                                        @php
                                        $test=json_decode($loc->crm);
                                        @endphp
                                        @foreach($test as $test1)
                                        @php

                                        $crm_name=App\Models\User::where('id',$test1)->get();

                                        @endphp
                                        <span class="badge badge-primary">
                                            {{$crm_name[0]->fname}} {{$crm_name[0]->lname}}</span>

                                        @endforeach
                                    </td>
                                    @php
                                    $recruiter_id=App\Models\Position::where('id', $loc->id)->get('recruiters');
                                    @endphp
                                    <td style="text-align: left;">
                                        @foreach($recruiter_id as $recruiter_name)
                                        <span class="badge badge-primary">
                                            {{optional ($recruiter_name->client_requiter)->fname}}{{optional ($recruiter_name->client_requiter)->lname}}
                                        </span>
                                        @endforeach
                                    </td>
                                    @if ($loc->is_approve == 1)
                                    <td><span class="badge badge-default badge-success">Approved</span></td>
                                    @else
                                    <td><span class="badge badge-default badge-warning">Pending</span> </td>
                                    @endif
                                    <td><span class="badge badge-default badge-warning">
                                            {{(($loc->created_at)->diffForHumans(now()))}}
                                        </span>
                                    </td>
                                    <td>{{optional($loc->position_create)->fname}}{{optional($loc->position_create)->lname}}
                                    </td>
                                    <td>{{$loc->created_at}}</td>
                                    <td>{{$loc->updated_at}}</td>
                                    <td><a href="{{url('/position_approve_details',[$loc->position_id,$loc->id])}}">
                                            <i class="fa fa-external-link" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                }
                                @endphp



                                @php
                                }
                                @endphp
                                @endforeach

                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Form wizard with icon tabs section end -->


</x-admin-layout>