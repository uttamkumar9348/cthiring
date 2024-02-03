<x-admin-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <style>
        .form-control{
            padding: 0.2rem 10px!important;
        }
        select.form-control:not([size]):not([multiple]) {
        height: calc(26px + 2px);
        }
    </style>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Resumes</li>
                        <li class="breadcrumb-item active">View Resumes</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-warning fl_right" id="search_btn">Search</button>
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
            <div class="">
                <form>
                    <div class="col-12" id="search" style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-2 pd_3">
                                <label>From Date:</label>
                                <input type="date" class="form-control" name="from_date">
                            </div>
                            <div class="col-2 pd_3">
                                <label>To Date:</label>
                                <input type="date" class="form-control" name="to_date">
                            </div>
                            <div class="col-2 pd_3">
                                <label>Status:</label>
                                <select name="status" class="form-control" style="clear:left">
                                    <option value="">Select</option>
                                    <option value="1">Assigned</option>
                                    <option value="2">In-Process</option>
                                    <option value="3">On-Hold</option>
                                    <option value="4">Billed</option>
                                    <option value="5">Terminated</option>
                                    <option value="6">In-Active</option>
                                </select>
                            </div>
                            <div class="col-2 pd_3">
                                <label>Approval Status:</label>
                                <select name="approval_status" class="form-control" style="clear:left">
                                    <option value="">Select</option>
                                    <option value="0">Awaiting Approval</option>
                                    <option value="1">Approved</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="collapse show">
                    <div class="table-responsive">
                        <table class="table table-striped dataex-html5-selectors" id="resumetable">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Client Name</th>
                                    <th>Job Title</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email Id</th>
                                    <th>Exp.</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Type</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#search").hide();
            //console.log('hyy');
            $('#search_btn').on('click',function(){
                $('#search').toggle();
            });
        });
    </script>
    <script>
        $(function() {
            $('#resumetable').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                searching: false,
                ajax: {
                    url: "{{ url('/viewresume-get') }}",
                    data: function(d) {
                        d.status = $('#status').val()
                    }
                },
            data: [],
                columns: [
                    {
                        data: 'code',
                        name: 'Code'
                    },
                    {
                        data: '',
                        name: 'Client Name'
                    },
                    {
                        data: '',
                        name: 'Job Title'
                    },
                    {
                        data: '',
                        name: 'Name'
                    },

                    {
                        data: '',
                        name: 'Mobile'
                    },
                    {
                        data: '',
                        name: 'Email Id'
                    },
                    {
                        data: '',
                        name: 'Exp.'
                    },
                    {
                        data: '',
                        name: 'Location'
                    },
                    {
                        data: '',
                        name: 'Status'
                    },
                    {
                        data: 'Approval',
                        name: 'Approval'
                    },
                    {
                        data: 'createdby',
                        name: 'Created By'
                    },
                    {
                        data: '',
                        name: 'Type'
                    },
                    {
                        data: 'created_at',
                        name: 'Created'
                    },
                    {
                        data: 'updated_at',
                        name: 'Modified'
                    },
                    {
                        data: 'action',
                        name: 'Actions'
                    },
                ]
            });

            $('#status').change(function() {
                table.draw();
            });
        });
    </script>
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</x-admin-layout>