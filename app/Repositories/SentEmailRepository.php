<?php

namespace App\Repositories;

use App\Models\SentEmail;


interface SentEmailRepositoryInterface
{
    public function create(array $data): void;

    public function truncate(): void;
}

class SentEmailRepository implements SentEmailRepositoryInterface
{
    /**
     * Create a record of a sent email (not actually sending the email)
     * 
     * @param array $data The data to create the sent email record
     */
    public function create(array $data) : void
    {
        SentEmail::create($data);
    }

    /**
     * Truncate sent emails
     */
    public function truncate() : void
    {
        SentEmail::truncate();
    }
}