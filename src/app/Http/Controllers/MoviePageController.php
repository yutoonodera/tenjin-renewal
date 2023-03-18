<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Utils\Form;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ImageServiceInterface;
use App\Page;

class MoviePageController extends Controller
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

    public function index()
    {
        return view('moviepage/index');
    }

    public function newForm()
    {
        return view('moviepage/new');
    }
    public function new(PageRequest $request)
    {
        $page = $this->pageRepository->create($request);
        $this->pageRepository->pageUrlCreate($page); 
        $this->imageService->put($request, $page, 'movie');

        return view('moviepage.thanks')
        ->with('page', $page);
    }

    public function makedPage()
    {
        return view('moviepage/thanks');
    }

    public function myPage($pageUrl)
    {
        //dd('aaa');
        //＄pageUrlでデータを１つ取得して$pageに入れる
        $page = Page::where('pagelink', '=', $pageUrl)->first();
        return view('moviepage.mypage')
        ->with('page', $page);
    }   

    //batch処理
    public function delete(int $pageId)
    {
        $this->form->deletePage($pageId);
        return back();
    }

    //batch処理
    public function deleteImage(int $pageId, string $name)
    {
        $this->form->deletePageImage($pageId, $name);
        return back();
    }
    
}