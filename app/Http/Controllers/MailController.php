<?php

namespace App\Http\Controllers;

use App\Models\ClientContact;
use App\Models\Mailbox;
use App\Models\Position;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{


    public function mail_box()
    {
        $allmail = Mailbox::orderBy('id', 'DESC')->get();
        //dd($all_mail);
        return view('mail_box.mail_box', compact('allmail'));
    }


    public function mail_box_details($id)
    {
        $mail_details = Mailbox::find($id);
        //dd($mail_details);

        return view('mail_box.mail_box_details', compact('mail_details'));
    }

    public function resend_mail(Request $request, $mail_boxid)
    {
        // dd($request->all());
        $mail_boxdata = Mailbox::where('id', $mail_boxid)->first();
        //dd($mail_boxdata);
        if ($mail_boxdata->type == 1) {
            //dd("client cv");
            $this->resend_mailsend_client($request->cc, $request->position_id, $request->subject, $request->message);
            $resent_cv_to_client_mail = new Mailbox;
            $resent_cv_to_client_mail->client_id = $request->client_id;
            $resent_cv_to_client_mail->position_id = $request->position_id;
            $resent_cv_to_client_mail->resume_id = $request->resume_id;

            $resent_cv_to_client_mail->mail_to = $request->to;
            $resent_cv_to_client_mail->subject = $request->subject;
            $resent_cv_to_client_mail->message = $request->message;
            $resent_cv_to_client_mail->cc = $request->cc;
            $resent_cv_to_client_mail->send_by = session('USER_ID');
            $resent_cv_to_client_mail->type = 1;
            $resent_cv_to_client_mail->send_cv_client_popup_attch = $request->attachment;
            $resent_cv_to_client_mail->resend_mail_count = 2;
            $resent_cv_to_client_mail->save();
            return redirect('/mail_box')->with('mail_resent_msg', 'CV was successfully Resent to the client');
        } elseif ($mail_boxdata->type == 2) {
            // dd("client_interview");
            $this->resend_schinterview_confir_client_mail(
                $cc = explode(",", $request->cc),
                $position_id =  $request->position_id,
                $message = $request->message,
                $subject = $request->subject
            );

            $resend = new Mailbox;
            $resend->client_id = $request->client_id;
            $resend->position_id = $request->position_id;
            $resend->resume_id = $request->resume_id;

            $resend->mail_to = $request->to;
            $resend->subject = $request->subject;
            $resend->message = $request->message;
            $resend->cc = $request->cc;
            $resend->send_by = session('USER_ID');
            $resend->type = 2;
            $resend->resend_mail_count = 2;
            $resend->save();

            return redirect('/mail_box')->with('mail_resent_msg', 'Schedule Interview Mail successfully Resent to the client');
        } elseif ($mail_boxdata->type == 3) {
            //dd('candidate interview');
            $email_id = Resume::where('id', $request->resume_id)->first('email');

            $this->resendmail_interview_schdule_candidate(
                $candidate_mail_id =  $email_id->email,
                $subject = $request->subject,
                $ck_editer_body_msg = $request->message
            );


            $resend_mailbox = new Mailbox;
            $resend_mailbox->client_id = $request->client_id;
            $resend_mailbox->position_id = $request->position_id;
            $resend_mailbox->resume_id = $request->resume_id;

            $resend_mailbox->mail_to = $request->to;
            $resend_mailbox->subject = $request->subject;
            $resend_mailbox->message = $request->message;
            $resend_mailbox->send_by = session('USER_ID');
            $resend_mailbox->type = 3;
            $resend_mailbox->resend_mail_count = 2;
            $resend_mailbox->save();
            return redirect('/mail_box')->with('mail_resent_msg', 'Schedule Interview Mail successfully Resent to the Candidate');
        }
    }


    public function resend_mailsend_client($cc, $position_id, $ckediter_subject, $ck_message)
    {
        
        $cc_mail = explode(",", $cc);
        // dd($cc_mail);
        $data = ['heading_subject' => $ckediter_subject, 'ckeditordata' => $ck_message];

        $spoc_id = Position::where('position_id', $position_id)->first('spoc_name');
        $spoc_mail = ClientContact::where('id', $spoc_id->spoc_name)->first('email');
        $contact_mail['to'] = $spoc_mail->email;
        $count = count($cc_mail);
        FacadesMail::send('mail.cv_send_toclient', $data, function ($messages) use ($contact_mail, $data ,$count,$cc_mail) {
            $messages->to($contact_mail['to']);
            for($i=0;$i < $count;$i++){
               $messages->cc($cc_mail[$i]); 
            }
            $messages->subject($data['heading_subject']);
        });
    }


    public function resend_schinterview_confir_client_mail($cc, $position_id, $message, $subject)
    {
        $data = ['subject' => $subject, 'cc' => $cc, 'ck_editer_msg' => $message];

        $spoc_id = Position::where('position_id', $position_id)->first('spoc_name');
        $spoc_mail = ClientContact::where('id', $spoc_id->spoc_name)->first('email');
        $contact_mail['to'] = $spoc_mail->email;


        FacadesMail::send('mail.schedule_interview_client', $data, function ($messages) use ($contact_mail, $data) {
            $messages->to($contact_mail['to']);
            $messages->cc($cc);
            $messages->subject($data['subject']);
        });
    }


    public function resendmail_interview_schdule_candidate($candidate_mail_id, $subject, $ck_editer_body_msg)
    {


        $data = ['subject' => $subject,  'cand_ck_editer_msg' => $ck_editer_body_msg];
        $contact_mail['to'] = $candidate_mail_id;


        FacadesMail::send('mail.schd_interview_candidate', $data, function ($messages) use ($contact_mail, $data) {
            $messages->to($contact_mail['to']);
            $messages->subject($data['subject']);
        });
    }
}