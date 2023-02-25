<?php

namespace App\Interfaces;

use App\Http\Requests\PageRequest;

interface PageRepositoryInterface
{
    public function create(PageRequest $request);
    public function update(PageRequest $request, int $pageId);
}
