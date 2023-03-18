<?php

namespace App\Interfaces;

use App\Http\Requests\PageRequest;
use App\Page;

interface PageRepositoryInterface
{
    public function create(PageRequest $request);
    public function update(PageRequest $request, int $pageId);
    function pageUrlCreate(Page $page);
}
