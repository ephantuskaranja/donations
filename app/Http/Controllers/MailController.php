<?php

namespace App\Http\Controllers;

use App\Mail\sendReminderMail;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Reminder',
            'body' => 'Please donate',
            'link' => 'http://127.0.0.1:8000/'
        ];

        Mail::to('dev.ephantus@gmail.com')->send(new sendReminderMail($mailData));

        dd("Email is sent successfully.");
    }
}
