<?php

namespace App\Repositories;

use App\Models\SentEmail;

class SentEmailRepository
{
    public function create($data)
    {
        SentEmail::create($data);
    }

    public function truncate()
    {
        SentEmail::truncate();
    }
}