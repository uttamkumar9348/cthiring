<x-admin-layout>

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Performance</li>
                        <li class="breadcrumb-item active">View Incentive</li>
                    </ol>
                </div>
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
    <!-- Form wizard with icon tabs section start -->
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="collapse show">
                <table class="table table-striped dataex-html5-selectors">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Type</th>
                            <th>Client Name</th>
                            <th>Billing Amount</th>
                            <th>Billing Date</th>
                            <th>Recruiter</th>
                            <th>CRM</th>
                            <th>Created Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="{{url('/view_billing_details')}}">Uttam kumar</a></td>
                            <td>calling</td>
                            <td>training edevlop</td>
                            <td>3.00</td>
                            <td>23-Apr-2022</td>
                            <td>ganesh kumar</td>
                            <td>Prasant Vertical Lead</td>
                            <td>23-Apr-2022</td>
                            <td class="pd_0 t_c"><span class="p_d">L1 - P</span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Candidate Name</th>
                            <th>Position</th>
                            <th>Client Name</th>
                            <th>Billing Amount</th>
                            <th>Billing Date</th>
                            <th>Recruiter</th>
                            <th>CRM</th>
                            <th>Created Date</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->


</x-admin-layout>