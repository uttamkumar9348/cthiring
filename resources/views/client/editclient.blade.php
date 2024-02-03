<x-admin-layout>
    <style>
        .error {
            color: red;
        }

        .unlist {
            background-color: #eee;
            cursor: pointer;
            margin-bottom: 0px;
        }

        .pd_12 {
            padding: 0px 10px;
        }

        .select2-container {
            width: 393.8px !important;
        }
    </style>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Clients</li>
                        <li class="breadcrumb-item active">Edit Client</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="">
                <div class="collapse show">
                    <div class="">
                        <form action="{{url('/update_client',$view->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="mytabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home">Client</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu1">Client Contact</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active pd_0"><br>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <table class="table">
                                                        <tr>
                                                            <th>
                                                                <label for="">Client Name <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="clientname" name="client_name" value="{{$view->client_name}}">
                                                                <span class="error" id="er_clientname"></span>
                                                            </td>
                                                        </tr>

                                                        <tr rowspan="2">
                                                            <th>
                                                                <label for="">Address</label>
                                                            </th>
                                                            <td>
                                                                <div class="row wd_70">
                                                                    <div class="col-md-6 p_right">
                                                                        <input type="text" class="form-control" id="doorno" name="doorno" placeholder="Door No." value="{{$view->door_no}}">
                                                                    </div>
                                                                    <div class="col-md-6 p_left">
                                                                        <input type="text" class="form-control" id="streetname" name="streetname" placeholder="Street Name" value="{{$view->street_name}}">
                                                                    </div>
                                                                    <div class="col-md-12 mt_5">
                                                                        <input type="text" class="form-control" id="area" name="area" placeholder="Area" value="{{$view->area_name}}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">State <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <select class="select2 form-control wd_58" name="State" id="statename">
                                                                    <option value="0">Select</option>
                                                                    @foreach($state_name as $loc)
                                                                    <option value="{{$loc->state_id}}" {{$loc->state_id == $view->state_id ? 'selected':''}}>
                                                                        {{$loc->state_title}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="error" id="er_state"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">District <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <select class="select2 form-control wd_58" id="distname" name="districtname">
                                                                    <option value="0">Select</option>

                                                                    @foreach($district as $loc)
                                                                    <option value="{{$loc->id}}" {{$loc->id == $view->district_id ? 'selected':''}}>
                                                                        {{$loc->district_title}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="error" id="er_distname"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">City <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <select class="select2 form-control wd_58" id="city" name="cityname">
                                                                    <option value="0">Select</option>
                                                                    @foreach($city as $loc)
                                                                    <option value="{{$loc->id}}" {{$loc->id == $view->city_id ? 'selected':''}}>
                                                                        {{$loc->name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="error" id="er_city"></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-6">
                                                    <table class="table wd_16">
                                                        <tr>
                                                            <th>
                                                                <label for="">Pincode <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" id="pincode" name="pincode" value="{{$view->pincode}}">
                                                                <span class="error" id="er_pincode"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">CRM <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                @php

                                                                $test='';
                                                                $test=json_decode($view->crm_id);
                                                                $count=count($test);

                                                                @endphp
                                                                <select class="select2 form-control wd_58" id="crm" name="crm[]" multiple value="{{session()->has('client')?session('client')['CLIENT_CRM']:''}}">
                                                                    @php
                                                                    for($i=0;$i<$count;$i++){ @endphp @foreach ($crm_user as $crm1 ) <option value="{{$crm1->id}}" {{$crm1->id == $test[$i] ? 'selected':''}}>{{$crm1->fname}}{{$crm1->lname}}
                                                                        </option>
                                                                        @endforeach

                                                                        @php
                                                                        }
                                                                        @endphp
                                                                </select>
                                                                <span class="error" id="er_crm"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Status <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" data-toggle="tooltip" data-trigger="hover" data-placement="top" name="status">
                                                                    <option value="0">Select</option>
                                                                    <option value="1" @if ($view-> status=='1') selected
                                                                        @endif>Active
                                                                    </option>

                                                                    <option value="2" @if($view->status=='2')selected
                                                                        @endif>Inactive
                                                                    </option>
                                                                </select>
                                                                <span class="error" id="er_status"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Logo <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <input type="file" class="form-control wd_58" name="client_logo">
                                                                
                                                                @if ($view->logo != '')
                                                                <img src="../clients/{{$view->logo}}" style="height: 95px;width: 89px;">
                                                                @else
                                                                <img src="/logo/profile.jpg" style="height: 95px;width: 89px;">
                                                                
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Remarks <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control wd_58" name="edit_remarks" id="remarks"></textarea>
                                                                <span class="error" id="er_remarks"></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                         <button type="button" class="btn btn-primary f_right" onclick="show1();">Next</button>
                                    </div>

                                    <!-- client contact  form  start-->

                                    <div id="menu1" class="tab-pane fade pd_0"><br>
                                        <div class="">
                                            <div id="repeater">
                                                 @foreach($view2 as $contact)
                                                <div class="row" id="repeat_div">
                                                        <div class="col-6">
                                                            <table class="table wd_21">
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Contact Person <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="hidden" name="client_contact_id[]" value="{{$contact->id}}">
                                                                        <input type="text" class="form-control wd_58" id="contact" name="contactname[]" value="{{$contact->contact_name}}">
                                                                        <span class="error" id="er_contact"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Contact Person Phone <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        
                                                                        <!--<input type="text" class="form-control wd_58" id="contactphone" name="contactphone[]" value="{{$contact->mobile}}">-->
                                                                        <div class="row wd_70">
                                                                            <div class="col-6 p_right">
                                                                                <input type="text" class="form-control" id="contactphone" name="contactphone[]" value="{{$contact->mobile}}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                            </div>
                                                                            <div class="col-6 p_left">
                                                                                <input type="text" class="form-control" name="contactlandline[]" id="contactphone" placeholder="Landline Number" value="{{$contact->landline_number}}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                            </div>
                                                                        </div>
                                                                        <span class="error" id="er_contactphone"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Email <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="email" class="form-control wd_58" id="contactmail" name="contactmail[]" value="{{$contact->email}}">
                                                                        <span class="error" id="er_contactmail"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Designation <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="text" class="form-control wd_58" id="designation{{$contact->id}}" name="designation[]" value="{{$contact->designation}}">
                                                                        <div id="designation_list{{$contact->id}}"></div>
                                                                        <span class="error" id="er_designation"></span>
                                                                    </td>
                                                                </tr>
                                                                
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $('#designation{{$contact->id}}').on('keyup', function() {
                                                                            var desg = this.value;
                                                                            console.log(desg);
                                                                            if (desg != '') {
                                                                                $.ajax({
                                                                                    url: "{{url('fetchdesignation')}}",
                                                                                    type: "POST",
                                                                                    data: {
                                                                                        desg: desg,
                                                                                        _token: '{{csrf_token()}}'
                                                                                    },
                                                                                    dataType: 'json',
                                                                                    success: function(data) {
                                                                                        $('#designation_list{{$contact->id}}').fadeIn();
                                                                                        $('#designation_list{{$contact->id}}').html(data);
                                                                                    },
                                                                                });
                                                                            } else {
                                                                                $('#designation_list{{$contact->id}}').fadeOut();
                                                                                $('#designation_list{{$contact->id}}').html("");
                                                                            }
                                                                        });
                                                                        $(document).on('click', '#desg_li'}}', function() {
                                                                            $('#designation{{$contact->id}}').val($(this).text());
                                                                            $('#designation_list{{$contact->id}}').fadeOut();
                                                                        });
                                                                    });
                                                                </script>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Status <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <select class="form-control wd_58" id="status" name="contactstatus[]">
                                                                            <option value="0">Please Select Status</option>
                                                                            <option value="1" @if ($contact-> status=='1') selected
                                                                                @endif>Active
                                                                            </option>

                                                                            <option value="2" @if($contact->status=='2')selected
                                                                                @endif>Inactive
                                                                            </option>
                                                                        </select>
                                                                        <span class="error" id="er_status"></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="col-6">
                                                            <table class="table wd_16">
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Branch <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <select class="form-control wd_58" id="contactbranch" name="contactbranch[]">

                                                                            <option value="0">Please Select</option>
                                                                            @foreach($location as $loc)
                                                                            <option value="{{$loc->id}}" {{$loc->id == $contact->client_branch ? 'selected':''}}>{{$loc->location}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                        <span class="error" id="er_clientbranch"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Corporate Address</label>
                                                                    </th>
                                                                    <td>
                                                                        <!--<input type="hidden" name="checkbox[]" value="0" />-->
                                                                        <input type="checkbox" id="single_checkbox" name="checkbox[]" value="1" onclick="myFunction()" @if($contact->corporate_address_check == 1)checked @endif>
                                                                        <label for="">checked</label>
                                                                    </td>
                                                                </tr>
                                                                <tr rowspan="2">
                                                                    <th>
                                                                        <label for="">Address</label>
                                                                    </th>
                                                                    <td>
                                                                        <div class="row wd_70">
                                                                            <div class="col-md-6 p_right">
                                                                                <input type="text" class="form-control" id="doornos" name="contactdoorno[]" placeholder="Door No." value="{{$contact->door_no}}">
                                                                            </div>
                                                                            <div class="col-md-6 p_left">
                                                                                <input type="text" class="form-control" id="streetnames" name="contactstreetname[]" placeholder="Street Name" value="{{$contact->street_name}}">
                                                                            </div>
                                                                            <div class="col-md-12 mt_5">
                                                                                <input type="text" class="form-control" id="contactarea" name="contactarea[]" placeholder="Area" value="{{$contact->area_name}}">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">State <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <select class="form-control wd_58" name="contactstate[]" id="statenamecontact">
                                                                            <option>Select</option>

                                                                            @foreach($state_name as $loc)
                                                                            <option value="{{$loc->state_id}}" {{$loc->state_id == $contact->state_id ? 'selected':''}}>
                                                                                {{$loc->state_title}}
                                                                            </option>
                                                                            @endforeach

                                                                            </option>
                                                                        </select>
                                                                        <span class="error" id="er_statenamecontact"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">District <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <select class="form-control wd_58" name="contactdistrictname[]" id="contactdist">
                                                                            <option>Select</option>

                                                                            @foreach($district as $loc)
                                                                            <option value="{{$loc->id}}" {{$loc->id == $contact->district_id ? 'selected':''}}>
                                                                                {{$loc->district_title}}
                                                                            </option>
                                                                            @endforeach

                                                                            </option>
                                                                        </select>
                                                                        <span class="error" id="er_contactdist"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">City <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <select class="form-control wd_58" name="contactcityname[]" id="contactcity">
                                                                            <option>Select</option>

                                                                            @foreach($city as $loc)
                                                                            <option value="{{$loc->id}}" {{$loc->id == $contact->city_id ? 'selected':''}}>
                                                                                {{$loc->name}}
                                                                            </option>
                                                                            @endforeach

                                                                            </option>
                                                                        </select>
                                                                        <span class="error" id="er_contactcity"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Pincode <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="text" class="form-control wd_58" id="pincode_contact" name="contactpincode[]" value="{{$contact->pincode}}">
                                                                        <span class="error" id="er_pincode_contacte"></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="col-12 mb-2">
                                                            <button type="button" class="btn btn-icon btn-danger mr-1 remove_field"><i class="ft-x"></i></button>
                                                        </div>
                                                    </div>
                                                   @endforeach  
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2 pd_0">
                                            <button type="button" id="add_more" class="btn btn-primary">Add</button>
                                        </div>
                                        <div class="col-12 pd_0">
                                            <button type="button" class="btn btn-warning f_left" onclick="show2();">Previous</button>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <!--<button type="submit" name="submit" class="btn btn-primary">Update</button>-->
                                        <button type="submit" name="submit" class="btn btn-primary" onclick="show4();">Update</button>
                                        <button type="button" name="cancel" class="btn btn-warning">Cancel</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- Tab panes -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
    </div>
    <script>
        $(document).ready(function() {
            var max_fields = 20; 
            var x = 1; 
            $('#add_more').click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $('#repeater').append('<div class="row" id="repeat_div" style="margin-top:10px;">' +
                        '<div class="col-6">' +
                        '<table class="table wd_21">' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">Contact Person <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<input type="text" class="form-control wd_58" name="contactname[]" placeholder="Name" required>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">Contact Person Phone <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<div class="row wd_70">'+
                            '<div class="col-6 p_right">'+
                                '<input type="text" class="form-control" name="contactphone[]" id="contactphone'+ x +'" placeholder="Phone Number" maxlength="10" >'+
                            '</div>'+
                            '<div class="col-6 p_left">'+
                                '<input type="text" class="form-control" name="contactlandline[]" id="contactlandline'+ x +'" placeholder="Landline Number" >'+
                            '</div>'+
                        '</div>'+
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">Email <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<input type="email" class="form-control wd_58" name="contactmail[]" placeholder="Email" required>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">Designation <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<input type="text" class="form-control wd_58" id="designation' + x + '" name="designation[]" placeholder="Designation" required>' +
                        '<div id="designation_list' + x + '"></div>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">Status <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<select class="form-control wd_58" name="contactstatus[]" required>' +
                        '<option value="">Please Select Status</option>' +
                        '<option value="1">Active</option>' +
                        '<option value="2">Inactive</option>' +
                        '</select>' +
                        '</td>' +
                        '</tr>' +
                        '</table>' +
                        '</div>' +
                        '<div class="col-6">' +
                        '<table class="table wd_16">' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">Branch <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<select class="form-control wd_58" id="contactbranch'+x+'" name="contactbranch[]">' +
                        '<option value="0">Please Select</option>'+
                        '@foreach($location as $loc)'+
                        '<option value="{{$loc->id}}">{{$loc->location}}</option>'+
                        '@endforeach'+
                        '</select>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">Corporate Address</label>' +
                        '</th>' +
                        '<td>' +
                        '<input type="hidden"   name="checkbox[]" value="0" />'+
                        '<input type="checkbox" value="1" id="single_checkbox' + x + '" name="checkbox[]" onclick="myFunction()">' +
                        '<label for="">checked' +
                        '</label>' +
                        '</td>' +
                        '</tr>' +
                        '<tr rowspan="2">' +
                        '<th>' +
                        '<label for="">Address</label>' +
                        '</th>' +
                        '<td>' +
                        '<div class="row wd_70">' +
                        '<div class="col-md-6 p_right">' +
                        '<input type="text" class="form-control" name="contactdoorno[]" id="doornos' + x + '" placeholder="Door No.">' +
                        '</div>' +
                        '<div class="col-md-6 p_left">' +
                        '<input type="text" class="form-control" name="contactstreetname[]" id="streetnames' + x + '" placeholder="Street Name">' +
                        '</div>' +
                        '<div class="col-md-12 mt_5">' +
                        '<input type="text" class="form-control" name="contactarea[]" id="contactarea' + x + '" placeholder="Area">' +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">State <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<select class="form-control wd_58" name="contactstate[]" id="statenamecontact' + x + '" required>' +
                        '<option value="">Select</option>' +
                        '@foreach ($state_name->sortBy(' + state_title + ') as $st_name )' +
                        '<option value="{{$st_name->state_id }}"{{$st_name->state_id=='+client_statename.value+'? "selected": ""}}>' +
                        '{{$st_name->state_title }}' +
                        '</option>' +
                        '@endforeach' +
                        '</select>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">District <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<select class="form-control wd_58" name="contactdistrictname[]" id="contactdist' + x + '" required>' +
                        '<option value="">Select</option>' +
                        '@foreach ($district->sortBy(' + district_title + ') as $dis_name)' +
                        '<option value="{{$dis_name->id}}">' +
                        '{{$dis_name->district_title}}' +
                        '</option>' +
                        '@endforeach' +
                        '</select>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label>City / Town <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<select class="form-control wd_58" name="contactcityname[]" id="contactcity' + x + '" required>' +
                        '<option value="">Select</option>' +
                        '@foreach ($city->sortBy(' + name + ') as $cy_name)' +
                        '<option value="{{$cy_name->id}}">' +
                        '{{$cy_name->name}}' +
                        '</option>' +
                        '@endforeach' +
                        '</select>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label>Pincode <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<input type="text" class="form-control wd_58" name="contactpincode[]" id="pincode_contact' + x + '" required>' +
                        '</td>' +
                        '</tr>' +
                        '</table>' +
                        '</div>' +
                        '<div class="col-12 mb-2">' +
                        '<button type="button" id="close_btn" data-repeater-delete class="btn btn-icon btn-danger mr-1 remove_field"><i class="ft-x"></i></button>' +
                        '</div>' +
                        '</div>'
                    );
                }
            });

            $('#repeater').on("click", ".remove_field", function(e) {
                //alert(x);
                e.preventDefault();
                $(this).closest('#repeat_div').remove();

                x--;
            })
            $("#repeater").on('keyup', 'input[id^=designation]', function() {
                var desg = $(this).val();
                console.log(desg);
                if (desg != '') {
                    $.ajax({
                        url: "{{url('fetchdesignation')}}",
                        type: "POST",
                        data: {
                            desg: desg,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#designation_list' + x + '').fadeIn();
                            $('#designation_list' + x + '').html(data);
                        },
                    });
                } else {
                    $('#designation_list' + x + '').fadeOut();
                    $('#designation_list' + x + '').html("");
                }
                //ajax here
            });
            $(document).on('click', '#desg_li', function() {
                //alert($(this).text());
                $('#designation' + x + '').val($(this).text());
                $('#designation_list' + x + '').fadeOut();
            });
            $("#repeater").on('click', 'input[id^=single_checkbox]', function() {
                //alert('hyy');
                var y = $('input[id^=single_checkbox]').val();
                var door_no = document.getElementById("doorno");
                var street_name = document.getElementById("streetname");
                var client_area = document.getElementById("area");
                var client_statename = document.getElementById("statename");
                var client_dist = document.getElementById("distname");
                var client_city = document.getElementById("city");
                var client_pincode = document.getElementById("pincode");

                if (this.checked) {
                    //alert(client_statename.value);
                    $('input[id^=doornos]').val(door_no.value);
                    $('input[id^=streetnames]').val(street_name.value);
                    $('input[id^=contactarea]').val(client_area.value);
                    $('input[id^=statenamecontact]').val(client_statename.value);

                    var stateid = $('#statename').find(":selected").val();
                    $("#statenamecontact option[value="+stateid+"]")[0].selected = true;
                    $('input[id^=statenamecontact] option[value=1]').attr('selected','selected');
                    $('input[id^=contactdist]').val(client_dist.value);
                    $('input[id^=contactcity]').val(client_city.value);
                    $('input[id^=pincode_contact]').val(client_pincode.value);
                    //alert(stateid);

                } else {
                    dr_number.value = "";
                    contact_street.value = "";
                    contact_area.value = "";
                    contact_state.value = "";
                    contact_dist.value = "";
                    contact_city.value = "";
                    contact_pincode.value = "";
                }
            });
        });
    </script>


    
     <script>
        function show1() {

            var client_name = $('#clientname').val().length;
            var state = $('#statename').val();
            var dist = $('#distname').val();
            var city = $('#city').val();
            var pincode = $('#pincode').val();
            var crm = $('#crm').val();
            var status = $('#status').val();
            var remarks = $('#remarks').val();
            //alert(pincode);
            var x = [];
            if (client_name == 0) {
                $('#er_clientname').text('Please Enter Client Name');
                x.push(1);
            }
            if (state == 0) {
                $('#er_state').text('Please Enter State');
                x.push(1);
            }
            if (dist == 0) {
                $('#er_distname').text('Please Enter District');
                x.push(1);

            }
            if (city == 0) {
                $('#er_city').text('Please Enter city');
                x.push(1);

            }
            if (pincode == 0) {
                $('#er_pincode').text('Please Enter pincode');
                x.push(1);

            }
            if (crm == 0) {
                $('#er_crm').text('Please Enter crm');
                x.push(1);

            }
            if (status == 0) {
                $('#er_status').text('Please Enter status');
                x.push(1);

            }
            if (remarks == 0) {
                $('#er_remarks').text('Please Enter Remarks');
                x.push(1);

            }
            if (x.length == 0) {
                next_tab();
            }


        }

        function show4() {

            var contact = $('#contact').val().length;
            var contactphone = $('#contactphone').val();
            var contactmail = $('#contactmail').val();
            var designation = $('#designation').val();
            var status = $('#status').val();
            var clientbranch = $('#clientbranch').val();
            var contactdist = $('#contactdist').val();
            var contactcity = $('#contactcity').val();
            var pincode_contact = $('#pincode_contact').val();


            var x = [];
            if (contact == 0) {
                $('#er_contact').text('Please Enter contact Person');
                x.push(1);
            }
            if (contactphone == 0) {
                $('#er_contactphone').text('Please Enter contactphone');
                x.push(1);
            }
            if (contactmail == 0) {
                $('#er_contactmail').text('Please Enter contactmail');
                x.push(1);

            }
            if (designation == 0) {
                $('#er_designation').text('Please Enter Designation');
                x.push(1);

            }
            if (status == 0) {
                $('#er_status').text('Please Enter status');
                x.push(1);

            }
            if (clientbranch == 0) {
                $('#er_clientbranch').text('Please Enter clientbranch');
                x.push(1);

            }
            if (statenamecontact == 0) {
                $('#er_statenamecontact').text('Please Enter state');
                x.push(1);

            }
            if (contactdist == 0) {
                $('#er_contactdist').text('Please Enter District');
                x.push(1);

            }
            if (contactcity == 0) {
                $('#er_contactcity').text('Please Enter City');
                x.push(1);

            }
            if (pincode_contact == 0) {
                $('#er_pincode_contact').text('Please Enter Pinode');
                x.push(1);

            }
        }

        function next_tab() {
            $('#mytabs a[href="#menu1"]').tab('show');
            var add = document.getElementById("client_contact");
            add.classList.add("active");
            var remove = document.getElementById("client");
            remove.classList.remove("active");
        }

        function show2() {
            $('#mytabs a[href="#home"]').tab('show');
            var add = document.getElementById("client");
            add.classList.add("active");
            var remove = document.getElementById("client_contact");
            remove.classList.remove("active");
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#statename').on('change', function() {
                var sta_id = this.value;
                $("#distname").html('');
                $.ajax({
                    url: "{{url('fetchdist')}}",
                    type: "POST",
                    data: {
                        sta_id: sta_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function(result) {
                        $('#distname').html('<option value="">Select District</option>');
                        $.each(result.district, function(key, value) {
                            $("#distname").append('<option value="' + value.id + '">' +
                                value.district_title + '</option>');
                        });
                    },
                });
            });

            //fetch City
            $('#distname').on('change', function() {
                var dis_id = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('fetchcity')}}",
                    type: "POST",
                    data: {
                        dis_id: dis_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function(result1) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(result1.city, function(key, value) {
                            $("#city").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    },
                });
            });
        });
        //client contact
        $(document).ready(function() {
            $('#statenamecontact').on('change', function() {
                var sta_id = this.value;
                $("#contactdist").html('');
                $.ajax({
                    url: "{{url('fetchdist')}}",
                    type: "POST",
                    data: {
                        sta_id: sta_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function(result) {
                        $('#contactdist').html('<option value="">Select District</option>');
                        $.each(result.district, function(key, value) {
                            $("#contactdist").append('<option value="' + value.id + '">' +
                                value.district_title + '</option>');
                        });
                    },
                });
            });

            //fetch City
            $('#contactdist').on('change', function() {
                var dis_id = this.value;
                $("#contactcity").html('');
                $.ajax({
                    url: "{{url('fetchcity')}}",
                    type: "POST",
                    data: {
                        dis_id: dis_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function(result1) {
                        $('#contactcity').html('<option value="">Select City</option>');
                        $.each(result1.city, function(key, value) {
                            $("#contactcity").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    },
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('.repeater').repeater({

            });
            $(".select2").select2({
                placeholder: "Select a state",

            });
            $("#repeater-button").click(function() {

                $(".select2").select2({
                    placeholder: "Select a state",

                });

                $("#statenamecontact").trigger({
                    type: 'select2:select',
                    ajax: {
                        url: "google"
                    }
                });
            });
        });
    </script>
</x-admin-layout>