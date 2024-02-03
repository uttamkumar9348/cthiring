<x-admin-layout>
    <style>
        .form-actions {
            border-top: 1px solid #d1d5ea;
            padding: 20px 0;
            margin-top: 34px;
        }
    </style>
    <div class="content-header row head_bdr">
        <div class="content-header-left col-md-12 col-12 breadcrumb-new">
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="la la-home f_s"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('/mail_box')}}">Mail Box</a></li>
                        <li class="breadcrumb-item active">View Sent Items</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form action="{{url('/resend_mail',$mail_details->id)}}" method="post">
        @csrf
        <div class="row match-height">

            <div class="col-md-12 pd_0">
                <div class="collapse show">
                    <table class="table table-striped dataex-html5-selectors">
                        <tbody>

                            <tr>
                                <td>To</td>
                                <td>{{$mail_details->mail_to}}</td>
                            </tr>
                            @if($mail_details->type == 1 || $mail_details->type == 2 )
                            <tr>
                                <td>Cc</td>
                                <td><span id="view_cc"><span id="cc_mail">{{$mail_details->cc}}</span> <input type="button" class="btn btn-success" id="new_cc_edit" value="Edit"></span>

                                    <span id="edit_cc">
                                        <div class="row">
                                            <div class="col-6 wd_58">
                                                <input type="text" class="form-control" name="cc" value="{{$mail_details->cc}}">
                                            </div>
                                            <div class="col-4">
                                                <input type="button" class="btn btn-success" id="save" value="Save"> <input type="button" class="btn btn-danger" id="cancel" value="Cancel">
                                            </div>
                                        </div>
                                    </span>

                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>Subject</td>
                                <td>{{$mail_details->subject}}</td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>
                                    {!!$mail_details->message!!}
                                </td>
                            </tr>
                            @if($mail_details->send_cv_client_popup_attch != null)
                            <tr>
                                <td>Attachment</td>
                                <td>{{$mail_details->send_cv_client_popup_attch}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Sent Date</td>
                                <td>{{date('j-F-Y',strtotime($mail_details->created_at))}}</td>
                            </tr>
                            <tr>
                                <td>Sent By</td>
                                <td>{{($mail_details->sendbyname_mailbox)->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <input type="hidden" name="client_id" value="{{$mail_details->client_id}}">
            <input type="hidden" name="position_id" value="{{$mail_details->position_id}}">
            <input type="hidden" name="resume_id" value="{{$mail_details->resume_id}}">

            <input type="hidden" name="to" value="{{$mail_details->mail_to}}">
            <input type="hidden" name="subject" value="{{$mail_details->subject}}">
            <input type="hidden" name="message" value=" {{$mail_details->message}}">
            <input type="hidden" name="attachment" value="{{$mail_details->send_cv_client_popup_attch}}">
            <input type="hidden" name="sent_date" value=" {{$mail_details->created_at}}">
            <input type="hidden" name="sent_by" value=" {{$mail_details->send_by}}">
            <div class="col-md-12 pd_0">
                <div class="form-actions">
                    @if($mail_details->resend_mail_count==2)
                    <button class="btn btn-primary" type="submit" hidden>Resend</button>
                    @else
                    <button class="btn btn-primary" type="submit">Resend</button>
                    @endif

                    <button class="btn btn-warning">Back</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#edit_cc').hide();
            $('#new_cc_edit').on('click', function() {
                $('#view_cc').hide();
                $('#edit_cc').show();
            });
            $('#cancel').on('click', function() {
                $('#view_cc').show();
                $('#edit_cc').hide();
            });
            $('#save').on('click', function() {
                var cc = $("input[name='cc']").val();
                // alert(cc);
                $('#cc_mail').text(cc);
                $('#view_cc').show();
                $('#edit_cc').hide();
            });
        });
    </script>
    <!-- Form wizard with icon tabs section end -->
</x-admin-layout>