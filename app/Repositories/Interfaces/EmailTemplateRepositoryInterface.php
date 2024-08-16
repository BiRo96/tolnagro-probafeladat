<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface EmailTemplateRepositoryInterface
{
    /**
     * Get all email templates
     */
    public function getAll(): Collection;

    /**
     * Get all email templates with the records of sent emails
     */
    public function getAllWithSentEmails(): Collection;

    /**
     * Create email template
     * 
     * @param array $data The data to create the email template
     */
    public function create(array $data): void;

    /**
     * Delete email template
     * 
     * @param string $id The id of the email template we want to delete
     */
    public function delete(string $id): void;

    /**
     * Truncate email templates
     */
    public function truncate(): void;
}