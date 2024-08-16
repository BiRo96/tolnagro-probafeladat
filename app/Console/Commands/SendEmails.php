<?php

namespace App\Console\Commands;

use App\Models\EmailTemplate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elküldi a mentett email sablonokat email-ben 3 tetszőleges email címre';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email_templates = EmailTemplate::all();
        
        $email_templates->each(function ($email_template) {
            $recipients = [
                'email1@example.com',
                'email2@example.com',
                'email3@example.com',
            ];

            foreach ($recipients as $recipient) {
                Mail::raw($email_template->body, function ($message) use ($email_template, $recipient) {
                    $message->from('from@example.com');
                    $message->to($recipient);
                    $message->subject($email_template->subject);
                });
            }
        });
    }
}
