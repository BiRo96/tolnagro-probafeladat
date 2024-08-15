<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use App\Models\SentEmail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        SentEmail::truncate();
        EmailTemplate::truncate();
        Schema::enableForeignKeyConstraints();
        
        for ($i=0; $i < 10; $i++) { 
            EmailTemplate::create([
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
            SentEmail::create([
                'email_address' => $email_addresses[rand(0, 3)],
                'email_template_id' => rand(1, 10),
            ]);
        }
    }
}
