<?php

namespace App\Repositories;

use App\Models\EmailTemplate;

class EmailTemplateRepository
{
    public function getAll()
    {
        return EmailTemplate::all();
    }

    public function getAllWithSentEmails()
    {
        return EmailTemplate::with('sentEmails')->get();
    }

    public function create($data)
    {
        EmailTemplate::create($data);
    }

    public function delete($id)
    {
        EmailTemplate::destroy($id);
    }

    public function truncate()
    {
        EmailTemplate::truncate();
    }
}