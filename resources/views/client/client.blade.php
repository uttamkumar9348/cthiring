<x-admin-layout>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
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
                        <li class="breadcrumb-item active">Add Client</li>
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
                        <form action="clientinsert2" method="post" enctype="multipart/form-data" id="add_client">
                            @csrf
                            <div class="" id="mytabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" id="client">Client</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu1" id="client_contact">Client Contact</a>
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
                                                                <input type="text" class="form-control wd_58" name="clientname" id="clientname" placeholder="Enter Client Name">
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
                                                                        <input type="text" class="form-control" id="doorno" name="doorno" placeholder="Door No." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                    </div>
                                                                    <div class="col-md-6 p_left">
                                                                        <input type="text" class="form-control" id="streetname" name="streetname" placeholder="Street Name">
                                                                    </div>
                                                                    <div class="col-md-12 mt_5">
                                                                        <input type="text" class="form-control" id="area" name="area" placeholder="Area">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                <label for="">State <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                       <select class="form-control wd_58" id="statename">
                                                                            <option value="0">Select</option>
                                                                            @foreach ($state_name->sortBy('state_title') as $st_name )
                                                                            <option value="{{$st_name->state_id }}">
                                                                                {{$st_name->state_title }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select> 
                                                                        <input type="hidden" name="State" value="">
                                                                    </div>   
                                                                </div>
                                                                <span class="error" id="er_state"></span>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>
                                                                <label for="">District <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!--<select class="form-control wd_58" id="distname" name="districtname"></select>-->
                                                                        <select class="form-control wd_58" id="distname">
                                                                            <option value="0">Select</option>
                                                                            @foreach($district as $loc)
                                                                            <option value="{{$loc->id}}">
                                                                                {{$loc->district_title}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden" name="districtname" value="">
                                                                    </div>
                                                                </div>
                                                                <span class="error" id="er_distname"></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-6">
                                                    <table class="table wd_16">
                                                        <tr>
                                                            <th>
                                                                <label for="">City / Town <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!--<select class="form-control wd_58" name="cityname" id="city"></select>-->
                                                                        <select class="form-control wd_58" id="city">
                                                                            <option value="0">Select</option>
                                                                            @foreach($city as $ct)
                                                                            <option value="{{$ct->id}}">
                                                                                {{$ct->name}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden" name="cityname" value="">
                                                                    </div>
                                                                </div>
                                                                <span class="error" id="er_city"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Pincode <span class="clr_red">*</span></label>

                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control wd_58" name="pincode" id="pincode" placeholder="Enter Pincode" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                <span class="error" id="er_pincode"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">CRM <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <select class="select2 form-control wd_58" id="crm" name="crm[]" multiple>
                                                                    <option value="0">Select</option>
                                                                    @foreach ($crm_user as $crm1 )
                                                                    <option value="{{$crm1->id}}">{{$crm1->fname}} {{$crm1->lname}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="col-12 pd_0">
                                                                    <span class="error" id="er_crm"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Status <span class="clr_red">*</span></label>
                                                            </th>
                                                            <td>
                                                                <select class="form-control wd_58" id="status" name="status">
                                                                    <option value="">Please Select Status</option>
                                                                    <option value="1">Active</option>
                                                                    <option value="2">Inactive</option>
                                                                </select>
                                                                <span class="error" id="er_status"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label for="">Logo </label>
                                                            </th>
                                                            <td>
                                                                <input type="file" class="form-control wd_58" name="client_logo">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary f_right" onclick="show1();">Next</button>

                                    </div>

                                    <!-- client contact  form  start-->

                                    <div id="menu1" class="tab-pane pd_0"><br>
                                        <div class="form-group mb-2">
                                            <div id="repeater">
                                                <div class="row">
                                                        <div class="col-6">
                                                            <table class="table wd_21">
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Contact Person <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="text" class="form-control wd_58" name="contactname[]" id="contact" placeholder="Name">
                                                                        <span class="error" id="er_contact"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Contact Person Phone <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <div class="row wd_70">
                                                                            <div class="col-6 p_right">
                                                                                <input type="text" class="form-control" name="contactphone[]" id="contactphone" placeholder="Phone Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                            </div>
                                                                            <div class="col-6 p_left">
                                                                                <input type="text" class="form-control" name="contactlandline[]" id="contactphone" placeholder="Landline Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <!--<input type="tel" maxlength="10">-->
                                                                        <span class="error" id="er_contactphone"></span>
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Email <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="email" class="form-control wd_58" name="contactmail[]" id="contactmail" placeholder="Email">
                                                                        <span class="error" id="er_contactmail"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Designation <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="text" class="form-control wd_58" id="designation" name="designation[]" placeholder="Designation">
                                                                        <span class="error" id="er_designation"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label for="">Status <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <select class="form-control wd_58" name="contactstatus[]" id="contactstatus">
                                                                            <option value="0">Select Status</option>
                                                                            <option value="1">Active</option>
                                                                            <option value="2">Inactive</option>
                                                                        </select>
                                                                        <span class="error" id="er_contactstatus"></span>
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
                                                                        <select class="form-control wd_58" name="contactbranch[]" id="clientbranch">
                                                                            <option value="">Select</option>
                                                                            @foreach ($client_branch as $branch)
                                                                            <option value="{{$branch->id}}">
                                                                                {{$branch->location}}
                                                                            </option>
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
                                                                        <input type="checkbox" value="1" id="single_checkbox" name="checkbox[]" onclick="myFunction()">
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
                                                                                <input type="text" class="form-control" name="contactdoorno[]" id="doornos" placeholder="Door No." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                            </div>
                                                                            <div class="col-md-6 p_left">
                                                                                <input type="text" class="form-control" name="contactstreetname[]" id="streetnames" placeholder="Street Name">
                                                                            </div>
                                                                            <div class="col-md-12 mt_5">
                                                                                <input type="text" class="form-control" name="contactarea[]" id="contactarea" placeholder="Area">
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
                                                                            <option value="">Select</option>
                                                                            @foreach ($state_name->sortBy('state_title') as $st_name )
                                                                            <option value="{{$st_name->state_id }}">
                                                                                {{$st_name->state_title }}
                                                                            </option>
                                                                            @endforeach
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
                                                                            <option value="">Select</option>
                                                                            @foreach ($district->sortBy('district_title') as
                                                                            $dis_name)
                                                                            <option value="{{$dis_name->id}}">
                                                                                {{$dis_name->district_title}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="error" id="er_contactdist"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label>City / Town <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <!--<input type="text" class="form-control wd_58" name="contactcityname[]" id="contactcity">-->
                                                                        <select class="form-control wd_58" name="contactcityname[]" id="contactcity">
                                                                            <option value="">Select</option>
                                                                            @foreach ($city->sortBy('name') as
                                                                            $cy_name)
                                                                            <option value="{{$cy_name->id}}">
                                                                                {{$cy_name->name}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="error" id="er_contactcity"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <label>Pincode <span class="clr_red">*</span></label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="text" class="form-control wd_58" name="contactpincode[]" id="pincode_contact" placeholder="Pincode" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                        <span class="error" id="er_pincode_contact"></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="button" class="btn btn-icon btn-danger mr-1"><i class="ft-x"></i></button>
                                                        </div>
                                                    </div>
                                            </div>
                                            <button type="button" id="add_more" class="btn btn-info" style="float: right;">Add</button>
                                        </div>
                                        
                                            <button type="button" class="btn btn-warning f_left" onclick="show2();">Previous</button>
                                        
                                    </div><br>
                                    <div class="form-actions">
                                        <span id="hide">
                                            <a href="/client">
                                                <input type="button" class="btn btn-warning" value="Back">
                                            </a>
                                        </span>
                                        <button type="submit" name="submit" class="btn btn-primary" id="submit" onclick="show4();">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#pincode').focusout(function(){
           var pin = $(this).val();
        //   alert(pin);
            $.ajax({
                url: "{{url('fetch')}}",
                type: 'post',
                dataType: "json",
                data:{
                    zip:pin,
                    _token:"{{csrf_token()}}"
                },
                success:function(result){
                    $('#statename').val(result[0]).attr("selected", "selected");
                    $('#distname').val(result[1]).attr("selected", "selected");
                    $('#city').val(result[2]).attr("selected", "selected");
                    
                    $('input[name="State"]').val(result[0]);
                    $('input[name="districtname"]').val(result[1]);
                    $('input[name="cityname"]').val(result[2]);
                    
                    $('#statename').attr('disabled', true);
                    $('#distname').attr('disabled', true);
                    // $('#city').attr('disabled', true);
                    console.log(result);
                },
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var max_fields = 20; 
            var x = 1; 
            $('#add_more').click(function(e) {
                 //alert('hyy');
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $('#repeater').append('<div class="row" id="repeat_div" style="margin-top:10px;">' +
                        '<div class="col-6">' +
                        '<table class="table wd_21">' +
                        '<tr>' +
                        '<th>' +
                        ' <label for="">Contact Person <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<input type="text" class="form-control wd_58" name="contactname[]" placeholder="Name" required>' +
                        ' </td>' +
                        ' </tr>' +
                        ' <tr>' +
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
                        '<input type="text" class="form-control wd_58" id="designation" name="designation[]" placeholder="Designation" required>' +
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
                        '<select class="form-control wd_58" name="contactbranch[]" required>' +
                        '<option value="">Select</option>' +
                        '@foreach ($client_branch as $branch)' +
                        '<option value="{{$branch->id}}">' +
                        '{{$branch->location}}' +
                        '</option>' +
                        '@endforeach' +
                        '</select>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">Corporate Address</label>' +
                        '</th>' +
                        '<td>' +
                        '<input type="checkbox" value="1" id="single_checkbox" name="checkbox[]">' +
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
                        '<input type="number" class="form-control css" name="contactdoorno[]" id="doornos" placeholder="Door No.">' +
                        '</div>' +
                        '<div class="col-md-6 p_left">' +
                        '<input type="text" class="form-control" name="contactstreetname[]" id="streetnames" placeholder="Street Name">' +
                        '</div>' +
                        '<div class="col-md-12 mt_5">' +
                        '<input type="text" class="form-control" name="contactarea[]" id="contactarea" placeholder="Area">' +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>' +
                        '<label for="">State <span class="clr_red">*</span></label>' +
                        '</th>' +
                        '<td>' +
                        '<select class="form-control wd_58" name="contactstate[]" id="statenamecontact" required>' +
                        '<option value="">Select</option>' +
                        '@foreach ($state_name->sortBy(' + state_title + ') as $st_name )' +
                        '<option value="{{$st_name->state_id }}">' +
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
                        '<select class="form-control wd_58" name="contactdistrictname[]" id="contactdist" required>' +
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
                        '<select class="form-control wd_58" name="contactcityname[]" id="contactcity" required>' +
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
                        '<input type="text" class="form-control wd_58" name="contactpincode[]" id="pincode_contact" placeholder="Pincode" required>' +
                        '</td>' +
                        '</tr>' +
                        '</table>' +
                        '</div>' +
                        '<div class="col-12">' +
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
            $("#repeater").on('click', 'input[id^=single_checkbox]', function() {
                //alert('hyy');
                var y = $('input[id^=single_checkbox]').val();
                var door_no = $("#doorno").val();
                var street_name = $("#streetname").val();
                var client_area = $("#area").val();
                var client_statename = $("#statename").val();
                var client_dist = $("#distname").val();
                var client_city = $("#city").val();
                var client_pincode = $("#pincode").val();
                
                // alert(door_no);
                if (this.checked) {
                    //alert(client_statename.value);
                    $('input[id^=doornos]').val(door_no);
                    $('input[id^=streetnames]').val(street_name);
                    $('input[id^=contactarea]').val(client_area);
                    $('select[id^=statenamecontact]').val(client_statename).attr("selected", "selected");
                    $('select[id^=contactdist]').val(client_dist).attr("selected", "selected");
                    $('select[id^=contactcity]').val(client_city).attr("selected", "selected");
                    $('input[id^=pincode_contact]').val(client_pincode);
                    //alert(stateid);

                } else {
                    if(!(this.checked)){
                    $('input[id^=doornos]').val('');
                    $('input[id^=streetnames]').val('');
                    $('input[id^=contactarea]').val('');
                    $('select[id^=statenamecontact]').val('').attr("selected", "selected");
                    $('select[id^=contactdist]').val('').attr("selected", "selected");
                    $('select[id^=contactcity]').val('').attr("selected", "selected");
                    $('input[id^=pincode_contact]').val('');
                    }
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            $('.repeater').repeater({

            });
            $(".select2").select2({
                placeholder: "Select",

            });
            $("#repeater-button").click(function() {

                $(".select2").select2({
                    placeholder: "Select",

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
    <script>
        function myFunction() {
            var checkBox = document.getElementById("single_checkbox");
            var door_no = document.getElementById("doorno");
            var street_name = document.getElementById("streetname");
            var client_area = document.getElementById("area");
            var client_statename = document.getElementById("statename");
            var client_dist = document.getElementById("distname");
            var client_city = document.getElementById("city");
            var client_pincode = document.getElementById("pincode");


            var dr_number = document.getElementById("doornos");
            var contact_street = document.getElementById("streetnames");
            var contact_area = document.getElementById("contactarea");
            var contact_state = document.getElementById("statenamecontact");
            var contact_dist = document.getElementById("contactdist");
            var contact_city = document.getElementById("contactcity");
            var contact_pincode = document.getElementById("pincode_contact");

            if (checkBox.checked == true) {
                dr_number.value = door_no.value;
                contact_street.value = street_name.value;
                contact_area.value = client_area.value;

                contact_state.value = client_statename.value;
                contact_dist.value = client_dist.value;
                contact_city.value = client_city.value;
                contact_pincode.value = client_pincode.value;

            } else {
                dr_number.value = "";
                contact_street.value = "";
                contact_area.value = "";
                contact_state.value = "";
                contact_dist.value = "";
                contact_city.value = "";
                contact_pincode.value = "";
            }
        }
    </script>
    <script>
        $("#submit").prop("type", "button");
            function show1() {
    
                var client_name = $('#clientname').val().length;
                var state = $('#statename').val();
                var dist = $('#distname').val();
                var city = $('#city').val();
                var pincode = $('#pincode').val();
                var crm = $('#crm').val();
                var status = $('#status').val();
                //alert(pincode);
                var x = [];
                if (client_name == 0) {
                    $('#er_clientname').text('* Please Enter Client Name');
                    x.push(1);
                }
                if (state == 0) {
                    $('#er_state').text('* Please Enter State');
                    x.push(1);
                }
                if (dist == 0) {
                    $('#er_distname').text('* Please Enter District');
                    x.push(1);
    
                }
                if (city == 0) {
                    $('#er_city').text('* Please Enter city');
                    x.push(1);
    
                }
                if (pincode == 0) {
                    $('#er_pincode').text('* Please Enter pincode');
                    x.push(1);
    
                }
                if (crm == 0) {
                    $('#er_crm').text('* Please Enter crm');
                    x.push(1);
    
                }
                if (status == 0) {
                    $('#er_status').text('* Please Enter status');
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
                var contactstatus = $('#contactstatus').val();
                var clientbranch = $('#clientbranch').val();
                var statenamecontact = $('#statenamecontact').val();
                var contactdist = $('#contactdist').val();
                var contactcity = $('#contactcity').val();
                var pincode_contact = $('#pincode_contact').val();
    
    
                var x = [];
                if (contact == 0) {
                    $('#er_contact').text('* Please Enter contact Person');
                    x.push(1);
                }
                if (contactphone == 0) {
                    $('#er_contactphone').text('* Please Enter contactphone');
                    x.push(1);
                }
                if (contactmail == 0) {
                    $('#er_contactmail').text('* Please Enter contactemail');
                    x.push(1);
    
                }
                
                if (designation == 0) {
                    $('#er_designation').text('* Please Enter Designation');
                    x.push(1);
    
                }
                if (contactstatus == 0) {
                    $('#er_contactstatus').text('* Please Enter status');
                    x.push(1);
    
                }
                if (clientbranch == 0) {
                    $('#er_clientbranch').text('* Please Enter clientbranch');
                    x.push(1);
    
                }
                if (statenamecontact == 0) {
                    $('#er_statenamecontact').text('* Please Enter state');
                    x.push(1);
    
                }
                if (contactdist == 0) {
                    $('#er_contactdist').text('* Please Enter District');
                    x.push(1);
    
                }
                if (contactcity == 0) {
                    $('#er_contactcity').text('* Please Enter City');
                    x.push(1);
    
                }
                if (pincode_contact == 0) {
                    $('#er_pincode_contact').text('* Please Enter Pincode');
                    x.push(1);
    
                }
                
                if (x.length == 0) {
                    $("#submit").prop("type", "submit");
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
                var element = document.getElementById("client");
                element.classList.add("active");
                var element = document.getElementById("client_contact");
                element.classList.remove("active");
            }
        
    </script>
</x-admin-layout>