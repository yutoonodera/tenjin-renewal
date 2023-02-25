<?php

namespace App\Services;

use App\Interfaces\ImageServiceInterface;
use App\Http\Requests\PageRequest;
use Illuminate\Support\Facades\Storage;
use App\Page;

class ImageService implements ImageServiceInterface
{
    public function put(PageRequest $request, Page $page, string $column)
    {
        if ($request->hasFile($column) && $request->file($column)->isValid()) {
            $fileInfo = $request->file($column);
            $uploadDir = Page::UPLOAD_DIR . $page->id . '/';
            $fileName = Page::IMAGE_FILE_PREFIX . '_' . uniqid() . '.' . $fileInfo->getClientOriginalExtension();
            $this->storagePut($page, $fileInfo, $uploadDir, $fileName, $column);
        }
    }

    public function storagePut(Page $page, $fileInfo, string $uploadDir, string $fileName, string $column): void
    {
        $saveColumn = '$page->' . $column;
        if (!empty($saveColumn) && Storage::disk('s3')->exists($uploadDir . $saveColumn)) {
            Storage::disk('s3')->delete($uploadDir . $saveColumn);
        }
        Storage::disk('s3')->put($uploadDir . $fileName, file_get_contents($fileInfo->getPathname()), 'public');
        $this->saveColumn($page, $column, $fileName);
    }

    //image名をDBに保存する
    //repositoryに移植したほうがいい
    public function saveColumn(Page $page, string $column, string $fileName): void
    {
        if ($column == 'thumbnail') {
            $page->thumbnail = $fileName;
        } elseif ($column == 'image01') {
            $page->image01 = $fileName;
        } elseif ($column == 'image02') {
            $page->image02 = $fileName;
        }
        $page->save();

    }

}