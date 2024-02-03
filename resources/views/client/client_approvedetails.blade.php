<x-admin-layout>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Clients</li>
                        <li class="breadcrumb-item active">Client Approve</li>
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
        <div class="col-md-12">
            <div id="user-profile">
                <div class="row">
                    <div class="col-12 mt_94">
                        <div class="card profile-with-cover">
                            <!-- <div class="card-img-top img-fluid bg-cover height-300" style="background: url('../../../app-assets/images/carousel/22.jpg') 50%;"></div> -->
                            <div class="media profil-cover-details w-100">
                                <div class="media-left pl-2 pt-2">
                                    <a href="#" class="profile-image">
                                        @if ($view->logo != '')
                                        <img src="/clients/{{$view->logo}}" class="rounded-circle img-border height-100" alt="Card image">
                                        @else
                                        <img src="/logo/profile.jpg" class="rounded-circle img-border height-100" alt="Card image">
                                        @endif
                                    </a>
                                </div>
                                <!-- <div class="media-body pt-3 px-2">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title">{{$view->client_name}}</h3>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <h3 class="card-title" style="position: absolute;left: 120px;bottom: 20px;">{{$view->client_name}}</h3>
                            <nav class=" navbar navbar-light navbar-profile align-self-end">
                                <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"></button>
                                <nav class="navbar navbar-expand-lg">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-user"></i> Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#menu1"><i class="la la-users"></i> Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 pd_0">
                <div class="">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="collapse show">
                                <div class="pd_0">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12 p_left">
                                                <div class="table-responsive">
                                                    <table class="table wd_37">
                                                        <tr>
                                                            <th>Client Name</th>
                                                            <td>{{$view->client_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Address</th>
                                                            <td>{{$view->area_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>City/Town</th>
                                                            <td>{{optional ($view->citys)->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>CRM</th>
                                                            @php
                                                            $test='';
                                                            $test=json_decode($view->crm_id);
                                                            $count=count($test);
                                                            @endphp
                                                            <td style="text-align: left;">
                                                                @php
                                                                for($i=0;$i<$count;$i++){ $crm_name=App\Models\User::where('id',$test[$i])->
                                                                    get();
                                                                    @endphp <span class="badge badge-primary">
                                                                        {{$crm_name[0]->fname}}
                                                                        {{$crm_name[0]->lname}}</span>

                                                                    @php
                                                                    }

                                                                    @endphp
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Created By</th>
                                                            <td>{{optional($view->Use)->fname}}{{optional($view->Use)->lname}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Created</th>
                                                            <td>{{date('j F-Y', strtotime($view->created_at))}}</td>
                                                        </tr>

                                                        @if($view->edit_remark != null)
                                                        <tr>
                                                            <th>Revision Remarks</th>
                                                            <td>{{$view->edit_remark}}</td>
                                                        </tr>
                                                        @endif
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 p_right">
                                                <div class="table-responsive">
                                                    <table class="table wd_37">
                                                        @if($view->edit_remark != null)
                                                        <tr>
                                                            <th>Modified By</th>
                                                            <td>{{optional($view->Use)->fname}}{{optional($view->Use)->lname}}</td>

                                                        </tr>
                                                        <tr>
                                                            <th>Modified</th>
                                                            <td>{{date('j F-Y', strtotime($view->updated_at))}}</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <th>State</th>
                                                            <td>{{optional ($view->state)->state_title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>District</th>
                                                            <td>{{optional ($view->dist)->district_title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pincode</th>
                                                            <td>{{$view->pincode}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Approve</th>
                                                            @if ($view->is_approve == 1)
                                                            <td><span class="badge badge-default badge-success">Approved</span></td>
                                                            @else
                                                            <td><span class="badge badge-default badge-warning">Pending</span></td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <th>Status (Reporting)</th>
                                                            @if ($view->status == 1)
                                                            <td><span class="btn_size_2">Active</span></td>
                                                            @else
                                                            <td><span class="btn_size_3">Inactive</span></td>
                                                            @endif
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row match-height">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="collapse show table-responsive">
                                            <div class="">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#home">Client Contacts</a>
                                                    </li>
                                                </ul>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Primary SPOC</th>
                                                            <th>Mobile</th>
                                                            <th>Designation</th>
                                                            <th>Branch</th>
                                                            <th>Created By</th>
                                                            <th>Created</th>
                                                            <th>Modified</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @php $i=1 @endphp
                                                        <tr>
                                                            @foreach($view2 as $result_client)
                                                            <td>{{$i}}</td>
                                                            <td>{{$result_client->contact_name}}</td>
                                                            <td>{{$result_client->email}}</td>
                                                            <td>{{$result_client->contact_name}}</td>
                                                            <td>{{$result_client->mobile}}</td>
                                                            <td>{{$result_client->designation}}</td>
                                                            <td>{{optional ($result_client->c_branch)->location}}</td>
                                                            <td>{{optional($view->Use)->fname}} {{optional($view->Use)->lname}}</td>
                                                            <td>{{date('j F-Y', strtotime($result_client->created_at))}}</td>
                                                            <td>{{date('j F-Y', strtotime($result_client->updated_at))}}</td>
                                                        </tr>
                                                        @php $i++ @endphp
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade"><br>
                            <div class="row match-height">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="collapse show table-responsive">
                                            <div class="">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#home">Client Contacts</a>
                                                    </li>
                                                </ul>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Primary SPOC</th>
                                                            <th>Mobile</th>
                                                            <th>Designation</th>
                                                            <th>Branch</th>
                                                            <th>Created By</th>
                                                            <th>Created</th>
                                                            <th>Modified</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i=1
                                                        @endphp
                                                        <tr>
                                                            @foreach($view2 as $result_client)
                                                            <td>{{$i}}</td>
                                                            <td>{{$result_client->contact_name}}</td>
                                                            <td>{{$result_client->email}}</td>
                                                            <td>{{$result_client->contact_name}}</td>
                                                            <td>{{$result_client->mobile}}</td>
                                                            <td>{{$result_client->designation}}</td>
                                                            <td>{{optional ($result_client->c_branch)->location}}</td>
                                                            <td>{{optional($view->Use)->fname}} {{optional($view->Use)->lname}}</td>
                                                            <td>{{date('j F-Y', strtotime($result_client->created_at))}}</td>
                                                            <td>{{date('j F-Y', strtotime($result_client->updated_at))}}</td>
                                                        </tr>
                                                        @php
                                                        $i++
                                                        @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="mt_btn">
                        <a href="{{url('/approveclient')}}">
                            <button type="button" class="btn btn-secondary">Back</button></a>
                        @php
                        $user_id= App\Models\User::where('id',session('USER_ID'))->get('role_id');
                        @endphp

                        @if($user_id[0]->role_id==2)
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#default">
                            Approve
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#default1">Reject</button>
                        @endif
                    </div>
                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel1">Approve Client</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{url('approve_details/approve_dtl')}}" method="POST">
                                        @csrf
                                        <label for="textarea">Remarks</label><br>
                                        <textarea name="remarks" class="form-control"></textarea>
                                        <input type="hidden" name="c_id" value="{{$view->id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn grey btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- reject client modal -->
                    <div class="modal fade text-left" id="default1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel1">Reject Client</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{url('approve_details/reject_dtl')}}" method="POST">
                                        @csrf
                                        <label for="textarea">Remarks</label><br>
                                        <textarea name="remarks" class="form-control"></textarea>
                                        <input type="hidden" name="c_id" value="{{$view->id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn grey btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Form wizard with icon tabs section end -->

                </div>
            </div>

        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
    </div>
    </div>
    </div>
</x-admin-layout>