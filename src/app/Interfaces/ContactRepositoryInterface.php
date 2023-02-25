<?php

namespace App\Interfaces;

use App\Http\Requests\NewContactRequest;

interface ContactRepositoryInterface
{
    public function create(NewContactRequest $request);
    public function send(array $to);
}
