<x-admin-layout>

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item">Permissions</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="{{route('admin.permissions.create')}}">
                    <input class="btn btn-danger  round btn-glow px-2" id="dropdownBreadcrumbButton" type="button" data-target="#info" aria-haspopup="true" value="Create Permissions">
                </a>
            </div>
        </div>
    </div>

    <section id="pagination">
        <div class="row">
            <div class="col-12 pd_0">
                <div class="">
                    <div class="collapse show">
                        <div class="">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td style="text-align: left;">{{$permission->name}}</td>
                                        <td><a href="{{route('admin.permissions.edit',$permission->id)}}"><i class="ft-edit text-success" data-target=""></i></a>
                                            <a href="" onclick="return confirm('Are you sure?')"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <div class="form-group">
                                        <div class="modal fade text-left" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info white">
                                                        <h4 class="modal-title white" id="myModalLabel11">Add Roll</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="card-content collpase show">
                                                        <div class="card-body">
                                                            <form action="" method="get" class="form">
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label for="timesheetinput1">Role:</label>
                                                                            <div class="position-relative has-icon-left">
                                                                                <input type="text" id="timesheetinput1" class="form-control" name="role_name" value="" placeholder="Enter User Role Name">
                                                                                <div class="form-control-position">
                                                                                    <i class="ft-map"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label for="timesheetinput1">Description:</label>
                                                                            <div class="position-relative has-icon-left">
                                                                                <textarea type="text" class="form-control" id="timesheetinput1" name="role_des" value="" placeholder="Enter User Role Description"></textarea>
                                                                                <div class="form-control-position">
                                                                                    <i class="ft-map"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-12 mb-2">
                                                                            <label for="issueinput6">Status</label>
                                                                            <select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
                                                                                <option value="not started">Please
                                                                                    Select Status</option>
                                                                                <option value="1">
                                                                                    Active</option>
                                                                                <option value="2">
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
                                                            <i class="ft-x"></i> Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> Save
                                                        </button>
                                                    </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                        </div>




                        <!-- -- Edit Modal End -- -->



                        </tbody>



                        <tfoot>
                            <tr>

                                <th>Role</th>

                                <th>Action</th>
                            </tr>
                        </tfoot>

                        </table>

                        <!-- Add Modal Start -->
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info white">
                                                <h4 class="modal-title white" id="myModalLabel11">Add Role </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="card-content collpase show">
                                                <div class="card-body">


                                                    <form action="role" method="post" class="form">
                                                        @csrf
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="form-group col-12 mb-2">
                                                                    <label for="timesheetinput1">Role Name</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" id="timesheetinput1" class="form-control" name="role_name" placeholder="Enter User Role Name">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-map"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-12 mb-2">
                                                                    <label for="timesheetinput1">Description</label>
                                                                    <div class="position-relative has-icon-left">

                                                                        <textarea type="text" class="form-control" id="timesheetinput1" name="role_des" placeholder="Enter User Role Description"></textarea>
                                                                        <div class="form-control-position">
                                                                            <i class="ft-map"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-12 mb-2">
                                                                    <label for="issueinput6">Status</label>
                                                                    <select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
                                                                        <option value="not started">Please Select Status
                                                                        </option>
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
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-admin-layout>