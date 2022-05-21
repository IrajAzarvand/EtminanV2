<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
// use App\Models\mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;



class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($Folder = '')
    {

        switch ($Folder) {
            case 'spam':
                $MailboxName = 'هرزنامه';

                $Mailbox = UserMail('GetSpamMailList');

                break;

            default:
                //by default for initial load of mail page, the inbox folder will show to user
                $MailboxName = 'اینباکس';
                $Mailbox = UserMail('GetInboxMailList');
                break;
        }
        $Name = Menu('ShowEmailPage')[0];
        $Section = Menu('ShowEmailPage')[1];

        return view(
            'PageElements.dashboard.Mail.Email',
            compact('Name', 'Section', 'MailboxName', 'Mailbox')
        );
    }




    /**
     * Display selected mailbox by user.
     *
     * @return \Illuminate\Http\Response
     */
    public function Mailbox()
    {
        $Name = Menu('ShowEmailPage')[0];
        $Section = Menu('ShowEmailPage')[1];

        $Mailbox = UserMail('GetInboxMailList');
        // $Mailbox = UserMail('GetSpamMailList');

        return view(
            'PageElements.dashboard.Mail.Email',
            compact('Name', 'Section', 'Mailbox')
        );
    }




    /**
     * Send Message of contact us form to company email.
     *
     * @return \Illuminate\Http\Response
     */
    public function SendCUMessage(Request $request)
    {
        $validated = $request->validate([
            'FNAME' => 'required|max:25',
            'EMAIL' => 'required|email',
            'SUBJECT' => 'required',
            'MESSAGE' => 'required',
            'mtcaptcha-verifiedtoken' => 'required'
        ]);

        $data = array(
            'name' => $request->input('FNAME'),
            'email' => $request->input('EMAIL'),
            'subject' => $request->input('SUBJECT'),
            'message' => $request->input('MESSAGE'),
        );

        Mail::to('info@etminan.net')->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(mail $mail)
    {
        //
    }
}