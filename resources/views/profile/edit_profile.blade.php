<x-admin-layout>
    <style>
        .select2 {
            width: 100% !important;
        }
    </style>

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item">Edit Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div id="box" class="col-md-12 pd_0">
                <div class="collapse show">
                    <form action="{{url('/update_profile',$role->id)}}" method="post" class="form" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body pd_0">
                            <div class="col-md-12 col-sm-12 col-xs-12 pd_0">
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table wd_21">
                                            <tr>
                                                <th>
                                                    <label for="">First Name <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" value="{{$role->fname}}" name="fname">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Last Name <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" value="{{$role->lname}}" name="lname">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Mobile <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" value="{{$role->mobile}}" name="mobile">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Email <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    <input type="email" class="form-control wd_58" value="{{$role->email}}" name="email">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table class="table wd_21">
                                            <tr>
                                                <th>
                                                    <label for="">Location <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    <select name="user_location" id="" class="form-control wd_58">
                                                        <option selected>Please Select Location
                                                        </option>
                                                        @foreach($loc as $loct)
                                                        <option value="{{$loct->id}}" {{$loct->id == $role->location_id ? 'selected':''}}>
                                                            {{$loct->location}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Role <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    @if ($role->role_id==9)
                                                      <select name="role" class="form-control wd_58" id="role">
                                                        <option selected>Please Select Role</option>
                                                        @foreach($rol as $rols)
                                                        <option value="{{$rols->id}}" {{$rols->id == $role->role_id ? 'selected':''}}>
                                                            {{$rols->role_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @else
                                                    <select name="role" class="form-control wd_58" id="role" readonly>
                                                        <option selected>Please Select Role</option>
                                                        @foreach($rol as $rols)
                                                        <option value="{{$rols->id}}" {{$rols->id == $role->role_id ? 'selected':''}}>
                                                            {{$rols->role_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">Designation <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control wd_58" value="{{$role->designation}}" name="designation">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th>
                                                    <label for="">L1 <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    <select name="label_1" class="form-control wd_58">
                                                        <option>Please Select</option>
                                                        @foreach($l1 as $lev)
                                                        
                                                        <option value="{{$lev->id}}" {{$lev->id == $role->level_1 ? 'selected':''}}>
                                                            {{$lev->fname}} {{$lev->lname}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label for="">L2 <span class="text-danger">*</span></label>
                                                </th>
                                                <td>
                                                    <select name="label_2" class="form-control wd_58" id="label_2">
                                                        <option selected>Please Select</option>
                                                        @foreach($l2 as $lev)
                                                        <option value="{{$lev->id}}" {{$lev->id == $role->level_2 ? 'selected':''}}>
                                                            {{$lev->fname}} {{$lev->lname}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('view_profile',$role->id)}}">
                            <button type="button" class="btn btn-primary">Back</button>
                        </a>
                        <input type="submit" name="submit" class="btn btn-success" value="Update">
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>