<x-admin-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .accordion_tab {
            padding: 10px;
            cursor: pointer;
            user-select: none;
            font-size: 15px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
        }

        .basic_search {
            background-color: lightgrey;
        }

        .font_st {
            font-weight: 500 !important;
            font-size: 16px;
            letter-spacing: 2px;
            color: #000;
        }

        .f_size {
            font-size: 24px;
            color: #000;
        }
    </style>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">CV Bank</li>
                        <li class="breadcrumb-item active"> CV Bank</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="collapse show">
                <form action="clientinsert2" method="post" enctype="multipart/form-data" id="add_client">
                    @csrf
                    <div class="">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">CV Search</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="tab-pane active pd_0"><br>
                                <div class="form-body">
                                    <div class="">
                                        <div id="accordion">
                                            <div class="card">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                                    <div class="card-header basic_search">
                                                        <span class="font_st">BASIC SEARCH</span>
                                                        <i class="fa fa-angle-down f_size float-right" aria-hidden="true"></i>
                                                    </div>
                                                </a>
                                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <table class="table wd_7">
                                                            <tr>
                                                                <th>
                                                                    <label for="">Keyword <span class="clr_red">*</span></label>
                                                                </th>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-3 pd_r0">
                                                                            <input type="text" class="form-control" name="keyword" placeholder="Enter Any Keyword">
                                                                        </div>
                                                                        <div class="col-md-1 pd_l0">
                                                                            <select class="form-control" name="keyword_dropdown">
                                                                                <option>Any</option>
                                                                                <option>All</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">Mobile Number</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <input type="text" class="form-control" name="mobile">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">Experience</label>
                                                                </th>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-2 pd_r0">
                                                                            <select class="form-control" name="min_experience" id="min_experience">
                                                                                <option>Min.</option>
                                                                                @php
                                                                                $i=1;
                                                                                for($i;$i<=50;$i++) { @endphp <option value="{{$i}}">{{$i}} years
                                                                                    </option>
                                                                                    @php
                                                                                    }
                                                                                    @endphp
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-2 pd_l0">
                                                                            <select class="form-control" name="max_experience" id="max_experience">
                                                                                <option>Max.</option>
                                                                                @php
                                                                                $i=1;
                                                                                for($i;$i<=50;$i++) { @endphp <option value="{{$i}}">{{$i}} years
                                                                                    </option>
                                                                                    @php
                                                                                    }
                                                                                    @endphp
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">CTC</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-6 pd_l0">
                                                                        <div class="row">
                                                                            <div class="col-md-2 pd_r0">
                                                                                <div class="">
                                                                                    <input type="text" class="form-control" id="" name="min_salary" placeholder="Min. CTC">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 pd_r0 pd_l0">
                                                                                <div class="">
                                                                                    <select class="form-control" name="salary_value">
                                                                                        <option value="Lacs">Lacs</option>
                                                                                        <option value="K">Thousand</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 pd_r0 pd_l0">
                                                                                <div class="">
                                                                                    <input type="text" class="form-control" id="" name="max_salary" placeholder="max. CTC">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 pd_l0">
                                                                                <div class="">
                                                                                    <select class="form-control" name="salary_value2">
                                                                                        <option value="Lacs">Lacs</option>
                                                                                        <option value="k">Thousand</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">Current Location</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-6 pd_l0">
                                                                        <input type="text" class="form-control wd_58" name="current_location">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                                    <div class="card-header basic_search">
                                                        <span class="font_st">EMPLOYMENT</span>
                                                        <i class="fa fa-angle-down f_size float-right" aria-hidden="true"></i>
                                                    </div>
                                                </a>
                                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <table class="table wd_7">
                                                            <tr>
                                                                <th>
                                                                    <label for="">Functional Area</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <select class="form-control" name="functional_area">
                                                                            <option>Select</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">Designation</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <input type="text" class="form-control" name="designation" placeholder="Enter Designation">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">Notice Period</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <select class="form-control" name="notice_period">
                                                                            <option>Select</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                                    <div class="card-header basic_search">
                                                        <span class="font_st">EDUCATION</span>
                                                        <i class="fa fa-angle-down f_size float-right" aria-hidden="true"></i>
                                                    </div>
                                                </a>
                                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <table class="table wd_7">
                                                            <tr>
                                                                <th>
                                                                    <label>UG Qualification</label>
                                                                </th>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-4 pd_r0">
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="ug_qualification" class="mr_5">Any
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="ug_qualification" class="mr_5">Specific
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="ug_qualification" class="mr_5">Not Compulsary
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">UG Course Type</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <select class="form-control" name="ug_course_type">
                                                                            <option>Any</option>
                                                                            <option>Full Time</option>
                                                                            <option>Part Time</option>
                                                                            <option>Correspondence</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">UG Year of Graduation</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <input type="text" class="form-control" name="ug_graduation_year">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label>PG Qualification</label>
                                                                </th>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-4 pd_r0">
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="pg_qualification" class="mr_5">Any
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="pg_qualification" class="mr_5">Specific
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="pg_qualification" class="mr_5">Not Compulsary
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">PG Course Type</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <select class="form-control" name="pg_course_type">
                                                                            <option>Any</option>
                                                                            <option>Full Time</option>
                                                                            <option>Part Time</option>
                                                                            <option>Correspondence</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">PG Year of Graduation</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <input type="text" class="form-control" name="pg_graduation_year">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                                                    <div class="card-header basic_search">
                                                        <span class="font_st">ADDITIONAL</span>
                                                        <i class="fa fa-angle-down f_size float-right" aria-hidden="true"></i>
                                                    </div>
                                                </a>
                                                <div id="collapseFour" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <table class="table wd_7">
                                                            <tr>
                                                                <th>
                                                                    <label>Gender</label>
                                                                </th>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-4 pd_r0">
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="gender" class="mr_5">All
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="gender" class="mr_5">Male
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="gender" class="mr_5">Female
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label>Marital Status</label>
                                                                </th>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-4 pd_r0">
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="marital_status" class="mr_5">Any
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="marital_status" class="mr_5">Single
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="marital_status" class="mr_5">Married
                                                                            </label>
                                                                            <label class="radio-inline mr_5">
                                                                                <input type="radio" name="marital_status" class="mr_5">Separated
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">Candidate Age</label>
                                                                </th>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-2 pd_r0">
                                                                            <select class="form-control" name="min_age" id="min_age">
                                                                                <option>Min.</option>
                                                                                @php
                                                                                $i=20;
                                                                                for($i;$i<=60;$i++) { @endphp <option value="{{$i}}">{{$i}} years
                                                                                    </option>
                                                                                    @php
                                                                                    }
                                                                                    @endphp
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-2 pd_l0">
                                                                            <select class="form-control" name="max_age" id="max_age">
                                                                                <option>Max.</option>
                                                                                @php
                                                                                $i=20;
                                                                                for($i;$i<=60;$i++) { @endphp <option value="{{$i}}">{{$i}} years
                                                                                    </option>
                                                                                    @php
                                                                                    }
                                                                                    @endphp
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">created from</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <input type="date" class="form-control" name="created_from_date">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <label for="">created to</label>
                                                                </th>
                                                                <td>
                                                                    <div class="col-md-4 pd_l0">
                                                                        <input type="date" class="form-control" name="created_to_date">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>