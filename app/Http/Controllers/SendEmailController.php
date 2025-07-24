<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\EmailToSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject'           => ['required', 'string', 'max:255', 'min:5'],
            'from_email'        => ['required', 'email', 'string', 'lowercase', 'max:255', 'min:5'],
            'from_name'         => ['required', 'string', 'max:255', 'min:5'],
            'reply_to_email'    => ['required', 'email', 'string', 'lowercase', 'max:255', 'min:5'],
            'reply_to_name'     => ['required', 'string', 'max:255', 'min:5'],
            'content'           => ['required', 'string', 'min:5'],
        ]);

        $emails = EmailToSend::pluck('email');

        if ($emails->isEmpty()) {
            return to_route('send-email')->with('error', 'No emails found. Please add email first.');
        }

        Mail::send(new SendEmail(
            $data['content'],
            $data['subject'],
            $data['from_email'],
            $data['from_name'],
            $data['reply_to_email'],
            $data['reply_to_name'],
            $emails
        ));

        return to_route('send-email')->with('success', 'Email sent successfully');
    }
}
