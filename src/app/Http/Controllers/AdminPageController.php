<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Utils\Form;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ImageServiceInterface;
use App\Page;

class AdminPageController extends Controller
{

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
        return view('admin/page/new');
    }
    public function new(PageRequest $request)
    {
        $page = $this->pageRepository->create($request);
        $this->pageRepository->pageUrlCreate($page); 
        $this->imageService->put($request, $page, 'movie');
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

}
