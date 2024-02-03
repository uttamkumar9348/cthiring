<x-admin-layout>
    <div class="content-header head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <!-- <h3 class="content-header-title mb-0 d-inline-block">Client</h3><br> -->
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item"><a href="">Client</a></li>
                        <li class="breadcrumb-item active">Approve Client</li>
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
        <div class="col-md-12">
            <div class="">
                <div class="collapse show table-responsive">
                    <div class="">
                        <table class="table table-striped dataex-html5-selectors js-serial">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Contact</th>
                                    <th>City</th>
                                    <th>Discrict</th>
                                    <th>CRM</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Pending</th>
                                    <th>Created At</th>
                                    <th>Modified At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                @foreach($view as $key => $loc)
                                @php
                                if($loc->is_approve==0 ){
                                @endphp

                                <tr>
                                    <td data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="click to view the details" style="text-align: left;"><a href="{{url('/approve_details',$loc->id)}}">{{$loc->client_name}}</a>
                                    </td>
                                    @php
                                        $contact=count(App\Models\ClientContact::where('client_id',$loc->id)->get());
                                    @endphp
                                    <td style="text-align: left;">{{$contact}}</td>

                                    <td style="text-align: left;"> {{optional ($loc->citys)->name }}</td>

                                    <td style="text-align: left;"> {{optional ($loc->dist)->district_title }}</td>

                                    <!-- CRM Name Fetch -->

                                    @php
                                    $test='';
                                    $test=json_decode($loc->crm_id);
                                    $count=count($test);

                                    @endphp



                                    <td style="text-align: left;">
                                        @php
                                        for($i=0;$i<$count;$i++){ $crm_name=App\Models\User::where('id',$test[$i])->
                                            get();
                                            @endphp <span class="badge badge-primary">
                                                {{$crm_name[0]->fname}} {{$crm_name[0]->lname}}</span>

                                            @php
                                            }

                                            @endphp
                                    </td>


                                    @if ($loc->is_approve == 1)
                                    <td><span class="badge badge-default badge-success">Approved</span></td>


                                    @else
                                    <td><span class="badge badge-default badge-warning">Pending</span> </td>


                                    @endif

                                    <td>{{optional($loc->Use)->fname}}{{optional($loc->Use)->lname}}</td>


                                    <td><span class="badge badge-default badge-warning">

                                            {{(($loc->updated_at)->diffForHumans(now()))}}
                                        </span>
                                    </td>

                                    <td>{{ date('j F-Y', strtotime($loc->created_at)) }} </td>

                                    <td>{{ date('j F-Y', strtotime($loc->updated_at))}}</td>

                                    <td><a data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Verify Client" href="{{url('/approve_details',$loc->id)}}"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @php
                                }
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form wizard with icon tabs section end -->
    </div>
        <script>
        function addRowCount(tableAttr) {
              $(tableAttr).each(function(){
                $('th:first-child, thead td:first-child', this).each(function(){
                  var tag = $(this).prop('tagName');
                  $(this).before('<'+tag+'>#</'+tag+'>');
                });
                $('td:first-child', this).each(function(i){
                  $(this).before('<td>'+(i+1)+'</td>');
                });
              });
            }
            
            // Call the function with table attr on which you want automatic serial number
            addRowCount('.js-serial');
    </script>
</x-admin-layout>