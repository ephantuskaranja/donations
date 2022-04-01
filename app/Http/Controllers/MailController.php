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
        try {
            //code...

            $users = DB::table('donors')
                ->where('schedule_type', 'monthly')
                ->get();

            $count = 0;

            foreach ($users as $user) {
                $mailData = [
                    'title' => 'Reminder',
                    'body' => 'Please donate',
                    'link' => 'http://127.0.0.1:8080/'
                ];

                Mail::to($user->email)->send(new sendReminderMail($mailData));

                //update in mails table
                DB::table('emails')->insert([
                    'donor_id' => $user->id,
                    'payload' => 'reminder email',
                ]);

                $count++;
            }

            return redirect()->route('show-emails')->with(['success' => 'emails sent successfully', 'count' => $count]);
        } catch (\Exception $e) {
            //throw $e;
            return redirect()->back()->with(['error' => 'error occurred!']);
        }
    }

    public function show()
    {
        $emails = DB::table('emails')
            ->select('emails.*', 'donors.name as donor')
            ->join('donors', 'emails.donor_id', '=', 'donors.id')->get();

        return view('emails', compact('emails'));
    }
}
