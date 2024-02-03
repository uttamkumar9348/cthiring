<x-admin-layout>
    <link rel="stylesheet" href="{{ asset('app-assets/position_css/style.css') }}" />

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item">Users</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <button class="btn btn-danger btn-glow px-2" id="dropdownBreadcrumbButton" type="button" data-target="#xlarge" data-toggle="modal" aria-haspopup="true"> Add</button>

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
    @if(session()->has('msg'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('msg')}}
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
    <div class="modal fade text-left" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel11">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form action="/userinsert" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <table class="table wd_21">
                                        <tr>
                                            <th>
                                                <label for="fullname">Full Name<span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <div class="row wd_70">
                                                    <div class="col-md-6 p_right">
                                                        <input type="text" class="form-control" name="fname" placeholder="First Name" required id="firstname">
                                                    </div>
                                                    <div class="col-md-6 p_left">
                                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" id="lastname" required>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="email">Email<span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <input type="email" class="form-control wd_58" id="mail" name="email" placeholder="Email" required>
                                                <span id="email_verify" style="color:red;"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="phone">Contact Number<span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <!--<input type="text" class="form-control wd_58" id="mobile" name="mobile" placeholder="Mobile no" required>-->
                                                <input type="text" class="form-control wd_58" maxlength="10" id="mobile" name="mobile" placeholder="Mobile no" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="gender">Gender<span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <select id="gender" class="form-control wd_58" name="gender" required>
                                                    <option value="">select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="Designation">Designation<span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control wd_58" id="" name="designation" placeholder="Designation" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="Role">Role <span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <select name="role" class="form-control wd_58" id="role" required>
                                                    <option value="">Select</option>
                                                    @foreach($role as $role1)
                                                    <option value="{{$role1->id}}">
                                                        {{$role1->role_name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="Image">Upload Image</label>
                                            </th>
                                            <td>
                                                <div class="col-md-8">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="service">Status <span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <select name="status" class="form-control wd_58" id="service" required>
                                                    <option value="">Select</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>Location<span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <select name="user_location" id="" class="form-control wd_58" required>
                                                    <option value="">Select</option>
                                                    @foreach($location3 as $loct)
                                                    <option value="{{$loct->id}}">
                                                        {{$loct->location}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <table class="table wd_21">
                                        <tr>
                                            <th>
                                                <label>Level1</label>
                                            </th>
                                            <td>
                                                <select name="label_1" class="form-control wd_58">
                                                    <option value="">Select</option>
                                                    @foreach($l1 as $user1)
                                                    <option value="{{$user1->id}}">
                                                        {{$user1->fname}} {{$user1->lname}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="Level2">Level2</label>
                                            </th>
                                            <td>
                                                <select name="label_2" class="form-control wd_58" id="label_2">
                                                    <option value="">Select</option>
                                                    @foreach($l2 as $userr)
                                                    <option value="{{$userr->id}}">
                                                        {{$userr->fname}}{{$userr->lname}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>
                                                <label for="service">Signature<span class="text-danger">*</span></label>
                                            </th>
                                            <td>
                                                <!--<textarea class="tinymce-classic" name="editor" id="mceu_53"></textarea>-->
                                                <div class="centered">
                                                    <div class="document-editor" style="border: 1px solid #cacfe7;">
                                                        <div class="content-container">
                                                            <div id="editor">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                      <textarea name="editor" id="signature" cols="30" rows="10"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer ml-auto">
                                <button type="submit" class="btn btn-outline-success mr-1">Submit</button>
                                <button type="submit" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 pd_0">
            <div class="collapse show">
                <div class="form-group">
                    <table class="table table-responsive table-striped dataex-html5-selectors">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Designation</th>
                                <th>Role</th>
                                <th>Location</th>
                                <th>Level1</th>
                                <th>Level2</th>
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
                                <td>
                                    @if ($loc->images != '')
                                    <img src="/images/{{ $loc->images }}" class="img-responsive" style="width:100px">
                                    @else
                                    <img src="/logo/profile.jpg" class="img-responsive" style="width:100px">
                                    @endif
                                </td>
                                <td>{{ $loc->fname }} {{ $loc->lname }}</td>
                                <td>{{ $loc->email }}</td>
                                <td>{{ $loc->mobile }}</td>
                                <td>{{ $loc->designation }}</td>
                                <td>{{optional ($loc->role)->role_name }}</td>
                                <td>{{optional ($loc->location)->location }}</td>
                                <td>{{optional ($loc->user)->fname }}
                                    {{optional ($loc->user)->lname}}
                                </td>
                                <td>{{optional ($loc->user2)->fname }}
                                    {{optional ($loc->user2)->lname}}
                                </td>
                                @if ($loc->status == 1)
                                <td><span class="badge badge-default badge-success">Active</span></td>
                                @else
                                <td><span class="badge badge-default badge-danger">Inactive</span></td>
                                @endif

                                <td>{{ date('j F-Y', strtotime($loc->created_at)) }} </td>

                                <td>{{ date('j F-Y', strtotime ($loc->modified_at))}}</td>

                                <td><a href="{{url('/edit_user',$loc->id)}}"><i class="ft-edit text-success"></i></a>
                                    <a href="{{url('/user_delete',$loc->id)}}" onclick="return confirm('Are you sure?')"><i class="ft-trash-2 ml-1 text-warning"></i></a>
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
    <!-- Modal -->
<!--ckeditor start-->
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        DecoupledEditor
            .create(document.querySelector('#editor'), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            })
            .then(editor => {
                const toolbarContainer = document.querySelector('main .toolbar-container');

                toolbarContainer.prepend(editor.ui.view.toolbar.element);

                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>
    <!--ckeditor end-->
    <script>
        $(document).ready(function() {
            $('#mail').keyup(function() {

                var email = this.value;
                // alert(email);
                $.ajax({
                    url: "{{url('/email_action')}}",
                    type: "POST",
                    data: {
                        email: email,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == "1") {
                            $("#email_verify").html('Email id already exists');
                        } else {
                            $("#email_verify").html('');
                        }
                    },
                });
            });
        });
    </script>
</x-admin-layout>