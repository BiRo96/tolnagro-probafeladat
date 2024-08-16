<?php

namespace App\Repositories\Interfaces;

interface SentEmailRepositoryInterface
{
    /**
     * Create a record of a sent email (not actually sending the email)
     * 
     * @param array $data The data to create the sent email record
     */
    public function create(array $data): void;

    /**
     * Truncate sent emails
     */
    public function truncate(): void;
}