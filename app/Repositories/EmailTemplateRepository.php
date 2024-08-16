<?php

namespace App\Repositories;

use App\Models\EmailTemplate;
use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EmailTemplateRepository implements EmailTemplateRepositoryInterface
{

    public function __construct(private EmailTemplate $emailTemplate)
    {
    }

    public function getAll() : Collection
    {
        return $this->emailTemplate->all();
    }

    
    public function getAllWithSentEmails() : Collection
    {
        return $this->emailTemplate->with('sentEmails')->get();
    }


    public function create(array $data) : void
    {
        $this->emailTemplate->create($data);
    }


    public function delete(string $id) : void
    {
        $this->emailTemplate->destroy($id);
    }

    public function truncate() : void
    {
        $this->emailTemplate->truncate();
    }
}