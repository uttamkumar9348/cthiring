<x-admin-layout>

 
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">My plans</li>
                        <li class="breadcrumb-item active">View work plan</li>
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
            <div class="collapse show table-responsive">
                <table class="table table-striped dataex-html5-selectors js-serial">
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
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($student as $plan)
                       
                        @php
                        if($plan->approve_status==1 || $plan->approve_status==2){
                        @endphp
                        @if(session('USER_ID') == $plan->created_by)
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
                            <td>{{date('j F-Y', strtotime($plan->created_at))}}</td>

                            @if($plan->approve_status==1)
                            <td><span class="badge badge-default badge-success">Approved</span></td>
                            @elseif($plan->approve_status==2)
                            <td><span class="badge badge-default badge-danger">Rejected</span></td>
                            @endif


                            <td>{{$plan->remarks}}</td>
                            @php
                            $dta=date('Y-m-d', strtotime($plan->created_at));
                            $date = date('Y-m-d', time());
                            @endphp

                            @if($dta==$date)
                            <td>
                                <a href="{{url('/edit_plan',$plan->id)}}">
                                    <i class="ft-edit text-success"></i>
                                </a>
                            </td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @endif
                        @php
                        }
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        function addRowCount(tableAttr) {
              $(tableAttr).each(function(){
                $('th:first-child, thead td:first-child', this).each(function(){
                  var tag = $(this).prop('tagName');
                  $(this).before('<'+tag+'>#</'+tag+'>');
                });
                $('td:first-child', this).each(function(i){
                  $(this).before('<td>'+(i+1)+'</td>');
                });
              });
            }
            
            // Call the function with table attr on which you want automatic serial number
            addRowCount('.js-serial');
    </script>
        <!-- Form wizard with icon tabs section end -->
</x-admin-layout>