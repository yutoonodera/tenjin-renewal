<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Utils\Form;
use App\Main;

class AdminMainController extends Controller
{
    public function __construct(
        Form $form
    ) {
        $this->form = $form;
    }

    // public function main($pageId)
    // {
    //     return view('admin/main/index')
    //     ->with('main', Main::findOrFail($pageId))
    //     ->with('uploadDir', Main::UPLOAD_DIR)
    //     ->with('slash', Main::SLASH)
    //     ->with('slashOne', Main::SLASH_ONE)
    //     ->with('slashTwo', Main::SLASH_TWO);
    // }
    public function newMainForm()
    {
        
    }
    public function editMainForm($pageId)
    {
        return view('admin/main/edit')
        ->with('main', Main::findOrFail($pageId))
        ->with('uploadDir', Main::UPLOAD_DIR)
        ->with('slash', Main::SLASH)
        ->with('slashOne', Main::SLASH_ONE)
        ->with('slashTwo', Main::SLASH_TWO)
        ->with('uniqueError', '');
    }
    public function editMain(PageRequest $request, $pageId)
    {
        $mains = Main::where('id', '!=', $pageId)->get();
        foreach ($mains as $main) {
            if ($main->url == $request->url || Main::CONTACT == $request->url) {
                $main =  $this->form->urlMainEditUnigueCheck($request, $pageId);
                return view('admin/main/edit')
                ->with('main', Main::findOrFail($pageId))
                ->with('uploadDir', Main::UPLOAD_DIR)
                ->with('slashOne', Main::SLASH_ONE)
                ->with('slashTwo', Main::SLASH_TWO)
                ->with('main', $main)
                ->with('uniqueError', Main::UNIQUE_ERROR);
            };
        }
        $this->form->editMainPage($request, $pageId);
        return redirect()->route('admin.index');
    }

    public function deleteImage(int $pageId, string $name)
    {
        $this->form->deleteMainImage($pageId, $name);
        return back();
    }
}
