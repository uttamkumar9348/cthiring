<x-admin-layout>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('/mail_box')}}">Mail Box</a></li>
                        <li class="breadcrumb-item active">Sent Items</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('mail_resent_msg'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('mail_resent_msg')}}
    </div>
    @endif
    <div class="row match-height">
        <div class="col-md-12 pd_0">
            <div class="">
                <div class="collapse show">
                    <div class="">
                        <table class="table table-striped dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>To</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Type</th>
                                    <th>Sent Date</th>
                                    <th>Sent by</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($allmail as $all_mail )

                                @php
                                $type='';
                                if($all_mail->type==1){
                                $type="Send CV to Client";
                                }

                                elseif($all_mail->type==2){
                                $type="Interview Confirmation to Client";
                                }

                                elseif($all_mail->type==3){
                                $type="Schedule Interview to Candidates";
                                }
                                @endphp
                                <tr>
                                    <td>{{$all_mail->mail_to}}</td>
                                    <td>{{$all_mail->subject}}</td>
                                    <td> <a href="{{url('/mail_box_details',$all_mail->id)}}">{!! Str::limit(strip_tags($all_mail->message), 150) !!}</a></td>
                                    <td>{{$type}}
                                        @if($all_mail->resend_mail_count ==2)
                                        <span style="color:red"><b>(Resend)</b></span>
                                        @endif
                                    </td>

                                    <td>{{date('j-F-Y',strtotime($all_mail->created_at))}} </td>

                                    <td>{{($all_mail->sendbyname_mailbox)->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form wizard with icon tabs section end -->
</x-admin-layout>