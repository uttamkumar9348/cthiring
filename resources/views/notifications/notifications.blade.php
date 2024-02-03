<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Alerts</li>
                        <li class="breadcrumb-item active">Notifications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="">
                <div class="collapse show">
                    <div class="">
                        <div>
                            <h4><b>Positions</b></h4>
                        </div>
                        <table class="table table-striped dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>Job Code</th>
                                    <th>Job Title</th>
                                    <th>Client</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($view as $loc)

                                @php
                                if($loc->is_approve==1){
                                @endphp

                                <tr>
                                    <td>{{$loc->job_code}}</td>
                                    <td>{{$loc->job_title}}</td>
                                    <td>{{optional ($loc->client_na)->client_name }}</td>
                                    @if ($loc->status == 1)
                                    <td><span class="badge badge-default badge-success">Assigned</span></td>

                                    @else

                                    <td><span class="badge badge-default badge-danger">Inactive</span></td>

                                    @endif
                                    <td>{{optional ($loc->position_create)->fname}}{{optional ($loc->position_create)->lname}}</td>
                                    <td>{{$loc->created_at}}</td>
                                    <td>{{$loc->updated_at}}</td>
                                </tr>
                                @php
                                }
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Job Code</th>
                                    <th>Job Title</th>
                                    <th>Client</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <br>
                    <div class="">
                        <div>
                            <h4><b>Resumes</b></h4>
                        </div>
                        <table class="table table-striped dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Candidate</th>
                                    <th>Client</th>
                                    <th>Job Title</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($resume as $loc)

                                <tr>
                                    <td>{{$loc->resume_code}}</td>
                                    <td>{{$loc->name}}</td>
                                    <td>{{optional($loc->view_nameofclient)->client_name}}</td>
                                    <td>{{optional($loc->jobname)->job_title}}</td>
                                    @if ($loc->cv_status == 1)
                                    <td><span class="badge badge-default badge-success">Assigned</span></td>

                                    @else

                                    <td><span class="badge badge-default badge-danger">Inactive</span></td>

                                    @endif
                                    <td>{{optional($loc->username_of_resume)->fname}}{{optional($loc->username_of_resume)->lname}}</td>
                                    <td>{{$loc->created_at}}</td>
                                    <td>{{$loc->updated_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Candidate</th>
                                    <th>Client</th>
                                    <th>Job Title</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
</x-admin-layout>