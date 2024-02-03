<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item active">Functional Area</li>
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
            <div class="collapse show">
                <table class="table table-striped dataex-html5-selectors">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Functional Area</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Modified At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($view as $loc)
                        <tr>
                            <td>{{ $i }}</td>
                            <td style="text-align: left;">{{$loc->function}}</td>

                            @if ($loc->status == 1)
                            <td><span class="badge badge-default badge-success">Active</span></td>

                            @else

                            <td><span class="badge badge-default badge-danger">Inactive</span></td>

                            @endif

                            <td>{{ date('j F-Y', strtotime($loc->created_at)) }} </td>

                            <td>{{ date('j F-Y', strtotime( $loc->updated_at))}}</td>

                            <td><a><i class="ft-edit text-success" data-toggle="modal" data-target="#edit{{ $loc->id }}"></i></a>
                                <a href="{{url('/delete_functional',$loc->id)}}" onclick="return confirm('Are you sure?')"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                <!-- edit model -->
                                <div class="modal fade text-left" id="edit{{ $loc->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info white">
                                                <h4 class="modal-title white" id="myModalLabel11">Edit FunctionalArea</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="card-content collpase show">
                                                <div class="card-body">
                                                    <form action="edit_functional/{{$loc->id}}" method="post" class="form" id="edit_functional" novalidate="novalidate">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="form-group col-12 mb-2">
                                                                    <label for="timesheetinput1">Functional
                                                                        Area <span class="clr_red">*</span></label>
                                                                    <div class="position-relative">
                                                                        <input type="text" id="timesheetinput1" class="form-control" name="functional" value="{{$loc->function}}" placeholder="Enter Functional Area">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-12 mb-2">
                                                                    <label for="issueinput6">Status <span class="clr_red">*</span></label>
                                                                    <select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
                                                                        <option value="">Please Select Status</option>
                                                                        <option value="1" @if($loc->
                                                                            status=='1')selected
                                                                            @endif>Active
                                                                        </option>
                                                                        <option value="2" @if($loc->
                                                                            status=='2')
                                                                            selected @endif>Inactive
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
                            </td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach

                        <!-- -- Edit Modal End -- -->
                    </tbody>
                    
                </table>
                <!-- Add Modal -->
                <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info white">
                                <h4 class="modal-title white" id="myModalLabel11">Add Functional Area</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form action="{{url('/addfunctional')}}" method="post" class="form" id="functional" novalidate="novalidate">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="form-group col-12 mb-2">
                                                    <label for="timesheetinput1">Functional Area <span class="clr_red">*</span></label>
                                                    <div class="position-relative">
                                                        <input type="text" id="area" class="form-control" name="function_area"  placeholder="Enter Functional Area">
                                                        <span id="area_verify" style="color:red;font-weight: 600;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12 mb-2">
                                                    <label for="issueinput6">Status <span class="clr_red">*</span></label>
                                                    <select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
                                                        <option value="">Please
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
                                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">Cancel</button>
                                    <button type="submit" id="btn" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!---- Add Modal End -- -->
            </div>
        </div>
    </div>
   
    <script>
      $(document).ready(function($) {
        $("#functional").validate({
        rules: {
            function_area: "required",                    
            status: {
                required: true
            },
        },
        messages: {
            function_area: "*Please enter Functional Area",  
            status: {
                required: "*Please select Status"
            },
        },
    });
});
</script>
<script>
      $(document).ready(function($) {
        $("#edit_functional").validate({
        rules: {
            functional: "required",                    
            status: {
                required: true
            },
        },
        messages: {
            functional: "*Please enter functional area",  
            status: {
                required: "*Please select Status"
            },
        },
    });
});
</script>
<script>
        $(document).ready(function() {
            $('#area').keyup(function() {
                var area = this.value;
                //  alert(area);
                $.ajax({
                    url: "{{url('/area_action')}}",
                    type: "POST",
                    data: {
                        area: area,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == "1") {
                            $("#area_verify").html('*Functional Area is already exists');
                            $('#btn').prop("disabled", true);
                        } else {
                            $("#area_verify").html('');
                            $('#btn').prop("disabled", false);
                        }
                    },
                });
            });
        });
    </script>
</x-admin-layout>