<?php

namespace App\Repositories;

use App\Models\SentEmail;
use App\Repositories\Interfaces\SentEmailRepositoryInterface;

class SentEmailRepository implements SentEmailRepositoryInterface
{

    public function __construct(private SentEmail $sentEmail)
    {
    }

    public function create(array $data) : void
    {
        $this->sentEmail->create($data);
    }

    public function truncate() : void
    {
        $this->sentEmail->truncate();
    }
}