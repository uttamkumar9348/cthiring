<script>
    $(document).ready(function() {


        $('#conform_client_interview').on('click', function() {



             alert('hyyy');

            var cand_name_interview = $("input[name='cand_name_interview']").val();
            // alert(cand_name_interview);

            var interview_level_data = $('input[name="interview_level"]:checked').val();

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

            var x = new Date(interview_date);
            var date = x.toLocaleDateString();
            var time = x.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });
            var interview_venue = $('textarea[name="interview_venue"]').val();
            var additional_info = $('textarea[name="additional_info"]').val();

            // alert(time);





            CKEDITOR.instances['editortwo{{$res_show ->id}}'].setData(
                '<!DOCTYPE html>' +
                '<html>' +

                '<head>' +
                ' <meta charset="UTF-8" />' +
                '<meta name="viewport" content="width=device-width, initial-scale=1.0" />' +
                '<title></title>' +
                '</head>' +



                '<body>' +
                '<div style="' +
                'border-radius: 4px;' +
                'background-image: linear-gradient(0deg, #0072ac24, transparent);">' +

                '<table style="position: relative; top: -4px; padding-bottom: 8px; width: 100%">' +

                '<tr>' +
                '<td style="width: 100%">' +
                '<p style="' +
                'font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                'color: #484546;' +
                'line-height: 140%;' +
                'word-wrap: break-word;' +
                'padding-top: 6px;' +
                'text-transform: capitalize;">' +

                '<b>Dear </b>{{($view->pos_client_cont)->contact_name}},' +
                '</p>' +


                '<p style="' +
                'font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                'color: #484546;' +
                'line-height: 140%;' +
                'word-wrap: break-word;' +
                'padding-top: 6px;' +
                'text-decoration: capitalize;">' +

                'Greetings from {{$crm_details->fname}} {{$crm_details->lname}}' +
                '</p>' +
                '<p style="' +
                'font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                'color: #484546;' +
                'line-height: 140%;' +
                'word-wrap: break-word;' +
                ' padding-top: 6px;' +
                '">' +
                'In continuation to our telephonic discussions, I have lined-up the' +
                'shortlisted candidate(s) for the interview(s) as per the following' +
                ' schedule.' +
                '</p>' +
                ' <p style="' +
                'font-family: verdana;' +
                'text-align: left;' +
                'margin: 0px;' +
                'color: #484546;' +
                'line-height: 140%;' +
                'word-wrap: break-word;' +
                'padding-top: 6px;' +
                '">' +
                'POSITION TITLE: {{$view->job_title }}' +
                ' </p>' +
                '</td>' +
                '</tr>' +
                ' </table>' +



                '<div class="" style="overflow-x: auto">' +
                ' <table style="' +
                ' width: 100%;' +
                ' border: 1px solid #000;' +
                ' border-collapse: collapse;' +
                ' margin-bottom: 15px;' +
                '">' +

                '<tr>' +
                '<th style="' +
                'border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                '">' +
                'S. No' +
                ' </th>' +
                '<th style="' +
                'border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                ' ">' +
                ' Candidate Name' +
                '</th>' +
                '<th style="' +
                ' border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                ' border-right: 1px solid #000;' +
                ' ">' +
                'Interview Stage' +
                '</th>' +
                '<th style="' +
                'border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                '">' +
                'Interview Date' +
                ' </th>' +
                '<th style="' +
                'border-bottom: 1px solid #000;' +
                ' border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                '">' +
                'Interview Timing' +
                '</th>' +
                '<th style="' +
                'border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                '">' +
                'Mode of Interaction' +
                ' </th>' +
                '<th style="' +
                'border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                '">' +
                'Contact No' +
                '</th>' +
                ' </tr>' +

                '<tr>' +
                '<td style="' +
                ' text-align: center;' +
                'border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                ' ">' +
                '1' +
                '</td>' +
                '<td style="' +
                'text-align: center;' +
                ' border-bottom: 1px solid #000;' +
                ' border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                ' ">' +
                ' {{$res_show ->name}}' +
                '</td>' +
                '<td style="' +
                'text-align: center;' +
                ' border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                'border-right: 1px solid #000; ">' +

                '' + interview_level_data + '' +
                '</td>' +
                ' <td style="' +
                'text-align: center;' +
                ' border-bottom: 1px solid #000;' +
                ' border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                '   ">' +
                ' ' + date + '' +
                ' </td>' +
                '<td style="' +
                ' text-align: center;' +
                'border-bottom: 1px solid #000;' +
                ' border-collapse: collapse;' +
                'border-right: 1px solid #000;' +
                ' ">' +
                ' ' + time + '' +
                '</td>' +
                '<td style="' +
                '  text-align: center;' +
                'border-bottom: 1px solid #000;' +
                ' border-collapse: collapse;' +
                ' border-right: 1px solid #000;' +
                ' ">' +
                '' + interview_mode + '' +
                '</td>' +
                ' <td style="' +
                'text-align: center;' +
                'border-bottom: 1px solid #000;' +
                'border-collapse: collapse;' +
                ' border-right: 1px solid #000;' +
                '">' +
                '{{$res_show ->mobile}}' +
                '</td>' +
                '</tr>' +
                '</table>' +
                ' </div>' +



                '<table style="width: 100%">' +

                '<tr>' +
                '<td>' +
                ' <p style="' +
                ' font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                '  word-wrap: break-word;' +
                ' padding-top: 6px;' +
                '">' +
                ' Interview Venue & Contact Details shared to the candidate(s) are as follows:' +
                ' </p>' +
                ' <p style="' +
                'font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;' +
                ' ">' +
                '<span style="padding-right: 73px;">Venue</span>: ' + interview_venue + '' +
                ' </p>' +


                ' <p style="' +
                'font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                ' color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;' +
                ' ">' +
                '<span style="padding-right: 73px;">Additional Info</span>: ' + additional_info + '' +
                ' </p>' +


                '  <p style="' +
                'font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                '  color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                'padding-top: 6px;' +
                ' ">' +
                ' <span>Contact Person</span>: Mr./Ms. {{($view->pos_client_cont)->contact_name}},' +
                ' </p>' +
                ' <p style="' +
                ' font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                'color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;' +
                '">' +
                ' <span style="padding-right: 26px;">Contact No.</span>: {{($view->pos_client_cont)->mobile}}' +
                '</p>' +
                ' </td>' +
                ' </tr>' +
                ' </table>' +


                '<table style="width: 100%">' +
                ' <tr>' +
                '<td>' +
                '<p style="' +
                ' font-family: verdana;' +
                ' text-align: left;' +
                ' margin: 0px;' +
                'color: #484546;' +
                ' line-height: 140%;' +
                ' word-wrap: break-word;' +
                ' padding-top: 6px;' +
                '  ">' +
                'Trust this schedule is fine. Please do let me know if there' +
                'requires any further information about the candidate(s) or the' +
                ' schedule.' +
                ' </p>' +
                '<p>' +
                'SIGNATURE :' + $('#signature').text() +
                '</p>' +
                '  </td>' +
                ' </tr>' +
                '</table>' +
                '</div>' +
                '</body>' +
                '</html>'
            );
        });
    });
</script>