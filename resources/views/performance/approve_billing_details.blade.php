<x-admin-layout>
    <style>
        .wd_25 {
            width: 25%;
        }

        .ad_capital {
            text-transform: uppercase;
            margin-bottom: 0px;
        }
    </style>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Performance</li>
                        <li class="breadcrumb-item active"><a href="{{url('/approve_billing')}}">Approve Billing</a></li>
                        <li class="breadcrumb-item active">{{($approve_bil_details->user_name)->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="collapse show">
                <div class="pd_lr_body">
                    <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered wd_21">
                                        <tr>
                                            <th>Client Name</th>
                                            <td>
                                                <p>{{optional($approve_bil_details->client_name)->client_name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Position</th>
                                            <td>
                                                <p>{{$approve_bil_details->position_name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            @php
                                            $recruiter=App\Models\Resume::where('id',$approve_bil_details->resume_id)->first('created_by');
                                            $recruiter_name=App\Models\User::where('id',$recruiter->created_by)->first('name');
                                            @endphp
                                            <th>Recruiter</th>
                                            <td>
                                                <p>{{$recruiter_name->name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Account Holder</th>
                                            <td>
                                                <p>{{optional ($approve_bil_details->user_name)->name}}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Billing Amount</th>
                                            <td>
                                                <p>{{$approve_bil_details->billing_amount}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Proof of Offer</th>
                                            <td>
                                                <p></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered wd_21">
                                        <tr>
                                            <th>Candidate Name</th>
                                            <td>
                                                <p>{{$approve_bil_details->candidate_name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Billing %</th>
                                            <td>
                                                <p>{{$approve_bil_details->bill_percentage}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>CTC Offered</th>
                                            <td>
                                                <p>{{$approve_bil_details->ctc_offer}}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Billing Date</th>
                                            <td>{{date('j-F-Y',strtotime($approve_bil_details->billing_date))}}</td>
                                        </tr>
                                        <tr>
                                            <th>Joined Date</th>
                                            <td>{{date('j-F-Y',strtotime($approve_bil_details->joining_date))}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 cnt223">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 pd_0">
                                <h1>Additional Client Information</h1>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Address To:</th>
                                            <td>
                                                {{$approve_bil_details->sur_name}} {{$approve_bil_details->information_person_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Designation:</th>
                                            <td>{{$approve_bil_details->designation}}</td>
                                        </tr>
                                        <tr>
                                            <th>Billing Address:*</th>
                                            <td>
                                                <p class="ad_capital">{{$approve_bil_details->add_doorno}}</p>
                                                <p class="ad_capital">{{$approve_bil_details->address_1}}</p>
                                                <p class="ad_capital">{{$approve_bil_details->address_2}}</p>
                                                <p class="ad_capital">{{$approve_bil_details->state}}</p>
                                                <p class="ad_capital">{{$approve_bil_details->city}}</p>
                                                <p class="ad_capital">{{$approve_bil_details->pincode}}</p>
                                            </td>
                                        </tr>



                                        <tr>
                                            <th>Courier Address:*</th>
                                            <td>
                                                <p class="ad_capital">{{$approve_bil_details->door_name_courier}}</p>
                                                <p class="ad_capital"> {{$approve_bil_details->address_1_courier}}</p>
                                                <p class="ad_capital">{{$approve_bil_details->address_2_courier}}</p>
                                                <p class="ad_capital">{{$approve_bil_details->state_courire}}</p>
                                                <p class="ad_capital">{{$approve_bil_details->city_courier}}</p>
                                                <p class="ad_capital"> {{$approve_bil_details->pincode_courier}}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>GSTN:*</th>
                                            <td>{{$approve_bil_details->gstn_courier}}</td>
                                        </tr>
                                        <tr>
                                            <th>Remarks:</th>
                                            <td>{{$approve_bil_details->remarks}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt_btn">
                
                @php
                    $levels = App\Models\User::where('id', $approve_bil_details->created_by)->first(['level_1', 'level_2']);
                @endphp
                
                @if($levels->level_1 == session('USER_ID'))
                    @if($approve_bil_details->approved_by_L1 == 0)
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#approv_modal">Approve</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject_modal">Reject</button>
                    <a href="{{url('/approve_billing')}}">
                        <button type="button" class="btn btn-light">Cancel</button>
                    </a>
                    @else
                    <a href="{{url('/approve_billing')}}">
                        <button type="button" class="btn btn-light">Back</button>
                    </a>
                    @endif
                @endif
                
                @if($levels->level_2 == session('USER_ID'))
                    @if($approve_bil_details->approved_by_L2 == 0)
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#approv_modal">Approve</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject_modal">Reject</button>
                    <a href="{{url('/approve_billing')}}">
                        <button type="button" class="btn btn-light">Cancel</button>
                    </a>
                    @else
                    <a href="{{url('/approve_billing')}}">
                        <button type="button" class="btn btn-light">Back</button>
                    </a>
                    @endif
                @endif
                
            </div>

            <!-- approval modal start -->
            <div class="modal fade text-left" id="approv_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Approve Billing</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{url('/approv_bill')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="billing_id" value="{{$approve_bil_details->id}}">
                                <label for="textarea">Remarks</label><br>
                                <textarea name="approve_billing_remarks" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn grey btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- approval modal end -->
            <!-- reject modal start -->
            <div class="modal fade text-left" id="reject_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Reject Billing</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{url('/reject_bill')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="billing_id" value="{{$approve_bil_details->id}}">
                                <label for="textarea">Remarks</label><br>
                                <textarea name="reject_billing_remarks" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn grey btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
            <!-- reject modal end -->
        </div>
    </div>
</x-admin-layout>