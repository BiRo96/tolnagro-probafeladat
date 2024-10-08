<?php

namespace App\Console\Commands;
set_time_limit(0);

use App\Models\EmailTemplate;
use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;
use App\Repositories\Interfaces\SentEmailRepositoryInterface;
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

    public function __construct(protected EmailTemplateRepositoryInterface $emailTemplateRepository, protected SentEmailRepositoryInterface $sentEmailRepository)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sent_emails_in_row = 0;
        $email_templates = $this->emailTemplateRepository->getAll();
        
        $email_templates->each(function ($email_template) use (&$sent_emails_in_row) {
            $recipients = [
                'email1@example.com',
                'email2@example.com',
                'email3@example.com',
            ];

            foreach ($recipients as $recipient) {
                if (env("MAIL_ACTIVE") == "1") {
                    Mail::raw($email_template->body, function ($message) use ($email_template, $recipient) {
                        $message->from(env("MAIL_FROM_ADDRESS"));
                        $message->to($recipient);
                        $message->subject($email_template->subject);
                    });    
                }

                $this->sentEmailRepository->create([
                    'email_address' => $recipient,
                    'email_template_id' => $email_template->id,
                ]);

                $sent_emails_in_row++;
                if (($sent_emails_in_row % 3) == 0 && (env("MAIL_ACTIVE") == "1")) {
                    /**
                     * 10mp várakozás minden 3. email után
                     * (mailtrap.io ingyenes csomagja 550-es szerver hibát dob ha másodpercenként 5-nél több email-t próbálunk kézbesíteni)
                     */
                    sleep(10);
                }
            }
        });
    }
}
