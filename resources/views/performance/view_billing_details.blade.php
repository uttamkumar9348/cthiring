<x-admin-layout>
    <style>
        .wd_25 {
            width: 25%;
        }

        .ad_capital {
            text-transform: uppercase;
            margin-bottom: 0px;
        }
        .mb_0{
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
                        <li class="breadcrumb-item active"><a href="{{url('/View_billing')}}">view Billing Details</a></li>
                        <li class="breadcrumb-item active">{{ $view_bil_details->candidate_name}}</li>
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
                                                <p class="mb_0">{{optional($view_bil_details->client_name)->client_name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Position</th>
                                            <td>
                                                <p class="mb_0">{{$view_bil_details->position_name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            @php
                                            $recruiter=App\Models\Resume::where('id',$view_bil_details->resume_id)->first('created_by');
                                            $recruiter_name=App\Models\User::where('id',$recruiter->created_by)->first('name');
                                            @endphp
                                            <th>Recruiter</th>
                                            <td>
                                                <p class="mb_0">{{$recruiter_name->name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Account Holder</th>
                                            <td>
                                                <p class="mb_0">{{optional ($view_bil_details->user_name)->name}}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Billing Amount</th>
                                            <td>
                                                <p class="mb_0">{{$view_bil_details->billing_amount}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Proof of Offer</th>
                                            <td>
                                                <p class="mb_0"></p>
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
                                                <p class="mb_0">{{$view_bil_details->candidate_name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Billing %</th>
                                            <td>
                                                <p class="mb_0">{{$view_bil_details->bill_percentage}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>CTC Offered</th>
                                            <td>
                                                <p class="mb_0">{{$view_bil_details->ctc_offer}}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Billing Date</th>
                                            <td>{{date('j-F-Y',strtotime($view_bil_details->billing_date))}}</td>
                                        </tr>
                                        <tr>
                                            <th>Joined Date</th>
                                            <td>{{date('j-F-Y',strtotime($view_bil_details->joining_date))}}</td>
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
                                                {{$view_bil_details->sur_name}} {{$view_bil_details->information_person_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Designation:</th>
                                            <td>{{$view_bil_details->designation}}</td>
                                        </tr>
                                        <tr>
                                            <th>Billing Address:</th>
                                            <td>
                                                <p class="ad_capital">{{$view_bil_details->add_doorno}}</p>
                                                <p class="ad_capital">{{$view_bil_details->address_1}}</p>
                                                <p class="ad_capital">{{$view_bil_details->address_2}}</p>
                                                <p class="ad_capital">{{$view_bil_details->state}}</p>
                                                <p class="ad_capital">{{$view_bil_details->city}}</p>
                                                <p class="ad_capital">{{$view_bil_details->pincode}}</p>

                                            </td>
                                        </tr>



                                        <tr>
                                            <th>Courier Address:</th>
                                            <td>
                                                <p class="ad_capital">{{$view_bil_details->door_name_courier}}</p>
                                                <p class="ad_capital"> {{$view_bil_details->address_1_courier}}</p>
                                                <p class="ad_capital">{{$view_bil_details->address_2_courier}}</p>
                                                <p class="ad_capital">{{$view_bil_details->state_courire}}</p>
                                                <p class="ad_capital">{{$view_bil_details->city_courier}}</p>
                                                <p class="ad_capital"> {{$view_bil_details->pincode_courier}}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>GSTN:</th>
                                            <td>{{$view_bil_details->gstn_courier}}</td>
                                        </tr>
                                        <tr>
                                            <th>Remarks:</th>
                                            <td>{{$view_bil_details->remarks}}</td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="wd_25">Export Invoice</th>
                                            <td><button type="button" class="btn btn-success">Download</button></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h1>Invoice Details</h1>
                                <div class="table-responsive">
                                    <table class="table table-bordered wd_21">
                                        <tr>
                                            <th>Invoice No</th>
                                            <td>
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Invoice Date</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Professional Fees</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 pd_0">
                                    <h1>Payment Details</h1>
                                    <div class="table-responsive">
                                        <table class="table table-bordered wd_21">
                                            <tr>
                                                <th>Mode of Payment</th>
                                                <td>
                                                    <p></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Payment Received Date:</th>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Payment Received</th>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Reference No</th>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Shortfall</th>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Payment Remarks</th>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt_btn">



                <a href="{{url('/View_billing')}}">
                    <button type="button" class="btn btn-light">Back</button>
                </a>
            </div>


        </div>
    </div>
</x-admin-layout>