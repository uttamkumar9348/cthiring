<x-admin-layout>
    <style>
        body.vertical-layout.vertical-menu-modern.menu-expanded .footer {
            margin-left: 0px;
        }

        .box {
            display: none;
        }
    </style>
    <script src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

    @php



    @endphp
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">User</li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('msg'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{$message}}
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

    <!-- Form wizard with icon tabs section start -->
    @foreach($user as $loc)
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <form action="{{url('/update_user',$loc->id)}}" method="post" class="form" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" name="fname" value="{{$loc->fname}}" placeholder="First Name" id="firstname" required>
                                        </div>
                                        <div class="col-md-6 p_left">
                                            <input type="text" class="form-control" name="lname" value="{{$loc->lname}}" placeholder="Last Name" id="lastname" required>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                </th>
                                <td>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$loc->email}}" placeholder="Email" required>
                                    <span id="email_verify" style="color:red;"></span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="phone">Contact Number<span class="text-danger">*</span></label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{$loc->mobile}}" placeholder="mobile no" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="gender">Gender<span class="text-danger">*</span></label>
                                </th>
                                <td>
                                    <select id="gender" class="form-control" name="gender" required>
                                        <option value="">select</option>
                                        <option value="male" @if($loc->
                                            gender=='male') selected @endif>Male
                                        </option>
                                        <option value="female" @if($loc->
                                            gender=='female') selected
                                            @endif>Female</option>
                                        <option value="others" @if($loc->
                                            gender=='others') selected
                                            @endif>Others</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="Designation">Designation<span class="text-danger">*</span></label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" name="designation" placeholder="Designation" value="{{$loc->designation}}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="Role">Role <span class="text-danger">*</span></label>
                                </th>
                                <td>
                                    <select name="role" class="form-control" id="role" required>
                                        <option value="">Select</option>
                                        @foreach($role as $rols)
                                        <option value="{{$rols->id}}" {{$rols->id == $loc->role_id ? 'selected':''}}>
                                            {{$rols->role_name}}
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
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" value="">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                            file</label>
                                    </div>
                                    <div class="col-md-4">
                                        @if ($loc->images != '')
                                        <img src="/images/{{ $loc->images }}" class="img-responsive" style="width:85px;height:50px;">
                                        @else
                                        <img src="/logo/profile.jpg" class="img-responsive" style="width:100px">
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label>Location<span class="text-danger">*</span></label>
                                </th>
                                <td>
                                    <select name="user_location" id="" class="form-control" required>
                                        <option value="">Please Select Location</option>
                                        @foreach($location3 as $loct)
                                        <option value="{{$loct->id}}" {{$loct->id == $loc->location_id ? 'selected':''}}>
                                            {{$loct->location}}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="service">Status <span class="text-danger">*</span></label>
                                </th>
                                <td>
                                    <select name="status" class="form-control" id="status" required>
                                        <option value="">Please Select Status</option>
                                        <option value="1" @if($loc->
                                            status=='1')selected @endif>Active
                                        </option>

                                        <option value="2" @if($loc->status=='2')
                                            selected @endif>Inactive</option>
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
                                        <option value="">Please Select</option>
                                        @foreach($l1 as $lev)
                                        <option value="{{$lev->id}}" {{$lev->id == $loc->level_1 ? 'selected':''}}>
                                            {{$lev->fname}} {{$lev->lname}}
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
                                        <option selected>Please Select</option>
                                        @foreach($l2 as $lev)
                                        <option value="{{$lev->id}}" {{$lev->id == $loc->level_2 ? 'selected':''}}>
                                            {{$lev->fname}} {{$lev->lname}}
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
                                    <textarea class="tinymce-classic" name="editor">{{$loc->signature}}</textarea>
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
    @endforeach
</x-admin-layout>