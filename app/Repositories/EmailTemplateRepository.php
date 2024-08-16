<?php

namespace App\Repositories;

use App\Models\EmailTemplate;
use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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