<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content=", powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    <title>CT Hiring</title>
    <link rel="apple-touch-icon" href="{{asset('assets/images/careertree.jpg')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/careertree.jpg')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/tinymce/tinymce.min.css')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <!-- END VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/js/bootstrap.min.js.map')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <!-- END VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('wizard.css')}}">

    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END MODERN CSS-->

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/wizard.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/timedropper.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    
    <!-- END Custom CSS-->

    <style>
        /* Main CSS */

        .navbar ul {
            list-style: none;
        }

        .navbar ul a {
            text-decoration: none;
        } 

        .navbar-nav {
            display: flex;
            list-style: none;
        }

        .navbar-nav .nav-link {
            padding: 5px;
            text-decoration: none;
            font-size: 0.9em;
            font-weight: 400;
            display: block;
            transition: 150ms ease;
        }

        .navbar-nav .nav-item {
            margin: 0 10px;
            position: relative;
        }


        /* Navbar options (bg options) */
        .bg-primary {
            background: #0081ff;
            z-index: 99999;
        }

        .bg-primary .navbar-toggler,
        .bg-primary .nav-link,
        .bg-primary .utils-search {
            color: #fff;
        }

        /* Dropdown CSS */
        .nav-item .dropdown {
            width: 200px;
            display: block;
            position: absolute;
            top: 35px;
            transition: 300ms;
            padding: 10px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(5px);
            border-top: 1px solid rgba(0, 0, 0, 0.15);
            background: #fff;
            border-radius: 4px;
            z-index: 999;
            box-shadow: 0 5px 5px 0px rgba(0, 0, 0, 0.15);
        }

        .nav-item .dropdown .nav-link {
            color: #636363;
        }

        .nav-item .dropdown .dropdown {
            top: 0;
            left: calc(100% + 20px);
            border-top: 0;
            border-left: 1px solid rgba(0, 0, 0, 0.15);
        }

        .nav-item:hover>.dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0px);
        }

        .nav-item.icon>a:before {
            content: "";
            position: absolute;
            right: -10px;
            top: calc(50% + 0px);
            transform: translateY(-50%);
            border: 4px solid transparent;
            border-left-color: inherit;
            transition: 0.15s linear;
        }
        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            background-color: #000;
        }
        .eror{
            background-color: #fcd5cc;
            padding: 8px 35px 8px 14px;
            border-radius: 5px;
            color: #ff562a;
            letter-spacing: 1px;
            font-family: poppines;
            margin: 8px 8px 140px 8px;
        }
        .alert-warning {
            color: #856404!important;
            background-color: #fff3cd!important;
            border-color: #ffeeba!important;
        }
        .alert-success {
            color: #155724!important;
            background-color: #d4edda!important;
            border-color: #c3e6cb!important;
        }
        .alert-danger {
            color: #721c24!important;
            background-color: #f8d7da!important;
            border-color: #f5c6cb!important;
        }
    </style>

</head>


@if(!session()->has('otp_verified'))

<script>
    window.location = "/logout";
</script>

@endif

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark">
        <div class="navbar-wrapper">
            <div class="navbar-header" style="background: white;height:69px;">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="/">
                            <img class="brand-logo lgs" alt="logo" src="{{asset('assets/images/careertree.jpg')}}">
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <!-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>

                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern...">
                            </div>
                        </li> -->
                    </ul>

                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user">
                            @php
                            $request= Auth::id();
                            $role = App\Models\User::where('id','=',$request)->get();
                            @endphp
                            @foreach($role as $loc)
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">Hello,
                                    <span class="user-name text-bold-700">{{$loc->fname}} {{$loc->lname}}</span>

                                </span>
                                <span class="avatar avatar-online">
                                    @if($loc->images !=null)
                                        <img src="/images/{{$loc->images}}" alt="avatar">
                                    @else
                                        <img src="/logo/profile.jpg" alt="avatar">
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!--<a class="dropdown-item" href="{{url('/edit_profile',$loc->id)}}"><i class="ft-user"></i> Edit Profile</a>-->
                                <a class="dropdown-item" href="{{url('/view_profile',$loc->id)}}"><i class="ft-user"></i> View Profile</a>
                                <!-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>-->
                                <!--<a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>-->
                                <!--<a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>-->

                                <a class="dropdown-item" href="/change_password"><i class="ft-user"></i>change password</a>

                                @if (Auth::user()->role_id == 9)

                                <a class="dropdown-item" href="/alltraking"><i class="ft-user"></i>User traking</i></a>

                                @endif

                                <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout"><i class="ft-power"></i> Logout</a>
                            </div>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navbar-container content bdr_btm clr_blck" style="padding-bottom:5px">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left f_s">
                        <li class="pd_lr nav-item">
                            <a href="{{url('/')}}" class="bg_blck nav-link">
                                <i class="la la-home f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
                            </a>
                        </li>
                        <li class="pd_lr nav-item">
                            <a href="#" class="nav-link"><i class="la icon-notebook f_s"></i><span class="menu-title" data-i18n="nav.dash.main">My Plans </a>
                            <ul class="dropdown">
                                @can('Create Today Plan')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/todays_plan')}}" data-i18n="nav.dash.ecommerce">
                                        Create Work Plan
                                    </a>
                                </li>
                                @endcan
                                @can('View Today Plan')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/plan_view')}}" data-i18n="nav.dash.ecommerce">
                                        View Work Plan
                                    </a>
                                </li>
                                @endcan
                                @can('Approve Today Plan')
                                @php
                                    $user = App\Models\myplan::where('approve_status',0)->get();
                                    if(count($user) > 0){
                                        $l1 = App\Models\User::where('id',$user[0]->created_by)->get('level_1');
                                    }
                                    $count = count($user);
                                    
                                @endphp
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/approved')}}" data-i18n="nav.dash.ecommerce">
                                        Approve Work Plan 
                                        @if(count($user) > 0)
                                        @if(session('USER_ID') == $l1[0]->level_1)
                                        <span class="nav_count">{{$count}}</span>
                                        @endif
                                        @endif
                                    </a>
                                    
                                </li>
                                @endcan
                                @can('Approve Leave')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/viewleave')}}" data-i18n="nav.dash.ecommerce">View Leave</a>
                                </li>
                                @endcan

                                <!-- @can('Approve Leave')
                                <li>
                                    <a class="menu-item" href="{{url('view_event')}}" data-i18n="nav.dash.ecommerce">Approve Leave</a>
                                </li>
                                @endcan -->
                            </ul>
                        </li>
                        <li class="pd_lr nav-item">
                            <a href="#" class="nav-link"><i class="la icon-users f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Clients</a>
                            <ul class="dropdown">
                                @can('Create_Client')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/client')}}" data-i18n="nav.dash.ecommerce">Add
                                        Client</a>
                                </li>
                                @endcan
                                @can('View_Client')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/viewclient')}}" data-i18n="nav.dash.ecommerce">View
                                        Client</a>
                                </li>
                                @endcan
                                @can('Approval_Client')
                                @php
                                    $user = App\Models\client::where('is_approve',0)->get();
                                    $BD = App\Models\User::where('id',session('USER_ID'))->first('role_id');
                                    $count = count($user);
                                @endphp
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/approveclient')}}" data-i18n="nav.dash.ecommerce">Approve
                                        Client @if($BD->role_id == 2)<span class="nav_count">{{$count}}</span>@endif</a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="pd_lr nav-item">
                            <a href="#" class="nav-link"><i class="la la-group f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Positions</a>
                            <ul class="dropdown">
                                @can('Create Position')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/position')}}" data-i18n="nav.dash.ecommerce">Add
                                        Position</a>
                                </li>
                                @endcan

                                @can('Accept Position')
                                <li class="nav-item">
                                    
                                    <a class="nav-link" href="{{url('/position_approve')}}" data-i18n="nav.dash.ecommerce">
                                        Approve Position <span class="nav_count"></span></a>
                                </li>
                                @endcan

                                @can('View Position')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/positionview')}}" data-i18n="nav.dash.ecommerce">View
                                        Position</a>
                                </li>
                                @endcan
                                @can('CRM Change Approval')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/crm_change_approval')}}" data-i18n="nav.dash.ecommerce">
                                        CRM Change Approval</a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="pd_lr nav-item">
                            <a href="#" class="nav-link"><i class="la la-file-text-o f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Resumes</a>
                            <ul class="dropdown">
                                @can('Create Resume')
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="{{url('/add/resume')}}" data-i18n="nav.dash.ecommerce">Add Resume</a>-->
                                    <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">Add Resume</a>
                                </li>
                                @endcan
                                @can('View Resume')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/resumeview')}}" data-i18n="nav.dash.ecommerce">View
                                        Resume</a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="pd_lr nav-item">
                            <a href="#" class="nav-link"><i class="la la-file-text-o f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Interviews</a>
                            <ul class="dropdown">
                                @can('View Interview Schedule')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/Interview_Schedule')}}" data-i18n="nav.dash.ecommerce">View Interview Schedule</a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        
                        <li class="pd_lr nav-item">
                            <a href="#" class="nav-link"><i class="la icon-badge f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Performance</a>
                            <ul class="dropdown">
                                @can('Approve Billing')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/approve_billing')}}" data-i18n="nav.dash.ecommerce">Approve Billing</a>
                                </li>
                                @endcan
                                @can('View Billing')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/View_billing')}}" data-i18n="nav.dash.ecommerce">View Billing</a>
                                </li>
                                @endcan
                                @can('View Incentive')
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">View Incentive</a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @can('View Reports')
                        <li class="pd_lr nav-item">
                            <a href="#" class="nav-link"><i class="la icon-bar-chart f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Reports</span></a>
                            <ul class="dropdown">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">CV Status</a>
                                </li>
                            </ul>
                        </li>
                        <li class="pd_lr nav-item"><a href="{{url('/alltraking')}}" class="bg_blck nav-link"><i class="la icon-users f_s"></i><span class="menu-title" data-i18n="nav.dash.main">User Tracking</span></a>
                        </li>
                        @endcan
                        @can('Sent Items')
                        <li class="pd_lr nav-item">
                            <a href="#" class="nav-link"><i class="la icon-envelope f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Mail Box</span></a>
                            <ul class="dropdown">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/mail_box')}}" data-i18n="nav.dash.ecommerce">Sent Items</a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        <li class="pd_lr nav-item"><a href="#" class="bg_blck nav-link"><i class="la icon-info f_s"></i><span class="menu-title" data-i18n="nav.dash.main">Settings</span></a>
                            <ul class="dropdown">
                                @can('Functional Area')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/functionalarea')}}" data-i18n="nav.dash.ecommerce">Functional
                                        Area</a>
                                </li>
                                @endcan
                                @can('View User Tracking')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/industry')}}" data-i18n="nav.dash.ecommerce">Industry</a>
                                </li>
                                @endcan
                                @can('Generate OTP')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/generate_otp')}}" data-i18n="nav.dash.ecommerce">Generate OTP</a>
                                </li>
                                @endcan
                                <!-- @can('Genrate SPOC OTP')
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">Genrate SPOC OTP</a>
                                </li>
                                @endcan -->
                                @can('Qualification')
                                <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">Qualification</a>
                                    <ul class="dropdown">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/qualification')}}" data-i18n="nav.dash.ecommerce">Qualification</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/degree')}}" data-i18n="nav.dash.ecommerce">Degree</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/specialization')}}" data-i18n="nav.dash.ecommerce">Specialization</a>
                                        </li>

                                    </ul>
                                </li>
                                @endcan
                                @can('Designation')
                                <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">Designation</a>
                                    <ul class="dropdown">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/client_designation')}}" data-i18n="nav.dash.ecommerce">Client Designation</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/candidate_designation')}}" data-i18n="nav.dash.ecommerce">Candidate
                                                Designation</a>
                                        </li>
                                    </ul>
                                </li>
                                @endcan

                                @can('Braches')
                                <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">Branch</a>
                                    <ul class="dropdown">
                                        <li class="nav-item"><a class="nav-link" href="{{url('/client_branch')}}" data-i18n="nav.dash.ecommerce">Client
                                                Branch</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('/user_branch')}}" data-i18n="nav.dash.ecommerce">User
                                                Branch</a>
                                        </li>
                                    </ul>
                                </li>
                                @endcan

                                @can('Users')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.users.index')}}" data-i18n="nav.dash.ecommerce">Users</a>
                                </li>
                                @endcan
                                @can('Roles Access')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.roles.index')}}" data-i18n="nav.dash.ecommerce">Roles</a>
                                </li>
                                @endcan
                                <!-- @can('Permission')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.permissions.index')}}" data-i18n="nav.dash.ecommerce">Permissions</a>
                                </li>
                                @endcan -->
                                @can('API Keys')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/apikeys')}}" data-i18n="nav.dash.ecommerce">Api Keys</a>
                                </li>
                                @endcan
                                @can('Mailer Templates')
                                <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">Mailer Template</a>
                                    <ul class="dropdown">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-i18n="nav.dash.ecommerce"> Send CV to Client</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-i18n="nav.dash.ecommerce"> Interview Confirmation
                                                to client</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-i18n="nav.dash.ecommerce"> Schedule interview to
                                                Candidate</a>
                                        </li>
                                    </ul>
                                </li>
                                @endcan

                                @can('Incentive')
                                <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">Incentive</a>
                                    <ul class="dropdown">
                                        <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce">Eligiblity</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce"> Sharing Criteria</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce"> Salary</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#" data-i18n="nav.dash.ecommerce"> Holiday</a>
                                        </li>
                                    </ul>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        
        @if(session()->has('duplicate_resume') ) 
       
        <!--Start Duplicate Resume Modal -->

        <div class="modal hide fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="padding: 15px;">
                    <div class="col-md-12" style="border: 1px solid #eed3d7;padding: 4px;background-color: #f2dede;border-radius: 3px;font-weight: 600;">
                        <h4 style="color: #b94a48;margin-bottom:0px;"><b>Oops! The resume is already uploaded by someone</b></h4>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Resume Status</b> <span style="color:#999">Overview</span></h5>
                    </div>
                    <div class="modal-body">
                        <table class="table dataTable" style="margin-bottom:0">
    						<thead>
    							<tr>
    								<th>Client Name</th>
    								<th>Position</th>
    								<th>Rec. Name</th>
    								<th>Rec. Location</th>
    								<th>Rec. Contact No</th>
    								<th>Sent Date</th>
    								<th>Current Status</th>
    							</tr>
    						</thead>	
    						<tbody>
    						    @php
    						        $email = session('email_found');
    						        $data = App\Models\Resume::where('email',$email)->get();
    						    @endphp
    						    @foreach($data as $resume)
    							<tr>
    							    <td>{{($resume->view_nameofclient)->client_name}}</td>
    								<td>{{($resume->jobname)->job_title}}</td>
    								<td>{{($resume->username_of_resume)->name}}</td>
    								<td>{{($resume->username_of_resume->location)->location}}</td>
    								<td>{{($resume->username_of_resume)->mobile}}</td>
    								<td>{{date('j-F-Y',strtotime($resume->created_at))}}</td>
    								<td>@if($resume->cv_status == 0)
                                        <span class="badge badge-default badge-danger">CV not send</span>
                                        @elseif($resume->cv_status == 1)
                                        <span class="badge badge-default badge-success">CV Sent</span>
                                        @elseif($resume->cv_status == 2)
                                        <span class="badge badge-default badge-success">Shortlisted</span>
                                        @elseif($resume->cv_status == 3)
                                        <span class="badge badge-default badge-danger">Rejected</span>
                                        @elseif($resume->cv_status == 4)
                                        <span class="badge badge-default badge-success">First Interview Schedule</span>
                                        @elseif($resume->cv_status == 5)
                                        <span class="badge badge-default badge-warning">First Reschedule</span>
                                        @elseif($resume->cv_status == 6)
                                        <span class="badge badge-default badge-success">First Selected</span>
                                        @elseif($resume->cv_status == 7)
                                        <span class="badge badge-default badge-danger">First Rejected</span>
                                        @elseif($resume->cv_status == 8)
                                        <span class="badge badge-default badge-success">Second Interview Schedule</span>
                                        @elseif($resume->cv_status == 9)
                                        <span class="badge badge-default badge-warning">Second Reschedule</span>
                                        @elseif($resume->cv_status == 10)
                                        <span class="badge badge-default badge-success">Second Selected</span>
                                        @elseif($resume->cv_status == 11)
                                        <span class="badge badge-default badge-danger">Second Rejected</span>
                                        @elseif($resume->cv_status == 12)
                                        <span class="badge badge-default badge-success">Third Interview Schedule</span>
                                        @elseif($resume->cv_status == 13)
                                        <span class="badge badge-default badge-warning">Third Reschedule</span>
                                        @elseif($resume->cv_status == 14)
                                        <span class="badge badge-default badge-success">Third Selected</span>
                                        @elseif($resume->cv_status == 15)
                                        <span class="badge badge-default badge-danger">Third Rejected</span>
                                        @elseif($resume->cv_status == 16)
                                        <span class="badge badge-default badge-success">Fourth Interview Schedule</span>
                                        @elseif($resume->cv_status == 17)
                                        <span class="badge badge-default badge-warning">Fourth Reschedule</span>
                                        @elseif($resume->cv_status == 18)
                                        <span class="badge badge-default badge-success">Fourth Selected</span>
                                        @elseif($resume->cv_status == 19)
                                        <span class="badge badge-default badge-danger">Fourth Rejected</span>
                                        @elseif($resume->cv_status == 20)
                                        <span class="badge badge-default badge-success">Final Interview Schedule</span>
                                        @elseif($resume->cv_status == 21)
                                        <span class="badge badge-default badge-warning">Final Reschedule</span>
                                        @elseif($resume->cv_status == 22)
                                        <span class="badge badge-default badge-success">Final Selected</span>
                                        @elseif($resume->cv_status == 23)
                                        <span class="badge badge-default badge-danger">Final Rejected</span>
                                        @elseif($resume->cv_status == 24)
                                        <span class="badge badge-default badge-success">Offer Accepted</span>
                                        @elseif($resume->cv_status == 25)
                                        <span class="badge badge-default badge-danger">Offer Rejected</span>
                                        @elseif($resume->cv_status == 26)
                                        <span class="badge badge-default badge-success">Joined</span>
                                        @elseif($resume->cv_status == 27)
                                        <span class="badge badge-default badge-warning">Not Joined</span>
                                        @elseif($resume->cv_status == 28)
                                        <span class="badge badge-default badge-danger">Deferred</span>
                                        @elseif($resume->cv_status == 29)
                                        <span class="badge badge-default badge-success">Billed</span>
                                        @endif</td>
    							</tr>
    							@endforeach
    						</tbody>
    					</table>
                    </div>
                    <div class="modal-footer" style="justify-content: flex-start;">
                        <form action="{{url('/duplicate_resume')}}" method="post">
                            @csrf
                            <input type="hidden" name="client" value="{{session('client_id')}}">
                            <input type="hidden" name="position" value="{{session('position_id')}}">
                            <input type="hidden" name="resume" value="{{session('resume')}}">
                            
                            <button type="submit" name="submit" class="btn btn-primary">Ignore and Proceed</button>
                        </form>
                        <button type="button" class="btn btn-success" id="change_resume" data-toggle="modal" data-target="#exampleModalCenter">Let me choose another resume</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel and Go Back</button>
                    </div>
                </div>
            </div>
        </div>   
        @endif  
        
        @php 
            Illuminate\Support\Facades\Session::forget('duplicate_resume'); 
        @endphp
    
   
        <!--End Duplicate Resume Modal -->
        
        <!--Start Add Resume Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="form" action="{{url('resume_submit')}}" method="post" id="form" enctype="multipart/form-data">
            @csrf  
            @php
                $ldate = date('Y-m-d');
                $yesterday = date("Y-m-d", strtotime( '-1 days' ));
                
                $myplan = App\Models\myplan::orderBy('task_date', 'desc')->where('task_date',$ldate)->where('created_by',session('USER_ID'))
                                            ->where('work_plan_type','Sourcing')->get();
                
            
            	$myplan1 = App\Models\myplan::orderBy('task_date', 'desc')->where('task_date', $yesterday)->where('created_by',session('USER_ID'))->first();
				$role = App\Models\User::where('id',session('USER_ID'))->first('role_id');
            
                if($role->role_id != '10' && $role->role_id != '6' || $role->role_id == '7' && $role->role_id == '8' ){   
                    if(count($myplan) > 0)
                    {
    				    $task = $myplan[0]->task_date;
    				}
    				elseif($myplan1 != null)
    				{
        			    $task = $myplan1->task_date;
        			}
        			else
        			{
            		    $myplan2 = App\Models\myplan::orderBy('task_date', 'desc')->where('created_by',session('USER_ID'))->first();
            		    $leave = App\Models\Leave::where('user_id',session('USER_ID'))->first();
            		    if(!empty($myplan2)){
            		        $task = $myplan2->task_date;
            		    }else{
            		        
                                $task = $yesterday;
                            
                        }
        			}
				    $create = date('Y-m-d',strtotime($task));
				}
            @endphp
            <div class="col-md-12 pd_0" style="text-align:right;margin-bottom: 0px;">
                <button type="button" class="close cancel_btn" data-dismiss="modal" aria-label="Close" style="border: 1px solid #5d5d5d;padding: 0px 5px;background-color: #ffffff;border-radius: 8px;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-content" style="border: 8px solid rgb(93 93 93);">
                @if($role->role_id != 10 && $role->role_id != 6 || $role->role_id == '7' && $role->role_id == '8' )
                    @if($ldate == $create)
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle">Add Resume</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Client</label>
                                        <select class="form-control" name="client" id="clientname" required>
                                            <option value="">Select</option>
                                            @foreach($myplan as $client)
                                            <option value="{{$client->client_name}}">
                                                {{($client->client_na)->client_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label for="">Position For</label>
                                            <select class="form-control" name="position" id="position_fetch"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="">
                                            <label for="">Resume</label>
                                            <input type="file" name="resume" class="form-control">
                                            <div class="col-md-12" style="color:#ff562a;border: 1px solid #cacfe7;padding: 4px;background-color: #fcd5cc;border-radius: 3px;font-weight: 600;">
                                                <span>
                                                    Upload Only DOCX, DOC , PDF Format
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    @elseif($yesterday == $create)
                        <div class="col-md-12 pd_0">
                            <div class="eror">
                                <span style="font-size: 14px;font-weight: 600;">Please add task for the day</span>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12 pd_0">
                            <div class="eror">
                                <span style="font-size: 14px;font-weight: 600;">Your previous days workplan is pending. Please complete the same to plan for the current day</span>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Add Resume</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="">Client</label>
                                        <select class="form-control" name="client" id="clientname" required>
                                            <option value="">Select</option>
                                            @php
                                                $myplan = App\Models\Position::where('recruiters',session('USER_ID'))->get('client_name');
                                            @endphp
                                            @foreach($myplan as $client)
                                            <option value="{{$client->client_name}}">
                                                {{($client->client_na)->client_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label for="">Position For</label>
                                        <select class="form-control" name="position" id="position_fetch"></select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="">Resume</label>
                                        <input type="file" name="resume" class="form-control">
                                        <div class="col-md-12" style="color:#ff562a;border: 1px solid #cacfe7;padding: 4px;background-color: #fcd5cc;border-radius: 3px;font-weight: 600;">
                                            <span>
                                                Upload Only DOCX, DOC , PDF Format
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                @endif
            </div>
            </form>
          </div>
        </div>
        <!-- End Add Resume Modal -->
    </nav>

    <div class="app-content content w-full">
        <div class="content-wrapper">
            @if(Session::has('message'))
            <div class="row" style="margin-bottom: 10px;margin-top: 15px;">
                <div class="col-md-12 pd_0">
                    <div class="alert alert-success alert-dismissible" x-data="open: true" x-show="open">

                        <strong>{{Session::get('message')}}</strong>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
            </div>
            <!-- @click="open  -->
            @endif

            @if(Session::has('error'))
            <div class="row" style="margin-bottom: 10px;margin-top: 15px;">
                <div class="col-md-12 pd_0">
                    <div class="alert alert-danger alert-dismissible" x-data="open: true" x-show="open">

                        <strong>{{Session::get('error')}}</strong>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
            </div>
            <!-- @click="open  -->
            @endif
            {{ $slot }}
            
            @include('sweetalert::alert')
        </div>
    </div>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
    <script>
        $(document).ready(function() {
            //fetch dist clients
            $('#clientname').on('change', function() {
                var client_id = this.value;
                $("#position_fetch").html('');
                $.ajax({
                    url: "{{url('fetch_position')}}",
                    type: "POST",
                    data: {
                        sta_id: client_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function(result) {
                        $('#position_fetch').html('<option value="">Select Position</option>');
                        $.each(result.position, function(key, value) {
                            $("#position_fetch").append('<option value="' + value
                                .position_id + '">' +
                                value.job_title + '</option>');
                        });
                    },
                });
            });
            
            $('#change_resume').on('click',function(){
                $('#myModal').hide();
                $('.modal-backdrop').removeClass("show");
            })

        });
    </script>
     <script>
    //     $(document).ready(function () {
    //     $('#form').validate({
    //         rules: {
    //             client:'required',
    //             position:'required',
    //             resume:'required',
    //         },
    //         messages: {
    //             client: "Please enter title",
    //             position: "Please enter valid email",
    //             resume:"Please enter message",
    //         },
    //     }),
    // });
    // </script>
    <script>
        /* Add icon on .nav-item if dropdown exists */
        const navItems = document.querySelectorAll(".nav-item");

        navItems.forEach((item) => {
            const hasDropdowns = item.querySelector(".dropdown") !== null;
            if (hasDropdowns) {
                item.classList.add("icon");
            }
        });
    </script>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-light navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022 <a class="text-bold-800 grey darken-2" href="#" target="_blank">CTHiring</a>, All rights reserved.
            </span>

        </p>
    </footer>
    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('app-assets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/tables/buttons.colVis.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>


    <!-- BEGIN MODERN JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('app-assets/js/scripts/pages/dashboard-sales.js')}}" type="text/javascript"></script>

    <!-- END PAGE LEVEL JS-->
    <script src="{{asset('app-assets/vendors/js/editors/tinymce/tinymce.js')}}" type="text/javascript"></script>

    <script src="{{asset('app-assets/js/scripts/editors/editor-tinymce.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/wizard-steps.min.js')}}"></script>


    <!-- for client blade page code -->

    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <!-- <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script> -->
    <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('app-assets/js/scripts/forms/form-repeater.js')}}" type="text/javascript"></script>
    <script src="{{asset('jquery.steps.min.js')}}"></script>

    <!-- Select2 JS -->
    <!-- for cliend blade open  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- close -->
    <script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('app-assets/js/scripts/forms/validation/form-validation.js')}}" type="text/javascript">
    </script>

    <script src="{{asset('app-assets/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('app-assets/js/scripts/tables/components/table-components.js')}}" type="text/javascript"></script>

    
    
    

</body>

</html>