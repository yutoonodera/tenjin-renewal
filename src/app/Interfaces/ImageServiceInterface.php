<?php

namespace App\Interfaces;

use App\Http\Requests\PageRequest;
use App\Page;

interface ImageServiceInterface
{
    public function put(PageRequest $request, Page $page, string $column);

    public function storagePut(Page $page, $thumbnail, string $uploadDir, string $fileName, string $column): void;

    public function saveMovieName(Page $page, string $column, string $fileName): void;

}
