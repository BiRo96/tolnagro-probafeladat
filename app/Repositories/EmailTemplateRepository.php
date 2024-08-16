<?php

namespace App\Repositories;

use App\Models\EmailTemplate;
use Illuminate\Database\Eloquent\Collection;

interface EmailTemplateRepositoryInterface
{
    public function getAll(): Collection;

    public function getAllWithSentEmails(): Collection;

    public function create(array $data): void;

    public function delete(string $id): void;

    public function truncate(): void;
}

class EmailTemplateRepository implements EmailTemplateRepositoryInterface
{
    /**
     * Get all email templates
     */
    public function getAll() : Collection
    {
        return EmailTemplate::all();
    }

    /**
     * Get all email templates with the records of sent emails
     */
    public function getAllWithSentEmails() : Collection
    {
        return EmailTemplate::with('sentEmails')->get();
    }

    /**
     * Create email template
     * 
     * @param array $data The data to create the email template
     */
    public function create(array $data) : void
    {
        EmailTemplate::create($data);
    }

    /**
     * Delete email template
     * 
     * @param string $id The id of the email template we want to delete
     */
    public function delete(string $id) : void
    {
        EmailTemplate::destroy($id);
    }

    /**
     * Truncate email templates
     */
    public function truncate() : void
    {
        EmailTemplate::truncate();
    }
}