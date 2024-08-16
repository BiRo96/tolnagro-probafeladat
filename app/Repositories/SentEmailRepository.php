<?php

namespace App\Repositories;

use App\Models\SentEmail;
use App\Repositories\Interfaces\SentEmailRepositoryInterface;

class SentEmailRepository implements SentEmailRepositoryInterface
{
    public function create(array $data) : void
    {
        SentEmail::create($data);
    }

    public function truncate() : void
    {
        SentEmail::truncate();
    }
}