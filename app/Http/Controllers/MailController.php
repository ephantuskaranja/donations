<?php

namespace App\Http\Controllers;

use App\Mail\sendReminderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class MailController extends Controller
{
    public function index()
    {
        $users = DB::table('donors')
            ->where('schedule_type', 'monthly')
            ->get();

        foreach ($users as $user) {
            $mailData = [
                'title' => 'Reminder',
                'body' => 'Please donate',
                'link' => 'http://127.0.0.1:8000/'
            ];

            Mail::to($user->email)->send(new sendReminderMail($mailData));

            //update in mails table
            DB::table('emails')->insert([
                'donor_id' => $user->id,
                'payload' => $mailData,
            ]);
        }


        return response()->json(['email sent successfully']);
    }
}
