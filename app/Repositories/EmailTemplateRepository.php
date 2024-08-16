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
    public function getAll() : Collection
    {
        return EmailTemplate::all();
    }

    public function getAllWithSentEmails() : Collection
    {
        return EmailTemplate::with('sentEmails')->get();
    }

    public function create(array $data) : void
    {
        EmailTemplate::create($data);
    }

    public function delete(string $id) : void
    {
        EmailTemplate::destroy($id);
    }

    public function truncate() : void
    {
        EmailTemplate::truncate();
    }
}