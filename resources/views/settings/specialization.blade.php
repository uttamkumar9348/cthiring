<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item">Qualification</li>
                        <li class="breadcrumb-item active">Specialization</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <button class="btn btn-danger btn-glow px-2" id="dropdownBreadcrumbButton" type="button" data-target="#info" data-toggle="modal" aria-haspopup="true">Add</button>
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
    <!-- for delete -->
    @if(session()->has('delt'))
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('delt')}}
    </div>
    @endif

    <div class="row">
        <div class="col-12 pd_0">
            <div class="">
                <div class="collapse show">
                    <div class="">
                        <table class="table table-striped dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Degree</th>
                                    <th>Specialization</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($result as $loc)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{optional ($loc->deg)->degree}}</td>
                                    <td>{{$loc->specialization_name}}</td>
                                    @if ($loc->status == 1)
                                    <td><span class="badge badge-default badge-success">Active</span></td>

                                    @else

                                    <td><span class="badge badge-default badge-danger">Inactive</span></td>

                                    @endif

                                    <td>{{ date('j F-Y', strtotime($loc->created_at)) }} </td>

                                    <td>{{ date('j F-Y', strtotime($loc->updated_at))}}</td>

                                    <td><i class="ft-edit text-success" data-toggle="modal" data-target="#edit{{ $loc->id }}"></i>
                                        <a href="{{url('/specializationdelete',$loc->id)}}" onclick="return confirm('Are you sure?')"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                        @php
                                        $ft="";
                                        $lt="";
                                        if($loc->status==1){
                                        $ft="selected";
                                        }
                                        else{
                                        $lt="selected";

                                        }

                                        @endphp
                                        <!-- edit model -->

                                        <div class="modal fade text-left" id="edit{{ $loc->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info white">
                                                        <h4 class="modal-title white" id="myModalLabel11">Edit
                                                            Specialization </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="editspecialization/{{$loc->id}}" method="get" class="form" id="edit_specialization" novalidate="novalidate">
                                                        @csrf
                                                        <div class="card-content collpase show">
                                                            <div class="card-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label for="timesheetinput1">Degree <span class="clr_red">*</span></label>
                                                                            <div class="position-relative">
                                                                                <select class="form-control" name="degree" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="degree">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($degree as $res)
                                                                                    <option value="{{$res->id}}" {{$res->id == $loc->degree_id ? 'selected':''}}>
                                                                                        {{$res->degree}}
                                                                                    </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label for="timesheetinput1">Specialization <span class="clr_red">*</span></label>
                                                                            <div class="position-relative">
                                                                                <input type="text" id="timesheetinput1" class="form-control" name="specialization" value="{{$loc->specialization_name}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label for="issueinput6">Status <span class="clr_red">*</span></label>
                                                                            <select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
                                                                                <option value="">Please
                                                                                    Select Status</option>
                                                                                <option value="1" {{ $ft }}>
                                                                                    Active</option>
                                                                                <option value="2" {{ $lt }}>
                                                                                    Inactive
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">
                                                                Save
                                                            </button>
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>

                                        <!-- -- Edit Modal End -- -->
                                    </td>
                                </tr>
                                @php
                                $i++;
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

    <!-- Add Modal for FORM FIELD -->

    <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h4 class="modal-title white" id="myModalLabel11">Add Specialization
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="add_specialization" method="post" class="form" id="add_specialization" novalidate="novalidate">
                    @csrf
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label>Degree <span class="clr_red">*</span></label>
                                        <div class="position-relative">
                                            <select class="form-control" name="degree" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($degree as $loc)
                                                <option value="{{$loc->id}}">{{$loc->degree}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label>Specialization <span class="clr_red">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" id="specialization" name="specialization" placeholder="Enter Specialization">
                                            <span id="spec_verify" style="color:red;font-weight: 600;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label>Status <span class="clr_red">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="" selected>Please
                                                Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" id="btn" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            $(document).ready(function($) {
                $("#add_specialization").validate({
                    rules: {
                        degree: {
                            required: true
                        },
                        specialization: "required",
                        status: {
                            required: true
                        },
                    },
                    messages: {
                        degree: {
                            required: "*Please select Degree"
                        },
                        specialization: "*Please enter Specialization",
                        status: {
                            required: "*Please select Status"
                        },
                    },
                });
            });
        </script>
        <script>
            $(document).ready(function($) {
                $("#edit_specialization").validate({
                    rules: {
                        degree: {
                            required: true
                        },
                        specialization: "required",
                        status: {
                            required: true
                        },
                    },
                    messages: {
                        degree: {
                            required: "*Please select Degree"
                        },
                        specialization: "*Please enter Specialization",
                        status: {
                            required: "*Please select Status"
                        },
                    },
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#specialization').keyup(function() {
                    // alert('hyy');
                    var spec = this.value;
                    $.ajax({
                        url: "{{url('/specialization_action')}}",
                        type: "POST",
                        data: {
                            spec: spec,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == "1") {
                                $("#spec_verify").html('*Specialization is already exists');
                                $('#btn').prop("disabled", true);
                            } else {
                                $("#spec_verify").html('');
                                $('#btn').prop("disabled", false);
                            }
                        },
                    });
                });
            });
        </script>
</x-admin-layout>