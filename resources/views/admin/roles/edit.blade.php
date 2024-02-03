<x-admin-layout>

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item"><a href="{{url('/roles')}}">Roles</a></li>
                        <li class="breadcrumb-item">Edit Roles</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="{{route('admin.roles.index')}}">
                    <input class="btn btn-danger btn-glow px-2" type="button" data-target="#info" aria-haspopup="true" value="Back">
                </a>
            </div>
        </div> -->
    </div>


    <section id="pagination" style="display:none;">
        <div class="row" style="margin-right: 0px; margin-left:0px">
            <div class="col-12">
                <div class="collapse show">
                    <form method="POST" action="{{route('admin.roles.update', $role)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">

                            @error('name') <span style="color: red; font-weight:400;">{{$message}}</span>@enderror
                        </div>

                        <!-- <button type="submit" class="btn btn-danger  round btn-glow px-2">Update</button> -->
                    </form>
                    <form method="POST" action="{{route('admin.roles.updated', $role->id)}}">
                        <label for="exampleInputEmail1">Roles Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Permissions" value="{{$role->name}}" disabled>
                </div>

                <style>
                    table,
                    th,
                    td {
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                </style>

                <!-- <div class="card-content collapse show">
                        <table style="margin-left: 18px; width: 52%;">
                            <tr>
                                <th>Feature</th>
                                <th>Capabilities</th>

                            </tr>

                           
                            <tr>
                                <td>Client</td>
                                <td>    
                                @foreach($client as $clients)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $clients->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Positions</td>
                                <td>    
                                @foreach($position as $positions)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $positions->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Resume</td>
                                <td>    
                                @foreach($resume as $resumes)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $resumes->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Interview</td>
                                <td>    
                                @foreach($interview as $interviews)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $interviews->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Billing</td>
                                <td>    
                                @foreach($billing as $billings)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $billings->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Incentive</td>
                                <td>    
                                @foreach($incentive as $incentives)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $incentives->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>MyLeave</td>
                                <td>    
                                @foreach($leave as $leaves)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $leaves->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Today Plan</td>
                                <td>    
                                @foreach($plan as $plans)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $plans->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>My Event</td>
                                <td>    
                                @foreach($event as $events)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $events->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Reports</td>
                                <td>    
                                @foreach($report as $reports)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $reports->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Mail Box</td>
                                <td>    
                                @foreach($mail as $mails)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $mails->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Setting</td>
                                <td>    
                                @foreach($setting as $settings)
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> {{ $settings->name }}</label><br>
                                        @endforeach
                                </td>

                            </tr>
                            


                        </table>
                    </div> -->

                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">
                        <label for="permission">Roles Permissions:</label>

                        @csrf

                        <table style="margin-left: 18px; width: 52%;">
                            <tr>
                                <th>Feature</th>
                                <th>Capabilities</th>

                            </tr>


                            <tr>
                                <td>Client</td>
                                <td>
                                    @foreach($client as $clients)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$clients->id}}" {{ $role->permissions->contains($clients->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $clients->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Positions</td>
                                <td>
                                    @foreach($position as $positions)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$positions->id}}" {{ $role->permissions->contains($positions->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $positions->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Resume</td>
                                <td>
                                    @foreach($resume as $resumes)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$resumes->id}}" {{ $role->permissions->contains($resumes->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $resumes->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Interview</td>
                                <td>
                                    @foreach($interview as $interviews)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$interviews->id}}" {{ $role->permissions->contains($interviews->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $interviews->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Billing</td>
                                <td>
                                    @foreach($billing as $billings)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$billings->id}}" {{ $role->permissions->contains($billings->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $billings->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Incentive</td>
                                <td>
                                    @foreach($incentive as $incentives)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$incentives->id}}" {{ $role->permissions->contains($incentives->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $incentives->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <!-- <tr>
                                    <td>MyLeave</td>
                                    <td>
                                        @foreach($leave as $leaves)
                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$leaves->id}}" {{ $role->permissions->contains($leaves->id) ? 'checked' : '' }}>
                                        <label for="vehicle1"> {{ $leaves->name }}</label><br>
                                        @endforeach
                                    </td>

                                </tr> -->
                            <tr>
                                <td>Today Plan</td>
                                <td>
                                    @foreach($plan as $plans)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$plans->id}}" {{ $role->permissions->contains($plans->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $plans->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>My Event</td>
                                <td>
                                    @foreach($event as $events)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$events->id}}" {{ $role->permissions->contains($events->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $events->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Reports</td>
                                <td>
                                    @foreach($report as $reports)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$reports->id}}" {{ $role->permissions->contains($reports->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $reports->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Mail Box</td>
                                <td>
                                    @foreach($mail as $mails)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$mails->id}}" {{ $role->permissions->contains($mails->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $mails->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>Setting</td>
                                <td>
                                    @foreach($setting as $settings)
                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$settings->id}}" {{ $role->permissions->contains($settings->id) ? 'checked' : '' }}>
                                    <label for="vehicle1"> {{ $settings->name }}</label><br>
                                    @endforeach
                                </td>

                            </tr>



                        </table>
                        @error('name')
                        <span style="color: red; font-weight:400;">{{$message}}</span>
                        @enderror

                        <button type="submit" class="btn btn-danger  round btn-glow px-2" style="margin: 20px;">Update</button>
                        </form>
                    </div>
                </div>

                <!-- <div class="mt-6 p-2">
                        <h2 class="text-2xt" style="font-weight:600;">Role Permissions</h2>
                        <div class="mt-4 p-2">
                            @if ($role->permissions)
                            @foreach($role->permissions as $role_permission)

                            <form class="px-4 py-3" method="POST" action="{{route('admin.roles.permissions.revoke', [$role->id, $role_permission->id])}}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{$role_permission->name}}</button>

                            </form>



                            @endforeach
                            @endif

                        </div>
                    </div> -->
                <!-- <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <form method="POST" action="{{route('admin.roles.permissions', $role->id)}}">
                                @csrf

                                <div class="form-group">
                                    <label for="permission">Roles Permissions:</label>
                                    <select class="form-control" id="permission" name="permission" autocomplete="permission-name">
                                        @foreach($permissions as $permission)
                                        <option value="{{$permission->name}}">{{ $permission->name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name')
                                <span style="color: red; font-weight:400;">{{$message}}</span>
                                @enderror

                                <button type="submit" class="btn btn-danger  round btn-glow px-2">Update</button>
                            </form>
                        </div>
                    </div> -->
            </div>
        </div>
    </section>

    <!-- *********************working******************* -->
    <section id="pagination">
        <div class="row">
            <div class="col-12 pd_0">
                <form method="POST" action="{{route('admin.roles.updated', $role->id)}}">
                    <label for="exampleInputEmail1">Roles Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Permissions" value="{{$role->name}}" disabled>
                    <label for="permission" style="margin: 20px 0px 5px 0px;">Roles Permissions:</label>
                    @csrf
                    <div class="row" id="checkbox">
                        <div class="col-8">
                            <div class="">
                                <div class="collapse show">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <th>Feature</th>
                                                <th>Capabilities</th>

                                                <tr>
                                                    <td>Today Plan</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($plan as $plans)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$plans->id}}" {{ $role->permissions->contains($plans->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $plans->name }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>


                                                <tr>
                                                    <td>Positions</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($position as $positions)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$positions->id}}" {{ $role->permissions->contains($positions->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $positions->name }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Resume</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($resume as $resumes)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$resumes->id}}" {{ $role->permissions->contains($resumes->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $resumes->name }}</label>

                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Interview</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($interview as $interviews)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$interviews->id}}" {{ $role->permissions->contains($interviews->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $interviews->name }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Client</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($client as $clients)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$clients->id}}" {{ $role->permissions->contains($clients->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $clients->name }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Billing</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($billing as $billings)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$billings->id}}" {{ $role->permissions->contains($billings->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $billings->name }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Incentive</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($incentive as $incentives)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$incentives->id}}" {{ $role->permissions->contains($incentives->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $incentives->name }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- <tr>
                                                    <td>MyLeave</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                @foreach($leave as $leaves)
                                                                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$leaves->id}}" {{ $role->permissions->contains($leaves->id) ? 'checked' : '' }}>
                                                                    <label for="vehicle1">{{ $leaves->name }}</label>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr> -->
                                                <!--<tr>-->
                                                <!--<td>My Event</td>-->
                                                <!--<td>-->
                                                <!--    <div class="card-body">-->
                                                <!--        <div>-->
                                                <!--            <fieldset>-->
                                                <!--                @foreach($event as $events)-->
                                                <!--                <div>-->
                                                <!--                    <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$events->id}}" {{ $role->permissions->contains($events->id) ? 'checked' : '' }}>-->
                                                <!--                    <label for="vehicle1">{{ $events->name }}</label>-->

                                                <!--                </div>-->
                                                <!--                @endforeach-->
                                                <!--            </fieldset>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--</td>-->
                                                <!--</tr>-->
                                                <tr>
                                                    <td>Reports</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($report as $reports)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$reports->id}}" {{ $role->permissions->contains($reports->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $reports->name }}</label>

                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Mail Box</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($mail as $mails)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$mails->id}}" {{ $role->permissions->contains($mails->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $mails->name }}</label>

                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Setting</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($setting as $settings)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$settings->id}}" {{ $role->permissions->contains($settings->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $settings->name }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Level</td>
                                                    <td>
                                                        <div class="card-body">
                                                            <div>
                                                                <fieldset>
                                                                    @foreach($level as $levels)
                                                                    <div>
                                                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$levels->id}}" {{ $role->permissions->contains($levels->id) ? 'checked' : '' }}>
                                                                        <label for="vehicle1">{{ $levels->name }}</label>
                                                                    </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="width-350">
                            <button type="submit" style="margin: 14px 0px;" class="btn btn-success mr-1 mb-1">Update</button>
                            <a href="{{url('/roles')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


</x-admin-layout>