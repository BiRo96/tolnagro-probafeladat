<?php

namespace Database\Seeders;

use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;
use App\Repositories\Interfaces\SentEmailRepositoryInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class EmailSeeder extends Seeder
{

    public function __construct(protected EmailTemplateRepositoryInterface $emailTemplateRepository, protected SentEmailRepositoryInterface $sentEmailRepository){}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $this->sentEmailRepository->truncate();
        $this->emailTemplateRepository->truncate();
        Schema::enableForeignKeyConstraints();
        
        for ($i=0; $i < 10; $i++) { 
            $this->emailTemplateRepository->create([
                'subject' => 'Email '.($i+1),
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, voluptatem fugit voluptates ullam illum omnis reprehenderit laboriosam inventore. Nostrum reiciendis ratione soluta ullam laborum! Veritatis mollitia porro quasi quos qui.',
            ]);
        }

        $email_addresses = [
            "lorem@ipsum.com",
            "dolor@sit.com",
            "amet@consectetur.com",
            "adipiscing@elit.com",
        ];

        for ($i=0; $i < 10; $i++) { 
            $this->sentEmailRepository->create([
                'email_address' => $email_addresses[rand(0, 3)],
                'email_template_id' => rand(1, 10),
            ]);
        }
    }
}
