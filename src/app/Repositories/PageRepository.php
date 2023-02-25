<?php

namespace App\Repositories;

use App\Interfaces\PageRepositoryInterface;
use App\Http\Requests\PageRequest;
use App\Page;

class PageRepository implements PageRepositoryInterface
{
    public function create(PageRequest $request)
    {
        return Page::create($request->all());
    }

    public function update(PageRequest $request, int $pageId)
    {
        $page = Page::findOrFail($pageId);
        $page->title = $request->title;
        $page->url = $request->url;
        $page->content01 = $request->content01;
        $page->content02 = $request->content02;
        //$this->imagePage($request, $page);
        return $page->save();

    }
}