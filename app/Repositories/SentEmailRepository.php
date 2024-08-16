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
    public function create(array $data) : void
    {
        SentEmail::create($data);
    }

    public function truncate() : void
    {
        SentEmail::truncate();
    }
}