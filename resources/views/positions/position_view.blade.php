<x-admin-layout>
    <style>
        .pd_0 {
            padding: 0px;
        }

        .pd_15 {
            padding: 15px 24px;
        }

        .mar {
            margin: -23px 0 10px 0px !important;
        }

        .pd_14 {
            padding: 7px 24px !important;
        }

        .mb_3 {
            margin-bottom: 3px !important;
        }

        .wd_37 th {
            width: 37%;
        }

        .form-control {
            padding: 0.2rem 10px !important;
        }

        select.form-control:not([size]):not([multiple]) {
            height: calc(26px + 2px);
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem !important;
        }
    </style>

    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-6 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item">Positions</li>
                        <li class="breadcrumb-item active">View Position</li>
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
                                <label>Employee:</label>
                                <select name="employee" class="form-control" style="clear:left">
                                    <option value="">Select</option>

                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-2 pd_3">
                                <label>Status:</label>
                                <select name="status" id="status" class="form-control" style="clear:left">
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
                                <select name="approval_status" id="approval_status" class="form-control" style="clear:left">
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
                    <div class="">
                        <table class="table table-striped dataex-html5-selectors" id="data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Client</th>
                                    <th>Total Openings</th>
                                    <th>CRM</th>
                                    <th>Recruiters</th>
                                    <th>CV Sent</th>
                                    <th>Joined</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Approval</th>
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
        $(function() {
            var datatable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/viewposition-get') }}",
                    data: function(d) {
                        d.status = $('#status').val(),
                        d.approval = $('#approval_status').val(),
                        d.search = $('input[type="search"]').val(),
                        d.from_date = $('input[name="from_date"]').val(),
                        d.to_date = $('input[name="to_date"]').val()
                    }
                },
                dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'>'tip",
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            buttons: [{
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-primary btn-sm',
                    title: 'Data-export',
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-success btn-sm',
                    title: 'Data-export',
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm',
                    title: 'Data-export',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    customize: function(doc) {
                        doc.content.splice(0, 1);
                        var objLayout = {};
                        doc.content[0].layout = objLayout;
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'print',
                    text: 'print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-info'
                }
            ],
            // processing: true,
            // serverSide: true,
            // data: [],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'job_title',
                        render: function(data, type, row) {
                        return '<a href="/position_view_details/'+ row.id +'" class="edit">'+ row.job_title +'</a> ';
                        }
                    },
                    {
                        data: 'client',
                        name: 'Client'
                    },
                    { 
                        data: 'total_opening',
                        name: 'Total Openings'
                    },

                    {
                        data: 'crm',
                        render: function(data, type, row) {
                        return '<span class="badge badge-primary">'+row.crm+'</span>';
                        }
                    },
                    {
                        data: 'recruiters',
                        name:'recruiters'
                        // render: function(data, type, row) {
                        // return '<span class="badge badge-primary">'+row.recruiter+'</span>';
                        // }
                    },
                    {
                        data: 'cv_sent',
                        name: 'CV Sent'
                    },
                    {
                        data: 'joined',
                        name: 'Joined'
                    },
                    {
                        data: 'createdby',
                        name: 'Created By'
                    },
                    {
                        data: 'status',
                        name: 'Status'
                    },
                    {
                        data: 'approval',
                        render: function(data, type, row) {
                            if (row.is_approve == 0) {
                            return '<span class="badge badge-warning">Awaiting Approval</span>';
                            }else if(row.is_approve == 1){
                            return '<span class="badge badge-success">Approved</span>';
                            }else{
                                return '<span class="badge badge-danger">Rejected</span>';
                            }
                        }
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
                        name: 'Action'
                    },
                ]
            });

            $('#status').change(function() {
                table.draw();
            });
            $('input[name="to_date"]').change(function() {
                table.draw();
            });
            $('#approval_status').change(function() {
                table.draw();
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search").hide();
            //console.log('hyy');
            $('#search_btn').on('click', function() {
                $('#search').toggle();
            });
        });
    </script>
</x-admin-layout>