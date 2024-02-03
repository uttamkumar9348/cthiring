<script>
    $(document).ready(function() {
        $('#sdul_intvw_confirm_candidate').on('click', function() {


            var cand_name_interview = $("input[name='cand_name_interview']").val();

            var interview_level_data = $('input[name="interview_level"]:checked').val();
            //alert(cand_name_interview);


            if (interview_level_data == 1) {
                var interview_level_data = 'First Interview'
            } else {
                if (interview_level_data == 2) {
                    var interview_level_data = 'Second Interview'

                } else {
                    if (interview_level_data == 3) {
                        var interview_level_data = 'Third Interview'

                    } else {
                        if (interview_level_data == 4) {
                            var interview_level_data = 'Fourth Interview'

                        } else {
                            if (interview_level_data == 5) {
                                var interview_level_data = 'Final Interview'

                            }

                        }
                    }
                }
            }
            // alert(interview_level_data);

            var interview_mode = $('input[name="interview_mode"]:checked').val();
            if (interview_mode == 'telecon') {
                var interview_mode = 'Telecon'
            } else {
                if (interview_mode == 'vc') {
                    var interview_mode = 'Video Conference'
                }
            }
            var interview_date = $("input[name=interview_date]").val();
            //alert(interview_date);
            var x = new Date(interview_date);
            var date = x.toLocaleDateString();
            var time = x.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });
            var interview_venue = $('textarea[name="interview_venue"]').val();
            var additional_info = $('textarea[name="additional_info"]').val();




            CKEDITOR.instances['editorthree{{$res_show ->id}}'].setData(



                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="UTF-8" />' +
                '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>' +
                '<title></title>' +
                '</head>' +

                ' <body>' +
                '<div style="border-radius: 4px;' +
                'background-image: linear-gradient(0deg, #0072ac24, transparent);">' +
                ' <table style="position: relative; top: -4px; padding-bottom: 8px; width: 100%">' +


                '<p style="font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                ' padding-top: 6px;' +
                ' text-decoration: capitalize;">' +

                ' <b>Dear Mr./Ms./ </b>{{ $res_show -> name}}' +
                ' </p>' +

                '<p style="font-family: verdana;' +
                ' text-align: left;' +
                'margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                ' padding-top: 6px;' +
                'text-decoration: capitalize;">' +
                'Greetings from {{$crm_details->fname}} {{$crm_details->lname}},' +
                '</p>' +
                ' <p style="font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                ' In continuation to our telephonic discussions, I am confirming your interview schedule with our client as below:' +
                '</p>' +
                '<br/>' +

                '<p style="font-family: verdana;' +
                ' text-align: left;' +
                'margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                '<span style="padding-right: 27px;">COMPANY NAME</span>:' +
                ' {{($view -> client_na) -> client_name}}' +
                '</p>' +

                '<p style="font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                ' <span style="padding-right: 20px;">POSITION TITLE</span>:' +
                ' {{$view -> job_title}}' +
                '</p>' +


                '<p style="font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                ' <span style="padding-right: 20px;">Interview Level</span>:' +
                ' ' + interview_level_data + '' +
                '</p>' +


                '<p style="font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                'padding-top: 6px;">' +
                ' <span style="padding-right:38px;">Interview Date</span>:' +
                ' ' + date + '' +
                '</p>' +

                '<p style="font-family: verdana;' +
                'text-align: left;' +
                ' margin: 0px;' +
                'color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                ' <span style="padding-right: 36px;">Interview Time</span>:' +
                ' ' + time + '' +
                '</p>' +

                ' <p style="font-family: verdana;' +
                'text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                ' <span style="padding-right: 6px;">Mode of Interview </span>:' +
                ' ' + interview_mode + '' +
                '</p>' +
                '<p style="font-family: verdana;' +
                'text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                '<span style="padding-right: 101px;">Venue</span>:' +
                ' ' + interview_venue + '' +
                '</p>' +

                '<p style="font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                ' <span style="padding-right: 35px;">Contact Person</span>: Mr./Ms.{{($view->pos_client_cont)->contact_name}}' +
                '</p>' +

                '<p style="font-family: verdana;' +
                'text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                'padding-top: 6px;">' +
                '<span style="padding-right: 61px;">Contact No.</span>: {{($view->pos_client_cont)->mobile}}' +
                '</p>' +

                ' <p style="font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                'word-wrap: break-word;' +
                'padding-top: 6px;">' +
                ' <span style="padding-right: 32px;">Additional Info</span>:' +
                ' ' + additional_info + ' ' +
                ' </p>' +
                ' <br><br>' +
                '<p style="font-family: verdana;' +
                'text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                'padding-top: 6px;">' +
                'Trust this schedule is fine. Request your confirmation on the receipt of the mail and also your confirmation, <br>through a reply mail, for attending the interview as per the schedule give above in this mail.' +
                '</p>' +
                '<br>' +
                '<p style="font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                ' color: #484546;' +
                'line-height: 140%;' +
                'word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                ' Please do carry all relevant documents as needed for the interview.' +
                '</p>' +
                '<br>' +
                ' <p style="font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                ' color: #484546;' +
                'line-height: 140%;' +
                'word-wrap: break-word;' +
                'padding-top: 6px;">' +

                ' Also, do let me know if there requires any further information about the interviewing process or the schedule. <br> For more details about the company do refer to their website  www.career-tree.in' +
                ' </p>' +
                ' </td>' +

                '</tr>' +
                '</table>' +
                '<br>' +
                '<br>' +

                '<table style="width: 100%">' +
                '<tr>' +
                '<td>' +
                '<p style="font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                'color: #484546;' +
                'line-height: 140%;' +
                'word-wrap: break-word;' +
                'padding-top: 6px;">' +
                ' Wish you all the best! Thanks.' +
                '</p>' +

                ' <p style="font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;">' +
                ' Warm Regards' +
                '</p>' +
                ' <p style="font-family: verdana;' +
                'text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                'padding-top: 6px;">' +
                ' NAME :' +
                '{{$crm_details->fname}} {{$crm_details->lname}}' +
                ' </p>' +
                ' <p style="font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                'color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                'padding-top: 6px;">' +
                'SIGNATURE :' + $('#crm_signature').text() +
                ' </p>' +
                '</td>' +
                '</tr>' +
                ' </table>' +
                '</div>' +
                '</body>' +
                '</html>'


            );

        });

    });
</script>