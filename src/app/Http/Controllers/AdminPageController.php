<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Utils\Form;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ImageServiceInterface;
use App\Page;

class AdminPageController extends Controller
{
    // public function __construct(
    //     Form $form
    // ) {
    //     $this->form = $form;
    // }
        /** @var PageRepositoryInterface */
    private $pageRepository;
        /** @var ImageServiceInterface */
    private $imageService;

    /**
     *
     */
    public function __construct(PageRepositoryInterface $pageRepository, ImageServiceInterface $imageService, Form $form)
    {
        $this->pageRepository = $pageRepository;
        $this->imageService = $imageService;
        $this->form = $form;
    }

    public function newForm()
    {
        return view('admin/page/new')
        ->with('page', '')
        ->with('status', Page::STATUS);
    }
    public function new(PageRequest $request)
    {
        $pages = Page::All();
        foreach ($pages as $page) {
            if ($page->url == $request->url) {
                return view('admin/page/new')
                ->with('uploadDir', Page::UPLOAD_DIR)
                ->with('page', $request)
                ->with('status', Page::STATUS)
                ->with('uniqueError', Page::UNIQUE_ERROR);
            };
        }
        $page = $this->pageRepository->create($request);
        $this->imageService->put($request, $page, 'thumbnail');
        $this->imageService->put($request, $page, 'image01');
        $this->imageService->put($request, $page, 'image02');
        return redirect()->route('admin.index');
    }

    public function delete(int $pageId)
    {
        $this->form->deletePage($pageId);
        return back();
    }

    public function deleteImage(int $pageId, string $name)
    {
        $this->form->deletePageImage($pageId, $name);
        return back();
    }

    public function editForm(int $pageId)
    {
        return view('admin/page/edit')
        ->with('page', Page::findOrFail($pageId))
        ->with('uploadDir', Page::UPLOAD_DIR)
        ->with('slash', Page::SLASH)
        ->with('status', Page::STATUS)
        ->with('uniqueError', '');
    }

    public function edit(PageRequest $request, $pageId)
    {
        $pages = Page::where('id', '!=', $pageId)->get();
        foreach ($pages as $page) {
            if ($page->url == $request->url) {
                $page =  $this->form->urlPageEditUnigueCheck($request, $pageId);
                return view('admin/page/edit')
                ->with('uploadDir', Page::UPLOAD_DIR)
                ->with('slash', Page::SLASH)
                ->with('page', $page)
                ->with('status', Page::STATUS)
                ->with('uniqueError', Page::UNIQUE_ERROR);
            };
        }
        $this->form->editPage($request, $pageId);
        return redirect()->route('admin.index');
    }
}
