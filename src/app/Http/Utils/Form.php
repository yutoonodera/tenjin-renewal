<?php

namespace App\Http\Utils;

use App\Http\Requests\NewContactRequest;
use App\Http\Requests\PageRequest;
use App\Contact;
use App\Main;
use App\Page;
use Illuminate\Support\Facades\Storage;

//フォームの作成・編集・削除のクラス
class Form
{
    //メインページを取得する
    public function getMain($pageId)
    {
        Main::findOrFail($pageId);
    }
    //メインページの編集処理をする
    public function editMainPage(PageRequest $request, int $pageId)
    {
        $main = Main::findOrFail($pageId);
        $main->title = $request->title;
        $main->url = $request->url;
        $main->content01 = $request->content01;
        $main->content02 = $request->content02;
        $this->imageMain($request, $main);
        $main->save();
    }
    //メインページの画像削除処理をする
    public function deleteMainImage(int $pageId, string $name)
    {
        $main = Main::findOrFail($pageId);
        if ($name == 'thumbnail') {
            $uploadDir = Main::UPLOAD_DIR . $main->id . '/';
            Storage::disk('s3')->delete($uploadDir . $main->thumbnail);
            $main->thumbnail = '';
        } elseif ($name == 'image01') {
            $uploadDir = Main::UPLOAD_DIR . $main->id . MAIN::SLASH_ONE;
            Storage::disk('s3')->delete($uploadDir . $main->image01);
            $main->image01 = '';
        } elseif ($name == 'image02') {
            $uploadDir = Main::UPLOAD_DIR . $main->id .  MAIN::SLASH_TWO;
            Storage::disk('s3')->delete($uploadDir . $main->image02);
            $main->image02 = '';
        }
        $main->save();
    }
    //ページの登録処理をする
    public function newPage(PageRequest $request)
    {
        $page = Page::create($request->all());
        $this->imagePage($request, $page);
        $page->save();
        //dd($page);
    }
    //ページの削除処理をする
    public function deletePage(int $id)
    {
        Page::destroy($id);
    }
    //メインページの画像削除処理をする
    public function deletePageImage(int $pageId, string $name)
    {
        $page = Page::findOrFail($pageId);
        if ($name == 'thumbnail') {
            $uploadDir = Main::UPLOAD_DIR . $page->id . '/';
            Storage::disk('s3')->delete($uploadDir . $page->thumbnail);
            $page->thumbnail = '';
        } elseif ($name == 'image01') {
            $uploadDir = Main::UPLOAD_DIR . $page->id . MAIN::SLASH_ONE;
            Storage::disk('s3')->delete($uploadDir . $page->image01);
            $page->image01 = '';
        } elseif ($name == 'image02') {
            $uploadDir = Main::UPLOAD_DIR . $page->id . MAIN::SLASH_TWO;
            Storage::disk('s3')->delete($uploadDir . $page->image02);
            $page->image02 = '';
        }
        $page->save();
    }

    public function editPage(PageRequest $request, int $pageId)
    {
        $page = Page::findOrFail($pageId);
        $page->title = $request->title;
        $page->url = $request->url;
        $page->content01 = $request->content01;
        $page->content02 = $request->content02;
        $this->imagePage($request, $page);
        $page->save();
    }

    public function urlMainEditUnigueCheck(PageRequest $request, $pageId)
    {
        $main = Main::findOrFail($pageId);
        $main->title = $request->title;
        $main->url = $request->url;
        $main->content01 = $request->content01;
        $main->content02 = $request->content02;
        return $main;
    }

    public function urlPageEditUnigueCheck(PageRequest $request, $pageId)
    {
        $Page = Page::findOrFail($pageId);
        $Page->title = $request->title;
        $Page->url = $request->url;
        $Page->content01 = $request->content01;
        $Page->content02 = $request->content02;
        return $Page;
    }

    private function imageMain(PageRequest $request, Main $main)
    {
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {

            $thumbnail = $request->file('thumbnail');
            $uploadDir = Main::UPLOAD_DIR . $main->id . '/';
            $fileName_file1 = Main::IMAGE_FILE_PREFIX . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            if (!empty($main->thumbnail) && Storage::disk('s3')->exists($uploadDir . $main->thumbnail)) {
                Storage::disk('s3')->delete($uploadDir . $main->thumbnail);
            }
            Storage::disk('s3')->put($uploadDir . $fileName_file1, file_get_contents($thumbnail->getPathname()), 'public');
            $main->thumbnail = $fileName_file1;
        }
        if ($request->hasFile('image01') && $request->file('image01')->isValid()) {
            $image01 = $request->file('image01');
            $uploadDir = Main::UPLOAD_DIR . $main->id . MAIN::SLASH_ONE;
            $fileName_file1 = Main::IMAGE_FILE_PREFIX . '_' . uniqid() . '.' . $image01->getClientOriginalExtension();
            if (!empty($main->image01) && Storage::disk('s3')->exists($uploadDir . $main->image01)) {
                Storage::disk('s3')->delete($uploadDir . $main->image01);
            }
            Storage::disk('s3')->put($uploadDir . $fileName_file1, file_get_contents($image01->getPathname()), 'public');
            $main->image01 = $fileName_file1;
        }
        if ($request->hasFile('image02') && $request->file('image02')->isValid()) {
            $image02 = $request->file('image02');
            $uploadDir = Main::UPLOAD_DIR . $main->id . MAIN::SLASH_TWO;
            $fileName_file1 = Main::IMAGE_FILE_PREFIX . '_' . uniqid() . '.' . $image02->getClientOriginalExtension();
            if (!empty($main->image02) && Storage::disk('s3')->exists($uploadDir . $main->image02)) {
                Storage::disk('s3')->delete($uploadDir . $main->image02);
            }
            Storage::disk('s3')->put($uploadDir . $fileName_file1, file_get_contents($image02->getPathname()), 'public');
            $main->image02 = $fileName_file1;
        }
    }

    private function imagePage(PageRequest $request, Page $page)
    {
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thumbnail = $request->file('thumbnail');
            $uploadDir = Page::UPLOAD_DIR . $page->id . '/';
            $fileName_file1 = Page::IMAGE_FILE_PREFIX . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            if (!empty($page->thumbnail) && Storage::disk('s3')->exists($uploadDir . $page->thumbnail)) {
                Storage::disk('s3')->delete($uploadDir . $page->thumbnail);
            }
            Storage::disk('s3')->put($uploadDir . $fileName_file1, file_get_contents($thumbnail->getPathname()), 'public');
            $page->thumbnail = $fileName_file1;
        }
        if ($request->hasFile('image01') && $request->file('image01')->isValid()) {
            $image01 = $request->file('image01');
            $uploadDir = Page::UPLOAD_DIR . $page->id . '/';
            $fileName_file1 = Page::IMAGE_FILE_PREFIX . '_' . uniqid() . '.' . $image01->getClientOriginalExtension();
            if (!empty($page->image01) && Storage::disk('s3')->exists($uploadDir . $page->image01)) {
                Storage::disk('s3')->delete($uploadDir . $page->image01);
            }
            Storage::disk('s3')->put($uploadDir . $fileName_file1, file_get_contents($image01->getPathname()), 'public');
            $page->image01 = $fileName_file1;
        }
        if ($request->hasFile('image02') && $request->file('image02')->isValid()) {
            $image02 = $request->file('image02');
            $uploadDir = Page::UPLOAD_DIR . $page->id . '/';
            $fileName_file1 = Page::IMAGE_FILE_PREFIX . '_' . uniqid() . '.' . $image02->getClientOriginalExtension();
            if (!empty($page->image02) && Storage::disk('s3')->exists($uploadDir . $page->image02)) {
                Storage::disk('s3')->delete($uploadDir . $page->image02);
            }
            Storage::disk('s3')->put($uploadDir . $fileName_file1, file_get_contents($image02->getPathname()), 'public');
            $page->image02 = $fileName_file1;
        }
    }
}
